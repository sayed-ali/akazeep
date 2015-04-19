<script language="JavaScript">
	function statusChanged(){
		var select = document.getElementById('selectStatus');
		window.location='<?= Router::url(array("action"=>"myposts"),true);?>/' + select.value;
	}
</script>

<h1>مقالاتي</h1>
<div class="grid-100">
	<select style="width:auto" onchange='statusChanged();' id='selectStatus' value='<?=$status?>'>
		<?php
			$states = array('draft','pending','published');
			foreach ($states as  $state):
		?>
			<option value='<?=$state?>' <?= $state==$status? 'selected="selected"' : ''; ?> ><?=__($state)?></option>
		<?php endforeach;?>
	</select> 
</div>

<br/>

 <?php foreach($posts as $post): ?>
	
	<div class='grid-100 post-thumbnail'>
		<div class="grid-33">
			<?php echo $this->Posts->postImage($post['Post']) ?>&nbsp;
		</div>
		
		<div class="grid-66">
			<h3><?php echo $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['url'])); ?></h3>
			<p>
				<?=$post['Post']['summary']?>
			</p>
			<div class='greyed'>
				<?php echo ' تاريخ آخر تعديل : ' . $this->Time->format(' l, j F Y - g:ia', $post['Post']['created']) ;  ?>
				<hr/>
			</div>
			<?php
				if($status=='draft') 
					echo $this->Html->link(__('edit'), array('action' => 'edit', $post['Post']['id'])); 
			?>
			<?=$this->Html->link(__('delete'), array('action' => 'delete', $post['Post']['id'])); ?>
		</div>
	</div>
<?php endforeach; ?>
