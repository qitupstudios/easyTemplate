<?
function insertNew($table,$fields,$values,$db_location, $db_user,$db_pass,$db_db){
	$connector = new DbConnector($db_location, $db_user,$db_pass,$db_db);
	$query = 'INSERT INTO '.$page.' ('.$fields.') VALUES('.$values.')';
	if($connector->query($query)){
		$data = 'success';
	}else{
		$data = 'error';
	};
}
