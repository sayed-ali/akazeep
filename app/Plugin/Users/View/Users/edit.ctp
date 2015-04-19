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
<div class="users form">
	<?php echo $this->Form->create($model , array('type' => 'file'));?>
		<fieldset>
			<legend><?php echo __d('users', 'Edit User'); ?></legend>
			<?php
				echo $this->Form->input('User.username');
				echo $this->Form->input('UserDetail.website');
				echo $this->Form->input('UserDetail.bio', array('type' => 'textarea'));
				echo $this->Form->input('profile_image', array('type' => 'file'));
				
			?>
			<p>
				<?php echo $this->Html->link(__d('users', 'Change your password'), array('action' => 'change_password')); ?>
			</p>
		</fieldset>
	<?php echo $this->Form->end(__d('users', 'Save')); ?>
</div>
<?php echo $this->element('Users/sidebar'); ?>