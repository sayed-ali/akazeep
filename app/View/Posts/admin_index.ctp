<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script> 

<div class='grid-100'>
<ul class="tbar">
	<?php foreach ($states as $status): ?>
		<?php if(count($this->request->params['pass']) && $status == $this->request->params['pass'][0]): ?>
			<li class='active'><?= $this->Html->link($status,array('action'=>'admin_index',$status))?></li>
		<?php else: ?>
			<li><?= $this->Html->link($status,array('action'=>'admin_index',$status))?></li>
		<?php endif;?>	
	<?php endforeach ?>
</ul>
</div>
<h1><?= $this->request->params['pass']? $this->request->params['pass'][0]:'' ;?></h1>

<br/>


<p><?php
	echo $this->Paginator->counter(array(
		'format' => __d('users', 'Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
	));
	?></p>
 <?php foreach($posts as $post): ?>
	<div class='grid-100 post-thumbnail'>
		<div class="grid-20">
			&nbsp;
			<?php echo $this->Posts->postImage($post['Post']) ?>
		</div>
		<div class="grid-60" id="<?= 'post-'.$post['Post']['id'] ?>" >
			<h3><?php echo $this->Html->link($post['Post']['title'], array('action' => 'view','admin'=>false, $post['Post']['url'])); ?></h3>
			<p>
				<b>تاريخ الإنشاء:</b> <?= $post['Post']['created']?> <br/>
				<b>تاريخ التعديل:</b> <?= $post['Post']['modified']?> <br/>
			</p>
			<p>
				<?=$post['Post']['summary']?>
			</p>
		
			<?=$this->Html->link(__('edit'), array('action' => 'edit','admin'=>false, $post['Post']['id']),array('target'=>'_blank','style'=>'font-size:1.8em')); ?>
		
			
			<div style="float:right">
			
				<?php 
					foreach ($states as $status)
						echo $this->Js->Submit($status, array(
					  		'update'=>'#post-'.$post['Post']['id'],
							 'url'=>array(
								  'controller'=>'posts',
								  'action'=>'changestatus',
								  'admin'=>true,
								  $post['Post']['id'],
								  $status
								))
							);
					echo $this->Js->writeBuffer();	
				?>
					
							
			</div>
		</div>
		<div class="grid-20">
			<?php echo $this->element('Users.user_thumbnail', array('user'=>$post['User'])); ?>
		</div>
	</div>
<?php endforeach; ?>

<div class="grid-100" style="text-align: center;font-size: 1.5em">

<!-- Shows the page numbers -->

<?php echo $this->Paginator->prev('السابق', null, null, array('class' => 'disabled')); ?>
<?php echo $this->Paginator->numbers(); ?>
<?php echo $this->Paginator->next('التالي', null, null, array('class' => 'disabled')); ?>


</div>