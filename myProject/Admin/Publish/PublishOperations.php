<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

<?php 
session_start();

if (isset($_SESSION['is_login']) && $_SESSION['is_login']) {

} else {
	header("location: http://localhost/myProject/Admin/Outhentication/login.php");

}


desision();

function desision () {
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (!empty($_GET['oid'])) {
			$id = $_GET['oid'];
			if ($id == 1) {
				addNewOuther();
			}
			if ($id == 2) {
				updateOuther();
			}
			if ($id == 3) {
				deleteOuther();
			}

		}		

	}
}


function addNewOuther () {

	if (!empty($_POST['addOuther'])) {
		$add = $_POST['addOuther'];
		$connection = mysqli_connect('localhost','root','','booksystem');
			if (! $connection ) {
			echo "error";
			}else{
			}
		$query = "INSERT INTO publish (name) VALUES ('$add')";
		$result = mysqli_query($connection , $query);
			if ($result) {
			}else{
			echo "ERROR";
			}

			}
	}

function updateOuther () { 
	if (!empty($_POST['outhers_list']) && !empty($_POST['updateNewOutherName'])) {
		$choice = $_POST['outhers_list'];
		$new = $_POST['updateNewOutherName'];
		$connection = mysqli_connect('localhost','root','','booksystem');
			if (! $connection ) {
				echo "error";
			}else{
			}
		$query = "update publish set name = '$new' where name = '$choice'";

		$result = mysqli_query($connection , $query);
		if ($result) {
		}else{
			echo "ERROR";
		}

		}

}
function deleteOuther () {
	if (!empty($_POST['deleteOuther']) ) {
		$del = $_POST['deleteOuther'];
		$connection = mysqli_connect('localhost','root','','booksystem');
			if (! $connection ) {
				echo "error";
			}else{
			}
		$query = "delete from publish  where name = '$del'";

		$result = mysqli_query($connection , $query);
		if ($result) {
		}else{
			echo "ERROR";
		}

		}

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Done Updaet</title>
</head>
<body>
<div class="alert alert-success" role="alert">
  Done Operation
  <a href="http://localhost/myProject/Admin/Books/ShowAllBooks.php">Return Back</a>
</div>
</body>
</html>



