<?php 
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Log Out</title>
</head>
<body>

</body>
</html>
<?php
session_unset();
session_destroy();

	header("location: http://localhost/myProject/Admin/Outhentication/login.php");

 ?>