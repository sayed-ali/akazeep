<?php
App::uses('FileLog','Log'.DS.'Engine');
class CustomFileLog extends   FileLog {
    public function __construct($options = array()) {
    		parent::__construct($options);
    }

    public function write($type, $message) {
    	$message = sprintf('IP:[%s] , Session:[%s] ,  User[%s]', $_SERVER['REMOTE_ADDR'] , CakeSession::id(), CakeSession::read('Auth.User.email'))
    					.$message;
    	parent::write($type, $message);
    }
}

?>