<?php
	 $this->set('title_for_layout', $user['User']['username']);
	 $this->html->meta( 'description', 'مقالات كتبها مستخدم الموقع '. $user['User']['username'] ); 
	 $this->html->meta( 'og:title', 'أكاذيب - ' . $user['User']['username']  );
	 $this->html->meta( 'og:site_name', Router::url('/',true),  array('inline' => false)  );
	 $this->html->meta( 'og:description',  'مقالات كتبها مستخدم الموقع '. $user['User']['username'] ,  array('inline' => false)  );

?>

<?php echo $this->element('Users.user_summary', array('user'=>$user['User'])); ?>
<?php if(count($posts)) : ?>
	<h1> المشاركات (<?=count($posts)?>)</h1>
	 <?php foreach($posts as $post): ?>
		<div class='grid-100 post-thumbnail'>
			<div class="grid-33">
				<?php echo $this->Posts->postImage($post['Post']) ?>
			</div>
			<div class="grid-66">
				<h3><?php echo $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['url'])); ?></h3>
				<p>
					<?=$post['Post']['summary']?>
				</p>
			</div>
		</div>
	<?php endforeach; ?>

<?php else: ?>
	
	<h2>لا يوجد مقالات لهذا المستخدم</h2>


<?php endif;?>