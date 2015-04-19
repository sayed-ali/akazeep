<div class='grid-100 post-thumbnail user-summary'>
	<?php $userDetails = $this->requestAction(array('controller'=>'users','action'=>'userDetails','plugin'=>'users',$user['id'])); ?>

		<div class='grid-20'>
			<?php 
				
				$alternateImage = $user['facebook_id']?  'https://graph.facebook.com/'.$user['facebook_id'].'/picture?type=large"':Router::url('/img/profiles/anonymous.jpg',true).'"';
														
			?>
			<?= $this->Html->image(
					'profiles/'.$user['id'].'.jpg', 
					array(	'alt' =>$user['username'],
					 		'onError' => 'this.onerror = null;this.src="'.$alternateImage.';'
			)); ?>
		</div>
		<div class='grid-80'>
		<H1><?= $this->Html->link($user['username'],array('action'=>'user','controller'=>'posts',$user['id']));?></H1>
		<?php if($userDetails): ?>
			<a href="<?=$userDetails['User']['website']?>" target="blank"><?=$userDetails['User']['website']?></a>
			<p><?=$userDetails['User']['bio']?></p>
		<?php endif;?>
		</div>
		
</div>