<? include('lib/settings.php');?>
<? include('lib/dbconnector.php');?>
<? 
if(isset($_REQUEST['p'])){
	$page = $_REQUEST['p'];
}else{
	$page = 'home';
}
?>

<? include('includes/header.php');?>
<? include('pages/'.$page.'.php');?>
<? include('includes/footer.php');?>