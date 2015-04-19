<?php
 
 	$this->set('title_for_layout', $post['Post']['title']); 
	 $this->Html->meta( 'description',  $post['Post']['summary'],  array('inline' => false)  );
	 $this->Html->meta( 'keywords',  $post['Post']['keywords'],  array('inline' => false)  );
	 $this->Html->meta( 'canonical',  Router::url(array('controller'=>'posts','action'=>'view',$post['Post']['url']),true),  array('inline' => false)  );
	 $this->Html->meta(array('name'=>'robots','content'=> 'index, follow, archive'),null,  array('inline' => false)  );
	 $this->Html->meta(array('property'=>'og:title','content'=> 'أكاذيب - ' . $post['Post']['title']),null,  array('inline' => false)  );
	 $this->Html->meta(array('property'=>'og:type','content'=> 'Post'),null,  array('inline' => false)  );
	 $this->Html->meta(array('property'=>'og:site_name','content'=>Router::url('/',true)),null,  array('inline' => false)  );
	 $this->Html->meta(array('property'=>'og:description', 'content'=> $post['Post']['summary']),null,  array('inline' => false)  );
	 if($post['Post']['post_image'])
	   $this->html->meta(array('property'=>'og:image',  'content'=>Router::url('/img/uploads/'.$post['Post']['post_image'], true)),null ,  array('inline' => false)  );
?>
<script language="javascript">
$(document).ready(function(){
$('#post-content a').attr("target","_blank");
});
	
</script>


<div id class="posts view grid-100">
	<div class="grid-70">
		<div class="grid-100">
			
			<?=$this->element('sharetbar',array(
					'url'=> Router::url(array('controller'=>'posts','action'=>'view',$post['Post']['url']),true)
				))?>
		</div>
		<br/>
		<div id="post-content" class='post-view grid-100'>
			<h1><?php  echo $post['Post']['title'] ; ?></h1>
			<div class='greyed'>
				
				<?php echo 'كتبه '.$post['User']['username'].'  '; ?>
				<?php echo ' وتم نشره في' . $this->Time->format(' l, j F Y - g:ia', $post['Post']['created']) ;  ?>
			</div>
			
			<h3>الخبــر</h3>
			<?php if($post['Post']['post_image']){?>
				<div class="grid-100 post-image">
					<?= $this->Html->image('uploads/'.$post['Post']['post_image'], 
														array('alt' => $post['Post']['title']
																 ));
							
					?>
				</div>
			<?php }?>
			<p>
				
				<?php  echo $post['Post']['description'] ; ?>
			</p>
			<h3>الحقيقـــة</h3>
				<?php
				if($post['Post']['correction_image'])
					echo $this->Html->image('uploads/'.$post['Post']['correction_image'], 
													array('alt' => $post['Post']['title'],
														  'class'=>'grid-100')); 
				?>		
			<p>
				<?php  echo $post['Post']['correction'] ; ?>
			</p>
		</div>
		<div class="grid-100">
			
			<?=$this->element('sharetbar',array(
					'url'=> Router::url(array('controller'=>'posts','action'=>'view',$post['Post']['url']),true)
				))?>
		</div>
		<?php echo $this->element('lastposts',array('limit'=>3,'vertical'=>false)); ?>
<div class="grid-50">
				<script type="text/javascript"><!--
google_ad_client = "ca-pub-8807171036723863";
/* Akazeep-side */
google_ad_slot = "7495374861";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div> 
<div class="grid-50" >
				<script type="text/javascript"><!--
google_ad_client = "ca-pub-8807171036723863";
/* Akazeep-side */
google_ad_slot = "7495374861";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>

		<div class="fb-comments" data-href="<?php echo Router::url(array('controller'=>'posts','action'=>'view',$post['Post']['url']),true); ?>" data-width="600" data-num-posts="30"></div>

	</div>
	<div class ='grid-30'>
		<?php echo $this->element('fblikebox', array('width'=>270,'show_faces'=>true, 'data_header'=> false,'data_stream'=>false)); ?>


		
		<?php
			if(!$post['User']['is_admin']) 
				echo $this->element('Users.user_thumbnail', array('user'=>$post['User'])); 
		?>
<div style="overflow: visible;
position: relative;
margin-right: -13px;
display: block;">
				<script type="text/javascript"><!--
google_ad_client = "ca-pub-8807171036723863";
/* Akazeep-side */ 
google_ad_slot = "7495374861";
google_ad_width = 300;
google_ad_height = 250; 
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>		
		<?php echo $this->element('lastposts',array('limit'=>3,'vertical'=>true)); ?>

		<div class="fb-recommendations" data-site="akazeep.com" data-width="270" data-height="450" data-header="true" data-border='false'></div>


		
	</div>
</div>


