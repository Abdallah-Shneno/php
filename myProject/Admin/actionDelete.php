
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<?php
	session_start();

if (isset($_SESSION['is_login']) && $_SESSION['is_login']) {

} else {
	header("location: http://localhost/myProject/Admin/Outhentication/login.php");

}






	deleteBook();
	
	function deleteBook () {
		if (isset($_GET['id'])) {
					$id = $_GET['id'];
						$connection = mysqli_connect('localhost','root','','booksystem');
					if (! $connection ) {
					$res = "ERROR IN CONNECTION";
					}else{
					
					}

					$query = "DELETE from book where id = $id";
					$result = mysqli_query($connection , $query);
							


				}else{
					echo "Somthing go wrong ";
				}
			}


	
?>

<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Done Updaet</title>
</head>
<body>
<div class="alert alert-success" role="alert">
  Done Delete Operation
  <a href="http://localhost/myProject/Admin/ShowAllBooks.php">Return Back</a>
</div>
</body>
</html>