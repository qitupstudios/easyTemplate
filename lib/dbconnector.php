<?php
////////////////////////////////////////////////////////////////////////////////////////
// Class: DbConnector
// Purpose: Connect to a database, MySQL version
///////////////////////////////////////////////////////////////////////////////////////
class SystemComponent {
	var $settings;
	function getSettings() {
		
		// Database variables
		$settings['dbhost'] = 'localhost';
		$settings['dbusername'] = $db_user;
		$settings['dbpassword'] = $db_pass;
		$settings['dbname'] = $db_db;
		
		return $settings;
	}
}

class DbConnector extends SystemComponent {

var $theQuery;
var $link;

function DbConnector(){
	// Load settings from parent class
	$settings = SystemComponent::getSettings();

	// Get the main settings from the array we just loaded
	$host = $settings['dbhost'];
	$db = $settings['dbname'];
	$user = $settings['dbusername'];
	$pass = $settings['dbpassword'];

	// Connect to the database
	$this->link = mysql_connect($host, $user, $pass);
	mysql_select_db($db);
	register_shutdown_function(array(&$this, 'close'));
}

//*** Function: query, Purpose: Execute a database query ***
function query($query) {
	$this->theQuery = $query;
	return mysql_query($query, $this->link);
}

//*** Function: getQuery, Purpose: Returns the last database query, for debugging ***
function getQuery() {
	return $this->theQuery;
}

//*** Function: getNumRows, Purpose: Return row count, MySQL version ***
function getNumRows($result){
	return mysql_num_rows($result);
}

//*** Function: fetchArray, Purpose: Get array of query results ***
function fetchArray($result) {
	return mysql_fetch_array($result);
}

//*** Function: close, Purpose: Close the connection ***
function close() {
	mysql_close($this->link);
}


}

//Need this on all the pages:
function GetField($input) {
    $input=strip_tags($input);
    $input=str_replace("<","<",$input);
    $input=str_replace(">",">",$input);
    $input=str_replace("#","%23",$input);
    $input=str_replace("'","''",$input);
    $input=str_replace(";","%3B",$input);
    $input=str_replace("script","",$input);
    $input=str_replace("%3c","",$input);
    $input=str_replace("%3e","",$input);
    $input=str_replace("null","",$input);
    $input=str_replace("NULL","",$input);
	$input=str_replace("SELECT","",$input);
	$input=str_replace("select","",$input);
	$input=str_replace("%","",$input);
    $input=trim($input);
    return $input;
}

?>
