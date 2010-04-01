<?
	function deleteRow($table,$where,$db_location, $db_user,$db_pass,$db_db){
		$connector = new DbConnector($db_location, $db_user,$db_pass,$db_db);
		$query = 'DELETE FROM '.$table.' WHERE '.$where;
		if($connector->query($query)){
			$data = 'Your post was deleted succesfully';
		}else{
			$data = 'Sorry, there was an error with your deletion :(.';
		};
		return $data;
	}
?>