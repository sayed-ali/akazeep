<?php

class PostsHelper extends AppHelper {
	public $helpers = array('Html');
    public function __construct(View $view, $settings = array()) {
        parent::__construct($view, $settings);
    }
	public function postImage($post){
		if ($post['post_image'] || $post['correction_image'])
		{
			$post_image = $post['post_image']? $post['post_image']: $post['correction_image'];
		
			return  $this->Html->link(
						$this->Html->image('uploads/'. $post_image , 
							array(
								'alt' => $post['title'] ,
  								  'class'=>'grid-100'  
								)),
								array('action' => 'view', $post['url']),array('escape' => false));
		}
	}
	
} 
?>