<?
function updateField($table,$setFields,$where,$db_location, $db_user,$db_pass,$db_db){
	$connector = new DbConnector($db_location, $db_user,$db_pass,$db_db);
	$query = 'UPDATE '.$table.' SET '.$setFields.' WHERE '.$where;
	if($connector->query($query)){
		$data = 'Your update was successful!';
	}else{
		$data = 'Sorry, there was an error with your update :(';
	};
	return $data;
}
?>