<?
include 'models/selects.php';

if(selectAll($page,$db_location, $db_user,$db_pass,$db_db)){
	$theData = selectAll($page,$db_location, $db_user,$db_pass,$db_db);
	foreach($theData as $value){
		$ids[] = $value['id'];
		$zone_title[] = $value['zone_title'];
	}
}else{
	$data['id'] = 'error';
}
?>
<div id="home_container">
    Admin Home
    <hr /><br />
	<ul>
    	<strong>Please Select an area to edit</strong>
    	<? foreach($ids as $k=>$v):?>
    	<li>
		    <a href="<?=$base_url?>homeEdit/<?=$v?>"><?=$zone_title[$k]?></a>
        </li>
        <? endforeach?>
    </ul>
    <br />
    <hr/>
    
</div>