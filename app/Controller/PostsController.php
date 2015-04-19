<?php
App::uses('CakeEmail', 'Network/Email');
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 */
class PostsController extends AppController {
	
	public $components = array('Recaptcha.Recaptcha','RequestHandler');
	
	public $postStatus = array(
		'draft'=>'draft',
		'pending'=>'pending',
		'published'=>'published',
		'modified'=>'modified',
		'removed'=>'removed',
		'deleted'=>'deleted',
		'rejected'=>'rejected'
	);
	
	
	
	public $helpers = array('Posts','Time','Js' => array('Jquery'));

	 public function beforeFilter () {
		parent::beforeFilter();
		$this->Auth->allow('index','view','lastposts','user','sitemap');
		
	}
	 
	 
	 protected function _sendEmail($to_user,$template,$subject, $vars) {
		$options = array(
			'from' => Configure::read('App.defaultEmail'),
			'subject' => $subject,
			'template' => $template,
			'layout'=> 'default');

		$Email =  new CakeEmail('default');
		$Email->to($to_user['email'])
			->from($options['from'])
			->subject($options['subject'])
			->template($options['template'], $options['layout'])
			->emailFormat('html')
			->viewVars($vars)
			->send();
	}
	


/**
 * index method
 *
 * @return void
 */

 	
	
