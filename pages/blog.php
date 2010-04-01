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
	$blog_limit = 3;
	if(isset($_REQUEST['id'])){
		$pageOn = (($_REQUEST['id'] - 1)* $blog_limit);
		$limit = $pageOn.', '.$blog_limit;
	}else{
		$pageOn = 0;
		$limit = $pageOn.', '.$blog_limit;
	}
	
	$data = selectAllLimit('blog_form','id DESC',$limit,$db_location, $db_user,$db_pass,$db_db);
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
                	<h3><a href="<?=$base_url?>blogPost/<?=$v?>"><?=$title[$k]?></a></h3>
                </div>
            	<div class="blog_date">
                	<?=date('M d, Y', strtotime($modified[$k]))?>
                </div>
                <div class="blog_author">
                	<p>Written By: <?=$author[$k]?></p>
                </div>
                <div class="blog_text">
                	<p><?=$blog_text[$k]?></p>
                </div>
                <? $splitTags = explode(', ', $tags[$k]);?>
                <div class="blog_tags">
                <p>
               	<? foreach($splitTags as $k=>$v){?>
	               	<a href="<?=$base_url?>blog/<?=$v?>"><?=$v?></a>,
                <? }?>
                </p>
                </div>
            </div>
            <hr />
     <? }?>
     <div class="blog_pagination">
    	<?
		$connector = new DbConnector($db_location, $db_user,$db_pass,$db_db);
     	$countquery="select id from blog_form";
		$sqlr=$connector->query($countquery);
		$pageCount = ceil($connector->getNumrows($sqlr)/ $blog_limit);
		?>
        <? if(($pageOn) != 0){?>
        <a href="<?=$base_url?>blog/<?=$_REQUEST['id']-1?>">&lt;- PREVIOUS</a>
        <? }?>
        
        <? if($_REQUEST['id'] <= 3){
			for($i=1;$i<=5;$i++){?>
            <? if($i == $_REQUEST['id']){?>
            	<?=$i?>
            <? }else{?>
	        	<a href="<?=$base_url?>blog/<?=$i?>"><?=$i?></a>
            <? }?>
		<? 	}
		   }
		?>
          <? if(($_REQUEST['id'] > 3) && ($_REQUEST['id'] < ($pageCount -2))){
		  	echo '...';
			for($i=($_REQUEST['id']-2);$i<=($_REQUEST['id']+2);$i++){?>
				<? if($i == $_REQUEST['id']){?>
                    <?=$i?>
                <? }else{?>
                    <a href="<?=$base_url?>blog/<?=$i?>"><?=$i?></a>
                <? }?>
		<? 	}
			echo '...';
		   }
		?>
        
        <? if($_REQUEST['id'] >= ($pageCount - 2)){
			for($i=($pageCount-5);$i<=($pageCount);$i++){?>
				<? if($i == $_REQUEST['id']){?>
                    <?=$i?>
                <? }else{?>
                    <a href="<?=$base_url?>blog/<?=$i?>"><?=$i?></a>
                <? }?>
		<? 	}
		   }
		?>
        <? if(($pageOn/$blog_limit) < ($pageCount-1)){?>
	        <a href="<?=$base_url?>blog/<?=$_REQUEST['id']+1?>">NEXT -&gt;</a>
		<? }?>
     </div>
    
</div>