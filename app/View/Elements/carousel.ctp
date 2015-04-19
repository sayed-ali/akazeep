  

<?php
 $this->Html->script('jquery/jquery.easing', array('inline' => false));
  $this->Html->script('jquery/jquery.slidorion', array('inline' => false)); 
 $this->Html->css('jquery/slidorion', null,array('inline' => false));
/* First step: get the latest posts, the URL should be like your_controller_name/method_name/params */
//$posts = $this->requestAction('posts/lastposts/6');
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#slidorion').slidorion({controlNav :true});
	});
</script>
<style type="text/css">
	#slidorion{
		width:100%;
		margin-left: 0px;
		left:0px;
		border: none;
		box-shadow: none;
		padding: 0px;
		margin-bottom:10px;
		-moz-box-shadow: inset 0 0 2px #FFF, 0 0 5px #cacaca;
		-webkit-box-shadow: inset 0 0 2px white, 0 0 5px #CACACA;
		box-shadow: inset 0 0 2px white, 0 0 5px #CACACA
		background: $cccccc;
	}
	.slidorion .header{
		color: #B60000;
		font-family: 'Droid Arabic Kufi';
	}
	.slidorion .content{
		font-size: 1.0em;		
	}
	.slidorion .slide{
		text-align: center;
		background: #cccccc;
		vertical-align: middle;
		
	}
	.slidorion .slide img{
		width:100%;
		
	}
	.slide .slide-title {
		text-align: center;
		background: rgba(0, 0, 0, 0.7);
		min-height: 80px;		
		vertical-align: middle;
		position: absolute;
		bottom: 0px;
		width: 100%;
		color: #ffffff;
		font-family: 'Droid Arabic Kufi';
		font-size: 1.1em;
		font-weight: bold;
	}
	.slide .slide-title a{
		color: #ffffff;
		text-decoration: none;
;
	}
</style>

<div id="slidorion" class="slidorion" >
    <div class="slider">
    	<?php foreach($posts as $post): ?>
        <div class="slide">
        	<a href="<?=Router::url(array('action' => 'view', $post['Post']['url'])); ?>"><?= $this->Html->image('uploads/'.$post['Post']['post_image'], 
														array('alt' => $post['Post']['title']
																 ));?></a>
			 <div class="slide-title"><?= $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['url'])); ?></div>
																 	
		</div>
        <?php endforeach; ?>
    </div>

    <div class="accordion">
    	<?php foreach($posts as $post): ?>
        <div class="header"><?=$post['Post']['title']?></div>
        <div class="content"><?=$post['Post']['summary']?></div>
        <?php endforeach; ?>
    </div>
</div>
