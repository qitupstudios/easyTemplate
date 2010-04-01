<? 
include 'models/selects.php';
$thePost = selectAllSingle('blog_form','id',$_REQUEST['id'],$db_location, $db_user,$db_pass,$db_db);
?>
<a href="<?=$base_url?>blog">&lt; Back</a>
<h2><a href="<?=$base_url?>blogPost/<?=$_REQUEST['id']?>"><?=$thePost[0]['title']?></a></h2>
<p>Written by: <?=$thePost[0]['author']?></p>
<p>Posted: <?=$thePost[0]['modified']?></p>
<hr />
<p><?=$thePost[0]['data']?></p>
<hr/>
<? $splitTags = explode(', ', $thePost[0]['tags']);?>
<p><strong>Tags: </strong>
<? foreach($splitTags as $k=>$v){?>
    <a href="<?=$base_url?>blog/<?=$v?>"><?=$v?></a>,
<? }?>
</p>