	public function index() {
		
		//$this->Post->recursive = 0;
		//$this->loadModel('PageBlock');
		//$recentArticles = $this->Article->find('all', array('limit' => 5, 'order' => 'Article.created DESC'));
		
		//$pageBlocks = $this->PageBlock->findAllByPageName('index');
		
		//$this->set('pageBlocks', $pageBlocks);
		$posts = $this->Post->find('all', array(
								   'recursive'=>0,
								   'order'=>array('Post.created desc'),
								   'conditions'=>array('Post.status'=>'published')));
 
		$this->set('posts', $posts);
	
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($url_title = null) {
		$post = $this->Post->find('first',array(
				'conditions' => array('Post.url' =>  $url_title )
			));
		$user = $this->Auth->user();
		//if post is published or the logged in user is the author or the user is admin
		if($post && ($post['Post']['status'] == $this->postStatus['published'] || $user['id'] == $post['Post']['user_id'] || $user['is_admin']))
			$this->set('post',$post);
		else
			throw new NotFoundException(__('Invalid post'));
	}
	
/**
 * add method
 *
 * @return void
 */
	private function saveImage($imageFile)
	{
		if(!$imageFile) return null;
		if ($imageFile['error'] === UPLOAD_ERR_OK) {
    		$id = String::uuid();
			$extension = strtolower(pathinfo($imageFile['name'], PATHINFO_EXTENSION));
			if(!in_array ($extension,array('jpg','png','bmp','jpeg','gif')) || !getimagesize($imageFile['tmp_name']))
				 throw new Exception('Invalid image type');
			$id = $id.'.'.$extension;
    		if (move_uploaded_file($imageFile['tmp_name'], APP.'webroot'.DS.'img'.DS.'uploads'.DS.$id))
				return $id;
		}
		return null;
	}

	
	public function add() {
		if ($this->request->is('post')) {
			if ($this->Recaptcha->verify()){
				CakeLog::info(sprintf('PostsController.add(%s)', serialize($this->request->data['Post'])));
				$this->Post->create();
				$post = $this->request->data['Post'];
				$post['post_image'] = $this->saveImage($post['post_image']);
				$post['correction_image'] = $this->saveImage($post['correction_image']);
				$post['status'] = array_key_exists('publish', $this->request->data)? $this->postStatus['pending']:$this->postStatus['draft'];
				if ($this->Post->save($post)) {
					$this->Session->setFlash(__('The post has been saved'));
					$post = $this->Post->findByid($this->Post->id);
					$user=$this->Auth->user();
					$this->_sendEmail($user,'posts_add',$post['Post']['title'], array('post'=>$post));
					$this->redirect(array('action' => 'view' ,$post['Post']['url']));
				} else {
					$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
				}
			}
			else {
				// display the raw API error
				$this->Session->setFlash($this->Recaptcha->error);
			}
		
		}
		$categories = $this->Post->Category->find('list');
		$this->set(compact('categories'));
	
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$user = $this->Auth->user();
		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
		$post = $this->Post->findByid($id);
		if (!count($post)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if(!($post['Post']['user_id'] == $user['id'] && $post['Post']['status']=='draft') && !$user['is_admin'])
		{
			$this->Session->setFlash(__('You are not allowed to edit this post'));
			$this->redirect(array('action' => 'view' ,$post['Post']['url']));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Recaptcha->verify()) 
			{
				CakeLog::info(sprintf('PostsController.edit(%s)', serialize($this->request->data['Post'])));
				$this->request->data['Post']['id'] = $id;
				$this->request->data['Post']['post_image'] =
						$this->request->data['Post']['post_image']['size']? 
							$this->saveImage($this->request->data['Post']['post_image']):
							$post['Post']['post_image'];
			
				$this->request->data['Post']['correction_image'] =
						$this->request->data['Post']['correction_image']['size']? 
							$this->saveImage($this->request->data['Post']['correction_image']):
							$post['Post']['correction_image'];
				unset($this->request->data['Post']['status']);
				unset($this->request->data['Post']['user_id']);
				if ($this->Post->save($this->request->data)) {
					$this->Session->setFlash(__('The post has been saved'));
						$this->redirect(array('action' => 'view' ,$post['Post']['url']));
				} else {
					$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
				}
			}
			else {
			// display the raw API error
			$this->Session->setFlash($this->Recaptcha->error);
			}
		} else {
			
			$this->request->data = $post;
		}
		
		$categories = $this->Post->Category->find('list');
		$this->set(compact('categories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Post->read(null,$id);
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$user = $this->Auth->user();
		if($user && ($user['id']==$this->Post->user_id || $user['is_admin']))
		{
			CakeLog::info(sprintf('PostsController.delete(%s)', $id));		
			$this->Post->set(array('status'=>$this->postStatus['removed']));
			$this->Post->save();
			$this->Session->setFlash(__('Post deleted'));
			$this->redirect(array('action' => 'myposts'));
		}
		else
			throw new NotFoundException(__('Invalid post'));
		
	}

	public function lastposts($limit=5)
	{

		$posts = $this->Post->find('all', array(
								   'recursive'=>0,
								   'order'=>array('rand()'),
								   'limit'=>$limit,
								   'conditions'=>array('Post.status'=>'published')));
	 
		if(isset($this->params['requested']))
		{
			return $posts;
		}
 
		$this->set('lastposts', $posts);
	}
	public function myposts($status='draft')
	{
		$user = $this->Auth->user();
		$posts = $this->Post->find('all',array(
								   'recursive'=>0,
								   'order'=>array('Post.created desc'),
								   'conditions'=>
								   			array(
								   				'Post.user_id'=>$user['id'],
								   				'Post.status'=>$status
												)
									));
		$this->set('status',$status);							
		$this->set('posts',$posts);
						
	}
	public function user($user_id)
	{
		$posts = $this->Post->findAllByUserIdAndStatus($user_id,$this->postStatus['published']);
		$user = $this->Post->User->findById($user_id);
		$this->set('posts',$posts);
		$this->set('user',$user);
	}
	
	public function admin_index($status=null)
	{
		$this->paginate = array(
				'limit' => 20,
				'conditions'=>array('Post.status'=>$status),
				'order' => 'Post.modified DESC'				
				);		
		$this->set('posts', $this->paginate($this->modelClass));
		$this->set('states', $this->postStatus);
		
	}
	public function admin_changestatus($postId,$status)
	{
		CakeLog::info(sprintf('PostsController.admin_changestatus(%s,%s)', $postId,$status));
		$this->Post->id = $postId;
		$this->Post->saveField('status' , $status);
		$this->Post->save();
		$this->layout = 'ajax';
		$this->autoRender = false;
	}
	
	public function sitemap(){
		 $this->layout = 'xml';
		 $this->set('posts', $this->Post->findAllByStatus($this->postStatus['published']));
		
	}
	

}
