<?
include 'models/selects.php';

$contacts = selectAll('contact_form',$db_location, $db_user,$db_pass,$db_db);
foreach($contacts as $row){
	$ids[] = $row['id'];
	$fname[] = $row['fname'];
	$lname[] = $row['lname'];
	$email[] = $row['email'];
	$data[] = $row['data'];
	$date[] = $row['date'];
}
?>
<table>
	<tr>
    	<td><strong>First Name</strong></td><td><strong>Last Name</strong></td><td><strong>Email</strong></td><td><strong>Question/Comment</strong></td><td><strong>Date</strong></td>
    </tr>
<? foreach($ids as $k=>$v){?>
	<tr>
    	<td><?=$fname[$k]?></td><td><?=$lname[$k]?></td><td><?=$email[$k]?></td><td><?=$data[$k]?></td><td><?=date('m/d/y, h:m:s',strtotime($date[$k]))?></td>
    </tr>
<? }?>
</table>