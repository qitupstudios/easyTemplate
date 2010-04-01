<?
if(isset($_REQUEST['id'])){
	$id=$_REQUEST['id'];
	$field = 'id';
}
?>
<?
include 'models/selects.php';
include 'models/updates.php';
include 'models/inserts.php';

//SELECT POST DATA IF ID IS SET
if(isset($id)){
	if($id != 'new'){
		if(selectAllSingle('blog_form',$field,$id,$db_location, $db_user,$db_pass,$db_db)){
			$theData = selectAllSingle('blog_form',$field,$id,$db_location, $db_user,$db_pass,$db_db);
			foreach($theData as $value){
				$ids[] = $value['id'];
				$modified[] = $value['modified'];
				$author[] = $value['author'];
				$title[] = $value['title'];
				$data[] = $value['data'];
				$tags[] = $value['tags'];
			}
		}else{
			$data['id'] = 'error';
		}
	}
}

//IF THE FORM WAS SUBMITTED DO SOME SQL INSERTION OR UPDATE
if(isset($_REQUEST['submit'])){
	//IF ITS A NEW POST
	if($_REQUEST['post_id'] == 'new'){
		$table = 'blog_form';
		$fields = "author, title, data, tags";
		$values = '"'.$_REQUEST['author'].'","'.$_REQUEST['title'].'", "'.$_REQUEST['blog_post'].'", "'.$_REQUEST['tags'].'"';
		$insertData = insertNew($table,$fields,$values,$db_location, $db_user,$db_pass,$db_db);
		echo $insertData;
		if($insertData == 'Your post was entered succesfully'){
			$title[] = $_REQUEST['title'];
			$author[] = $_REQUEST['author'];
			$data[] = $_REQUEST['blog_post'];
			$tags[] = $_REQUEST['tags'];
		}
	//IF ITS AN EXISTING POST
	}else{
		$table = 'blog_form';
		$setFields = "author='".$_REQUEST['author']."', title='".$_REQUEST['title']."', data='".$_REQUEST['blog_post']."', tags='".$_REQUEST['tags']."'";
		$where = "id='".$_REQUEST['post_id']."'";
		$updateData = updateField($table, $setFields, $where, $db_location,$db_user,$db_pass,$db_db);
	}
}

?>
<? if(isset($id)){?>
<a href="<?=$base_url?>blogPosts">&lt; Back</a> -- <? if($id != 'new'){?> <a href='<?=$base_url?>blogPosts/delete/<?=$id?>'>Delete this Post</a><? }?>
<form action="" method="POST">
	<fieldset>
    	<legend>Working on <strong><?=$title[0]?> -- <?=date('M d, Y', strtotime($modified[0]));?></strong></legend>
        <input type="hidden" name="post_id" value="<?=$id?>"/>
        <? if(isset($updateData)){?>
        	<h2><?=$updateData?></h2>
        <? }?>
        <? if(isset($insertData)){?>
        	<h2><?=$insertData?></h2>
        <? }?>
        <label for='author'>Author</label><br />
        <input type="text" name="author" value="<?=$author[0]?>"/>
        <br /><br />
        <label for='title'>Title</label><br />
        <input type="text" name="title" value="<?=$title[0]?>"/>
        <br /><br />
        <label for='blog_post'>Blog Post</label><br />
        <textarea name="blog_post" rows='20' cols='100'><?=$data[0]?></textarea>
        <br /><br />
        <label for='tags'>Tags</label><br />
        <input type="text" name="tags" value="<?=$tags[0]?>"/>
        <br />
        <input type="submit" name="submit" value="submit"/>
    </fieldset>
</form>
<? }else{?>
	<p>Sorry you picked an invalid post to edit</p>
<? }?>