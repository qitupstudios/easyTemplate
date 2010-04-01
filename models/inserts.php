<?
function insertNew($table,$fields,$values,$db_location, $db_user,$db_pass,$db_db){
	$connector = new DbConnector($db_location, $db_user,$db_pass,$db_db);
	$query = 'INSERT INTO '.$table.' ('.$fields.') VALUES('.$values.')';
	if($connector->query($query)){
		$data = 'Your post was entered succesfully';
	}else{
		$data = 'Sorry, there was an error with your post :(.';
	};
	return $data;
}
