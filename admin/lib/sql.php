<?
include('settings.php');
include('dbconnector.php');
$sql_type = $_REQUEST['type'];
include '../models/inserts.php';
include '../models/selects.php';
include '../models/updates.php';


if(isset($sql_type)){
	if($sql_type == 'selectall'){
		$page = $_REQUEST['page'];
		echo $page;
		if(selectAll($page,$db_location, $db_user,$db_pass,$db_db)){
			$data['id'] = selectAll($page,$db_location, $db_user,$db_pass,$db_db);
		}else{
			echo $data['id'] = 'error';
		}

	}
}
?>