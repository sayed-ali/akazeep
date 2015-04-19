<div class="posts form grid-100">
<?php echo $this->Form->create('Post', array('type' => 'file'));?>
		<h2><?php echo __('Add Post'); ?></h2>
	<?php
		//echo $this->Form->input('url');
		echo $this->Form->input('title');
		echo $this->Form->input('summary');
		echo $this->Form->input('keywords');
	?>
		<div class="grid-100 dialogue-box">
		<h2>الخبر</h2>
	<?php
		echo $this->Form->input('description');
		echo $this->Form->input('post_image', array('type' => 'file'));
	?>
		</div>
		<div class="grid-100 dialogue-box">
		<h2>الحقيقة</h2>
	<?php	

		echo $this->Form->input('correction');
		echo $this->Form->input('correction_image', array('type' => 'file'));
	?>
	</div>
	<?php
		//echo $this->Form->input('user_id');
		//echo $this->Form->input('allow_comments');
		//echo $this->Form->input('is_published');
		echo $this->Form->input('Category');
		echo $this->Recaptcha->display();
	?>
	<div class='submit'>
		<?php 
		echo $this->Form->submit('حفظ كنسخة', array('div'=>false, 'name'=>'draft')); 
		echo $this->Form->submit('حفظ نهائي', array('div'=>false, 'name'=>'publish')); 
		?>
		<?php echo $this->Form->end(); ?>
	</div>

</div>
<?php echo $this->element('wysihtml5'); ?>
