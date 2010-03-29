<?
if(isset($_REQUEST['id'])){
	$id=$_REQUEST['id'];
	$field = 'id';
}
?>
<?
include 'models/selects.php';

if(selectAllSingle('home',$field,$id,$db_location, $db_user,$db_pass,$db_db)){
	$theData = selectAllSingle('home',$field,$id,$db_location, $db_user,$db_pass,$db_db);
	foreach($theData as $value){
		$ids[] = $value['id'];
		$zone_title[] = $value['zone_title'];
		$data[] = $value['data'];
	}
}else{
	$data['id'] = 'error';
}
?>
<? if(isset($id)){?>
<form action="" method="">
	<fieldset>
    	<legend>Working on <?=$zone_title[0]?></legend>
        <input type="hidden" name="zone_id" value="<?=$id?>"/>
        <textarea name="data" rows='20' cols='100'>
        	<?=$data[0]?>
        </textarea>
        <br />
        <input type="submit" name="submit" value="submit"/>
    </fieldset>
</form>
<? }else{?>
	<p>Sorry you picked an invalid area to edit</p>
<? }?>