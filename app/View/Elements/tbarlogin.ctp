<?php 
	$user = $this->Session->read('Auth.User');
	if(!$user)
	{ 
?>
	<ul class='tbarlogin'>
		<li><?= $this->Html->link(__('Login'),array('action'=>'login','controller'=>'users')); ?></li>
		<li><?= $this->Html->link( '' , array('action' => 'fblogin','controller'=>'users'),array('class'=>'sign-in-with-facebook')); ?></li>
	</ul>
<?php
	}
	else
	{
?>
	<ul class='tbarlogin'>
		<li>مرحباً <?=  $user['username'] ?></li>
		<li><?= $this->Html->link(__('My Account'),array('action'=>'edit','controller'=>'users',$user['id'])); ?></li>
		<li><?= $this->Html->link(__('My Posts'),array('action'=>'myposts','controller'=>'posts','plugin'=>'')); ?></li>
		<?php if($user['is_admin']):?>
			<li><?= $this->Html->link(__('Admin'),array('admin'=>true,'action'=>'index','controller'=>'posts','plugin'=>'')); ?></li>
		<?php endif;?>
		<li><?= $this->Html->link(__('Logout'),array('action'=>'logout','controller'=>'users')); ?></li>
	</ul>

<?php		
	}
?>