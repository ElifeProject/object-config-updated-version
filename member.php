<?php 
include('session.php');
//session_start();
if(!isset($_SESSION["login_user"])){
	header("location :  index.php");
}
?>
<!doctype html>
<html>
<head>
<title>Welcome</title>
</head>
<body>
<h2>Welcome: <b><?php echo $login_session; ?></b></h2>
</body>
</html>



