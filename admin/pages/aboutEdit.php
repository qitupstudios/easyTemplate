<?
if(isset($_REQUEST['id'])){
	$id=$_REQUEST['id'];
	$field = 'id';
}
?>
<?
include 'models/selects.php';
include 'models/updates.php';

if(isset($_REQUEST['submit'])){
	$table = 'about';
	$setFields = "data='".$_REQUEST['data']."'";
	$where = "id='".$_REQUEST['zone_id']."'";
	$updateData = updateField($table, $setFields, $where, $db_location,$db_user,$db_pass,$db_db);
}

if(selectAllSingle('about',$field,$id,$db_location, $db_user,$db_pass,$db_db)){
	$theData = selectAllSingle('about',$field,$id,$db_location, $db_user,$db_pass,$db_db);
	foreach($theData as $value){
		$ids[] = $value['id'];
		$zone_title[] = $value['zone_title'];
		$data[] = $value['data'];
	}
}else{
	$data['id'] = 'error';
}
?>
<a href="<?=$base_url?>about">&lt; Back</a>
<? if(isset($id)){?>

<form action="" method="POST">
	<fieldset>
    	<legend>Working on <?=$zone_title[0]?></legend>
        <input type="hidden" name="zone_id" value="<?=$id?>"/>
        <? if(isset($updateData)){?>
        	<h2><?=$updateData?></h2>
        <? }?>
        <textarea name="data" rows='20' cols='100'><?=$data[0]?></textarea>
        <br />
        <input type="submit" name="submit" value="submit"/>
    </fieldset>
</form>
<? }else{?>
	<p>Sorry you picked an invalid area to edit</p>
<? }?>