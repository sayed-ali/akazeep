<!--
></gcse:searchbox-only>
-->
<script type="text/javascript">

	$(document).ready(function(){
		$('#searchbox').keypress( function(e) {
	        if (e.keyCode == 13) {
	        	//alert($('#searchbox').val());
	            window.location = "<?=Router::url(array('controller'=>'pages','action'=>'search','plugin'=>''));?>?" + $.param( { 'q': $('#searchbox').val()}); 
	            return false; // prevent the button click from happening
	        }
		});
	});
</script>
<input type="text" id="searchbox" placeholder="كلمات البحث..." />