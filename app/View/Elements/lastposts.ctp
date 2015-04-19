<?php 
/* First step: get the latest posts, the URL should be like your_controller_name/method_name/params */
if(!$limit)
	$limit=6;
$posts = $this->requestAction('posts/lastposts/'.$limit);
?>

<div class='grid-100'>
<?php foreach(array_slice($posts,0,3) as $post): ?>
	<?php if(!$vertical){?>
		<div class='grid-33 post-thumbnail' >
	<?php }else{?>
		<div class='grid-100 post-thumbnail' >
	<?php }?>
		<?= $this->Posts->postImage($post['Post']) ?>
		<H3><?= $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['url'])); ?></H3>
	</div>
<?php endforeach; ?>



</div>
