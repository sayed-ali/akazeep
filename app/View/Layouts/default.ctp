
<!DOCTYPE html>
<html>
<head>
	<?php echo $this -> Html -> charset();?>
	<title>
		<?php echo 'أكاذيب - ' . $title_for_layout;?>
	</title>
	<?php
	echo '<!--[if lt IE 9]>';
	echo $this -> Html -> script('unsemantic/html5');
	echo '<![endif]-->';
	echo '<!--[if (gt IE 8) | (IEMobile)]><!-->';
	echo $this -> Html -> css('unsemantic/unsemantic-grid-responsive-rtl');
	echo '<![endif]-->';
	echo '<!--[if (lt IE 9) & (!IEMobile)]>';
	echo $this -> Html -> css('unsemantic/ie-rtl');
	echo '<![endif]-->';
	//echo $this->Html->css('flat-ui');
	
	?>
	<meta name="viewport"  content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1" />
	<meta property="fb:app_id" content="374866935962044"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
	<?php
	echo $this -> fetch('meta');
	echo $this -> fetch('css');
	echo $this -> fetch('script');

	echo $this -> Html -> meta('icon');
	echo $this -> Html -> css('akazeep');
	
	?>
	
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-40246421-2', 'akazeep.com');
	  ga('send', 'pageview');

	</script>
	
</head>
<body dir="rtl">
	<div id="fb-root"></div>
	<script>
		( function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id))
				return;
			js = d.createElement(s);
			js.id = id;
			js.src = "//connect.facebook.net/ar_AR/all.js#xfbml=1&appId=374866935962044";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
</script>
	<div id="container" >
		<div id="header" class="container-box grid-100">
			
			<div class="content-wrapper grid-50">
				<a href="<?=Router::url('/'); ?>"><?= $this->Html->image('logo/akazeep-logo.jpg');?> </a>
				 
				
    		</div>
    		<div class="grid-50">
    			<?= $this -> element('tbarlogin');?>
    		</div>
		</div>
		<div class="container-box menu-box grid-100 ">
			<div class="grid-65">
			<?= $this -> MenuBuilder -> build('main-menu');	?>
			</div>
			<div class="grid-35">
	    		<?= $this->element('searchbox');?>
	    	</div>
		 </div>
		
		<div id="content" class="container-box">
			<?php echo $this -> Session -> flash();?>

			<?php echo $this -> fetch('content');?>
		</div>
		<div id="footer" class="container-box">
			<div class="content-wrapper">
				جميع الحقوق محفوظة لموقع أكاذيب - احدى مشروعات <a href='http://www.wirosoft.com' target='_blank'>WIROSOFT</a> 
			</div>
		</div>
		<?= $this -> element('bbarfooter');?>
	</div>
	<div class="grid-100">
	<?php echo $this -> element('sql_dump');?>
	</div>
</body>
</html>
