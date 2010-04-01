<?
include 'models/selects.php';
include 'models/deletes.php';

if(isset($_REQUEST['id'])){
	if($_REQUEST['id'] == 'delete'){
	$table = 'blog_form';
	$where = 'id="'.$_REQUEST['id2'].'"';
	$deleteData = deleteRow($table,$where,$db_location, $db_user,$db_pass,$db_db);
	}
}

if(selectAll('blog_form',$db_location, $db_user,$db_pass,$db_db)){
	$theData = selectAll('blog_form',$db_location, $db_user,$db_pass,$db_db);
	foreach($theData as $value){
		$ids[] = $value['id'];
		$title[] = $value['title'];
	}
}else{
	$data['id'] = 'error';
}
?>
<div id="contact_container">
    Admin Blog Page
    <? if(isset($deleteData)){?>
    <h2><?=$deleteData?></h2>
    <? }?>
    <hr /><br />
	<ul>
    	<strong>Please Select a post to edit or <a href='<?=$base_url?>blogPostsEdit/new'>ADD A NEW POST</a></strong>
    	<? foreach($ids as $k=>$v):?>
    	<li>
		    <a href="<?=$base_url?>blogPostsEdit/<?=$v?>"><?=$title[$k]?></a>
        </li>
        <? endforeach?>
    </ul>
    <br />
    <hr/>
    
</div>