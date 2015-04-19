
<?php 	$this->Html->css('wysihtml5/bootstrap-wysihtml5',null, array("inline"=>false));?>
<?php	$this->Html->css('wysihtml5/bootstrap.min',null, array("inline"=>false));?>	






<?php	echo $this->Html->script(array('wysihtml5/wysihtml5-0.3.0.min',
'jquery/jquery-1.7.2.min',
'wysihtml5/prettify',
'wysihtml5/bootstrap.min',
'wysihtml5/bootstrap-wysihtml5',
'wysihtml5/bootstrap-wysihtml5.ar-AR'
)
);?>

<style type="text/css" media="screen">
	.textarea {
		padding: 0px;
	}
	form div{
		padding: 0px;
		
		float: right;
	}
	iframe{
		width:100%;
	}
	
	ul.wysihtml5-toolbar > li {
	    float: right;
	}
</style>




<script>
	
	var hello = $('textarea').wysihtml5({
		"stylesheets": ["<?php echo Router::url('/css/wysihtml5/wysiwyg-color.css'); ?>"],
		width:'100%',
		locale:'mo-MD',
		"font-styles": false 
	});
	hello.observe("load", function () {
		console.debug(1);
  		$(this.composer.iframe).autoResize();
	});
</script>