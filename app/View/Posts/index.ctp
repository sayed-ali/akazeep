<?php  

	$this->set('title_for_layout', 'الصفحة الرئيسية'); 
	$this->Html->meta( 'description',  'أكاذيب.كوم. فكرة الموقع هي كشف الأكاذيب المنتشرة في وسائل الإعلام و عرض حقيقتها مع شرح مبسط. أي حد يقدر يتصفح الأكاذيب المنشورة و كمان يقدر يشاركنا و يعرض أي كذبة هو شافها مع التصحيح بتاعها.' ,  array('inline' => false)  );
	 $this->Html->meta( 'keywords',  'أكاذيب , حقيقة , سياسة , اقتصاد, ثقافة , دين,علوم. طب ,حقائق',  array('inline' => false)  );
	 $this->Html->meta(array('property'=>'og:title','content'=> 'الصفحة الرئيسية لموقع أكاذيب' ),null,  array('inline' => false)  );
	 $this->Html->meta(array('property'=>'og:type','content'=> 'page'),null,  array('inline' => false)  );
	 $this->Html->meta(array('property'=>'og:site_name','content'=>Router::url('/',true)),null,  array('inline' => false)  );
	 $this->Html->meta(array('property'=>'og:description', 'content'=>'أكاذيب.كوم. فكرة الموقع هي كشف الأكاذيب المنتشرة في وسائل الإعلام و عرض حقيقتها مع شرح مبسط. أي حد يقدر يتصفح الأكاذيب المنشورة و كمان يقدر يشاركنا و يعرض أي كذبة هو شافها مع التصحيح بتاعها.' ),null,  array('inline' => false)  );
	 //if(false)
	 //	   $this->html->meta(array('property'=>'og:image',  'content'=>$post['Post']['post_image']),null ,  array('inline' => false)  );
	   
?>




<div class="posts grid-100">
	<div class="grid-100">
			<?php echo $this->element('carousel',  array('posts'=>array_slice($posts, 0, 5)));?>
		</div>
	<div class="grid-65">
		
		<div class='clear'></div>
		
			<?php foreach(array_slice($posts,6,3) as $post): ?>
			<div class="grid-33 post-thumbnail" style="height:250px">
				<?php $post = $post['Post'] ?>
				<?php	echo  $this->Posts->postImage($post);	?>
				<h3><?= $this->Html->link($post['title'], array('action' => 'view', $post['url'])); ?></h3>
			</div>
			<?php endforeach;?>
			
		<div class='clear'></div>
		<?php foreach(array_slice($posts,9,4) as $post): ?>
		<div class="grid-100 post-thumbnail">
			<?php $post = $post['Post']; ?>
			<div class="grid-35" >
				<?php	echo  $this->Posts->postImage($post);	?>
			</div>
			<div class="grid-65" >
				<h3><?= $this->Html->link($post['title'], array('action' => 'view', $post['url'])); ?></h3>
			</div>
		</div>
		<?php endforeach;?>
		
				
		
	</div>
	<div class="grid-35">
		
		<?php echo $this->element('fblikebox', array('width'=>300,'show_faces'=>true, 'data_header'=> true,'data_stream'=>false)); ?>
		<div class="fb-recommendations" data-site="akazeep.com" data-width="300" data-height="500" data-header="false"></div>

	</div>
</div>

	
	
	