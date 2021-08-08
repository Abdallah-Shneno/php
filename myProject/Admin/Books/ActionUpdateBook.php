<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

<?php


session_start();

if (isset($_SESSION['is_login']) && $_SESSION['is_login']) {

} else {
	header("location: http://localhost/myProject/Admin/Outhentication/login.php");

}

	/*
	$query = "INSERT INTO book (bookName,BookOuther_name,bookPublish_name,bookType,bookNumber,state,bookImage) VALUES ('$bookName',
		'$bookOuther','$bookPublish','$bookType','$bookNumber','$bookStatus','$Path_Uploads')";
		
	*/
/*

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$v = $_GET['id'];
	echo "$v value";
}




 &&
		 !empty($_POST['BookOuther_name']) &&
		 !empty($_POST['BookPublish_name']) &&
		 !empty($_POST['BookType_name']) &&
 		 !empty($_POST['BookNumber_name']) &&
 		 !empty($_POST['state']) &&
 		 !empty($_FILES['bookImage'])


*/

updateOperation();
function updateOperation () {

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if ( !empty($_POST['bookName_name'])
	 ){

	 $id = $_GET['id'];

	 $bookName = $_POST['bookName_name'];
	 $bookOuther = $_POST['BookOuther_name'];
	 $bookPublish = $_POST['BookPublish_name'];
	 $bookType = $_POST['BookType_name'];
	 $bookNumber = $_POST['BookNumber_name'];
	 $bookStatus = $_POST['state'];
	 if ($bookStatus == "f") {
	 	$bookStatus = "free" ;
	 }else{
	 	$bookStatus = "paid" ;
	 }

	 // print vars to be comfermed that the operation was done

	// file upload opearation

	$bookNameUbloade = $_FILES['bookImage']['name'];
	$bookSize = $_FILES['bookImage']['size'];
	$bookTmp = $_FILES['bookImage']['tmp_name'];
	$bookTypeUbloade = $_FILES['bookImage']['type'];
	$file_extention = strtolower(pathinfo($bookNameUbloade , PATHINFO_EXTENSION));
	$fileNewName = strval(time() + rand(1,9999999999)) . ".$file_extention"; 
	$Path_Uploads = '../../Uploads/' . $fileNewName;
	move_uploaded_file($bookTmp, $Path_Uploads);
		$img = str_replace('../','', $Path_Uploads);

	if (file_exists($Path_Uploads)) {
		$file_res = "Done Upload file";

	}

	// DB insert opearation run here

	$connection = mysqli_connect('localhost','root','','booksystem');
	if (! $connection ) {
		echo "error";
	}else{
	}
	// 
	$query = "update book set bookName = '$bookName' , BookOuther_name = '$bookOuther' , bookPublish_name = '$bookPublish' , bookType = '$bookType' , bookNumber = '$bookNumber' , state = '$bookStatus' ,bookImage = '$img' where id  = $id ";

	$result = mysqli_query($connection , $query);
	if ($result) {
		$res =  "Done Update Operation";
	}else{
		echo "ERROR";
	}



	}else{ echo "try again som fields empty OR nothing go wroing";}	
	}else{
		echo "error http request !!!";
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
  Done Update Operation
  <a href="http://localhost/myProject/Admin/ShowAllBooks.php">Return Back</a>
</div>
</body>
</html>

