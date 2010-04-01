<?
function selectAll($page,$db_location, $db_user,$db_pass,$db_db){
	$connector = new DbConnector($db_location, $db_user,$db_pass,$db_db);
	$query = 'SELECT * FROM '.$page;
	$sqlrs=$connector->query($query) or die(mysql_error());
	while ($row=$connector->fetchArray($sqlrs)) { 
		$data[] = $row;
	};
	return $data;
}

function selectAllLimit($page,$order,$limit,$db_location, $db_user,$db_pass,$db_db){
	$connector = new DbConnector($db_location, $db_user,$db_pass,$db_db);
	$query = 'SELECT * FROM '.$page.' ORDER BY '.$order.' LIMIT '.$limit;
	$sqlrs=$connector->query($query) or die(mysql_error());
	while ($row=$connector->fetchArray($sqlrs)) { 
		$data[] = $row;
	};
	return $data;
}

function selectAllSingle($thepage,$field,$id,$db_location, $db_user,$db_pass,$db_db){
	$connector = new DbConnector($db_location, $db_user,$db_pass,$db_db);
	$query = 'SELECT * FROM '.$thepage.' WHERE '.$field.'='.$id;
	$sqlrs=$connector->query($query);
	while ($row=$connector->fetchArray($sqlrs)) { 
		$data[] = $row;
	};
	return $data;
}

function selectSome($page,$fields){
	$connector = new DbConnector();
	$query = 'SELECT '.$fields.' FROM '.$page;
	$sqlrs=$connector->query($get_data);
	while ($row=$connector->fetchArray($sqlrs)) { 
		$data['id'] = $row['id'];
	};
	return $data;
}

function selectSomeSingle($page,$fileds,$field,$id){
	$connector = new DbConnector();
	$query = 'SELECT '.$fields.' FROM '.$page.' WHERE '.$field.'='.$id;
	$sqlrs=$connector->query($get_data);
	while ($row=$connector->fetchArray($sqlrs)) { 
		$data['id'] = $row['id'];
	};
	return $data;
}

?>