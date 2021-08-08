
<?php 
# path dataBaseConnection.php  rYFnkI30MYPWlyKG


$connection = mysqli_connect('localhost','root','','booksystem');
if (! $connection ) {
	echo "error";
}else{
	echo "db connection done";
}

/*


function AddNewBook ($bookName , $bookOuther , $bookPublish , $bookType , $bookNumber , $state , $bookImage ) {
	$query = "INSERT INTO book (bookName,BookOuther_name,bookPublish_name,bookType,bookNumber,state,bookImage) VALUES ('$bookName','$bookOuther','$bookPublish','$bookType','$bookNumber','$state','$bookImage' )"
	$result = mysql_query($connection , $query);
	if ($result) {
		echo "All Done";
	}else{
		echo "ERROR";
	}
}


AddNewBook($bookName , $bookOuther , $bookPublish , $bookType  ,  $bookNumber ,$bookStatus , $Path_Uploads);


*/



?>