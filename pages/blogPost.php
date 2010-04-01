<? 
include 'models/selects.php';
$thePost = selectAllSingle('blog_form','id',$_REQUEST['id'],$db_location, $db_user,$db_pass,$db_db);
?>
<a href="<?=$base_url?>blog">&lt; Back</a>
<pre>
<? print_r($thePost);?>
</pre>