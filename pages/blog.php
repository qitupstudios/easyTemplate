<?
include 'models/selects.php';
$data = selectAll('blog',$db_location, $db_user,$db_pass,$db_db);
foreach($data as $value){
	$zone[] = $value['zone'];
	$zone_title[] = $value['zone_title'];
	$text[] = $value['data'];
}

?>
<div id="blog_container">
	<h1>BLOG</h1>
    <hr />
    <h3><?=$zone_title[0]?></h3>
    <p><?=$text[0]?></p>
    <h3><?=$zone_title[1]?></h3>
    <p><?=$text[1]?></p>
    
    <hr />
    
   
    <?
	
	$data = selectAllLimit('blog_form','id DESC','3',$db_location, $db_user,$db_pass,$db_db);
	foreach($data as $value){
		$id[] = $value['id'];
		$modified[] = $value['modified'];
		$author[] = $value['author'];
		$title[] = $value['title'];
		$blog_text[] = $value['data'];
		$tags[] = $value['tags'];
	}
	?>
     <h2>The Blog</h2>
     <hr/>
     
     <? foreach($id as $k=>$v){?>
     		<div class="blog_post">
           		<div class="blog_title">
                	<a href="<?=$base_url?>blogPost/<?=$v?>"><?=$title[$k]?></a>
                </div>
            	<div class="blog_date">
                	<?=date('M d, Y', strtotime($modified[$k]))?>
                </div>
                <div class="blog_author">
                	Written By: <?=$author[$k]?>
                </div>
                <div class="blog_text">
                	<?=$blog_text[$k]?>
                </div>
                <? $splitTags = explode(', ', $tags[$k]);?>
                <div class="blog_tags">
               	<? foreach($splitTags as $k=>$v){?>
	               	<a href="<?=$base_url?>blog/<?=$v?>"><?=$v?></a>,
                <? }?>
                </div>
            </div>
            <hr />
     <? }?>
    
</div>