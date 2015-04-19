<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>

<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<!-- static pages -->
    <url> 
        <loc><?php echo Router::url('/',true); ?></loc> 
        <changefreq>hourly</changefreq> 
        <priority>1.0</priority> 
    </url> 
    <url> 
        <loc><?php echo Router::url(array('controller'=>'users','action' => 'login','plugin'=>'users'),true); ?></loc> 
        <changefreq>daily</changefreq> 
        <priority>1.0</priority> 
    </url>
    <url> 
        <loc><?php echo Router::url(array('controller'=>'pages','action' => 'contact-us','plugin'=>''),true); ?></loc> 
        <changefreq>daily</changefreq> 
        <priority>1.0</priority> 
    </url>
         
    <?php foreach ($posts as $post):?> 
    <url> 
        <loc><?php echo Router::url(array('controller'=>'posts','action' => 'view', $post['Post']['url'],'plugin'=>''),true); ?></loc> 
        <lastmod><? echo $this->Time->format('Y-m-d', $post['Post']['modified']) ;  ?></lastmod> 
        <priority>0.8</priority> 
    </url> 
    <?php endforeach; ?> 
</urlset> 