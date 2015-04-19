<?php
/**
 * Copyright 2010 - 2011, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2011, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div id="fb-root"></div>
<div class='grid-50 '>
	<div class="grid-100 dialogue-box users index ">
	<h2><?php echo __d('users', 'Login'); ?></h2>
	<fieldset>
		<?php
			echo $this->Form->create($model, array(
				'action' => 'login',
				'id' => 'LoginForm'));
			echo $this->Form->input('email', array(
				'label' => __d('users', 'Email')));
			echo $this->Form->input('password',  array(
				'label' => __d('users', 'Password')));

			echo '<div style="font-style:bold"><label>' . __d('users', 'Remember Me') . $this->Form->checkbox('remember_me') . '</label>';
			echo '<label>' . $this->Html->link(__d('users', 'I forgot my password'), array('action' => 'reset_password')) . '</label></div>';

			echo $this->Form->hidden('User.return_to', array(
				'value' => $return_to));
			echo $this->Html->link( '' , array('action' => 'fblogin'),array('class'=>'sign-in-with-facebook'));
			echo $this->Form->end(__d('users', 'Submit'));
		?>
		
		
	</fieldset>
</div>
</div>
<div class='grid-50 ' >
	<div class="grid-100  dialogue-box users form">
	<h2><?php echo __d('users', 'Add User'); ?></h2>
	<fieldset>
		<?php
			echo $this->Form->create($model, array(
				'action' => 'add',
				'id' => 'RegisterForm'));
			echo $this->Form->input('username', array(
				'label' => __d('users', 'Username')));
			echo $this->Form->input('email', array(
				'label' => __d('users', 'E-mail (used as login)'),
				'error' => array('isValid' => __d('users', 'Must be a valid email address'),
				'isUnique' => __d('users', 'An account with that email already exists'))));
			echo $this->Form->input('password', array(
				'label' => __d('users', 'Password'),
				'type' => 'password'));
			echo $this->Form->input('temppassword', array(
				'label' => __d('users', 'Password (confirm)'),
				'type' => 'password'));
			$tosLink = $this->Html->link(__d('users', 'Terms of Service'), array('controller' => 'pages', 'action' => 'tos', 'plugin'=>''));
			echo $this->Form->input('tos', array(
				'label' => __d('users', 'I have read and agreed to ') . $tosLink));
			echo $this->Recaptcha->display();
			echo $this->Form->end(__d('users', 'Submit'));
		?>
	</fieldset>
</div>
</div>