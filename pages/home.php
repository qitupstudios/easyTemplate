<?
include 'models/selects.php';
$data = selectAll('home',$db_location, $db_user,$db_pass,$db_db);
foreach($data as $value){
	$zone[] = $value['zone'];
	$zone_title[] = $value['zone_title'];
	$text[] = $value['data'];
}

?>

<div id="home_container">
<h1>HOME</h1>
<hr />
<h3><?=$zone_title[0]?></h3>
<p><?=$text[0]?></p>
<h3><?=$zone_title[1]?></h3>
<p><?=$text[1]?></p>

<hr />
</div>