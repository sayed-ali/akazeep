<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */

 
class AppController extends Controller {
	
	var $helpers = array('MenuBuilder.MenuBuilder','Html');
	
	public $components = array(
	    'Session',
	    'Auth' => array(
	        'loginRedirect' => array('controller' => 'posts', 'action' => 'index' , 'admin'=>false),
	        'logoutRedirect' => array('controller' => 'posts', 'action' => 'index', 'admin'=>false),
	        'authenticate' => array(
	            'Form' => array(
	                'fields' => array('username' => 'email')
	        	)
        	),
        	'authorize' => 'Controller'
	    )
		);
		
	public function isAuthorized($user = null) {
		
        // Any registered user can access public functions
        if (empty($this->request->params['admin'])) {
            return true;
        }
		
        // Only admins can access admin functions
        if (isset($this->request->params['admin'])) {
            return (bool)($user['is_admin']);
        }
        // Default deny
        return false;
    }
	
	

    public function beforeFilter() {
    	parent::beforeFilter();
    	$user = $this->Auth->user();
		$loginmenuItem = $this->Auth->user()?
			array(
                    'title' => 'حسابي',
                    'url' => array('controller' => 'users', 'action' => 'edit', $user['id'],'admin'=>false),
                ):
			array(
                    'title' => 'تسجيل الدخول',
                    'url' => array('controller' => 'users', 'action' => 'login','admin'=>false),
                ); 
				    	
		 $menu = array(
            'main-menu' => array(
                array(
                    'title' => 'الرئيسية',
                    'url' => array('controller' => 'posts', 'action' => 'index', 'plugin'=>'','admin'=>false),
                ),
                array(
                    'title' => 'اضف كذبة',
                    'url' => array('controller' => 'posts', 'action' => 'add','plugin'=>'','admin'=>false),
                ),
                array(
                    'title' => 'اتصل بنا',
                    'url' => array('controller' => 'pages', 'action' => 'contact-us','plugin'=>'','admin'=>false),
                )
            ));
			
            $this->set(compact('menu'));
    }
	
}
