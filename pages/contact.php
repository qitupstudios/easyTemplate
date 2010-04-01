<?
include 'models/selects.php';
include 'models/inserts.php';
$data = selectAll('contact',$db_location, $db_user,$db_pass,$db_db);
foreach($data as $value){
	$zone[] = $value['zone'];
	$zone_title[] = $value['zone_title'];
	$text[] = $value['data'];
}

?>
<div id="contact_container">
	<h1>CONTACT<h1>
    <hr />
    <h3><?=$zone_title[0]?></h3>
    <p><?=$text[0]?></p>
    <h3><?=$zone_title[1]?></h3>
    <p><?=$text[1]?></p>

    <hr />
    
    <? if(isset($_REQUEST['submit'])){
		$fname = mysql_real_escape_string($_REQUEST['fname']);
		$lname = mysql_real_escape_string($_REQUEST['lname']);
		$email = mysql_real_escape_string($_REQUEST['email']);
		$theComment =  mysql_real_escape_string($_REQUEST['comment']);
		$table = 'contact_form';
		$fields = 'fname, lname, email, data';
		$values = '"'.$fname.'","'.$lname.'","'.$email.'","'.$theComment.'"';
		$insertData = insertNew($table,$fields,$values,$db_location, $db_user,$db_pass,$db_db);
		if($insertData == 'Your post was entered succesfully'){?>
        	<h2>Thank you for contacting us.</h2>
        <? }else{?>
			<h2>Sorry, there was an error, we are trying to fix it asap.</h2>
		<? }?>
      <? }else{?>
	 <form action="" method="POST">
    	<fieldset>
        	<legend><h3>Contact Form</h3></legend>
			<label for='fname'>First Name</label>
            <input type="text" name="fname"/>
            <br />
            <label for='lname'>Last Name</label>
            <input type="text" name="lname"/>
            <br />
            <label for='email'>Email</label>
            <input type="text" name="email"/>
            <br />
            <label for='comment'>Questions/Comments</label><br />
            <textarea name="comment"></textarea>
            <br /><br />
            <input type="submit" name="submit" value="submit"/>
        </fieldset>
    </form>
	<? }?>
</div>