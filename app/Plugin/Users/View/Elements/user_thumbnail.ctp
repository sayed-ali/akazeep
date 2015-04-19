<div class='grid-100 post-thumbnail user-summary'>
		
		<div class='grid-60'>
		<H1><?= $this->Html->link($user['username'],array('action'=>'user','controller'=>'posts',$user['id']));?></H1>
		</div>
		<div class='grid-40'>
		<?php 
				$alternateImage = $user['facebook_id']?  'https://graph.facebook.com/'.$user['facebook_id'].'/picture?type=large"':Router::url('/img/profiles/anonymous.jpg',true).'"';
														
			?>
			<?= $this->Html->image(
					'profiles/'.$user['id'].'.jpg', 
					array(	'alt' =>$user['username'],
					 		'onError' => 'this.onerror = null;this.src="'.$alternateImage.';'
			)); ?>
		</div>
</div>