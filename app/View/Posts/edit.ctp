<div class="posts form grid-100">
<?php echo $this->Form->create('Post', array('type' => 'file'));?>
		<h2><?php echo __('Edit Post'); ?></h2>
	<?php
		//echo $this->Form->input('url');
		echo $this->Form->input('title');
		echo $this->Form->input('summary');
		echo $this->Form->input('keywords');
		echo $this->Form->input('post_image', array('type' => 'file'));
		echo $this->Form->input('description');
		echo $this->Form->input('correction');
		echo $this->Form->input('correction_image', array('type' => 'file'));
		echo $this->Form->input('allow_comments');
		echo $this->Form->input('Category');
		echo $this->Recaptcha->display();
	?>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<?php echo $this->element('wysihtml5'); ?>