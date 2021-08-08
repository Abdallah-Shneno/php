
	<?php
	session_start();

if (isset($_SESSION['is_login']) && $_SESSION['is_login']) {

} else {
	header("location: http://localhost/myProject/Admin/Outhentication/login.php");

}

				if (isset($_GET['id'])) {
					$id = $_GET['id'];
						$connection = mysqli_connect('localhost','root','','booksystem');
					if (! $connection ) {
					//	echo "error";
					}else{
					//	echo "db connection done";
					}
	
					$query = "SELECT * from book where id = $id";

					$result = mysqli_query($connection , $query);
								if (mysqli_num_rows($result) > 0) {
									$row = mysqli_fetch_assoc($result);


				}
			}

	?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<title>Update Book</title>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<style type="text/css">
		

		ul#nav {
	margin: 0 0 20px 0;
	height: 40px;
	line-height: 45px;
	font-size: 1.2em;
	font-family: "Times New Roman", serif;
	overflow: hidden;
			color: #fff;

}
ul#nav li {
	display: inline;
	list-style-type: none;
	text-transform: uppercase;
	margin: 0 20px 0 0;

}
ul#nav li a {
	color: #bf1363;
	font-weight: 100;
	text-decoration: none;
}
ul#nav li a:hover {
	color: #343a40;
		text-decoration: none;

}




				#nav{
	          	background-color: #ffc2b4 ;
	          	margin-top: 1%;
	          	padding-top: 1%;
	          	padding-bottom: 1%;
	          	text-align: center;
				}

				#footer{
									margin-top: 4%;

					width: 100%;
				background-color: #ffc2b4 ;
				display: inline-block;

				}

				#name:hover {
					color: #453e3b;
				}

				#name {
					color: #fff;
						text-decoration: none;

				}

			p.copyright {
				font-size: 100%;
				font-family: "Times New Roman", serif;
				color: #000;
				text-transform: uppercase;
				margin-top: 3%;
				margin-bottom: 1%;
				margin-left: 25%;
				padding-bottom: 2%;
				padding-top: 2%;
			}


			.titlesA1{
				font-size: 150;
				margin-top: 5%;
				font-size: 150%;
				background-color: #ff8882 ;
				padding: 3%;
				color: #fff;
			}

			.titlesA2{
				font-size: 150%;
				color: #c84b31;
			}
			body{
				margin-right: 12%;
				margin-left: 12%;
				font-family: Arial, Helvetica, sans-serif;
			}		
			.headers{
				font-family: Arial, Helvetica, sans-serif;
				font-size: 135%;
				color: #194350;
			}	
			.bookInfo{
				font-family: Arial, Helvetica, sans-serif;
				font-size: 150%;
			}
			.myGroup{
				padding-left: 5%;
				padding-top: 0.4%;
				padding-bottom: 5%;
				background-color: #9dbeb9 ;
			}
			#BooksubmitUpdate_id {
				  background-color: #4CAF50;
				  border: none;
				  color: white;
				  padding: 15px 32px;
				  text-align: center;
				  text-decoration: none;
				  display: inline-block;
				  font-size: 16px;
				  margin-left: 35%;
				  margin-top: 3%;
				  cursor: pointer;
				}
				select {
				  width: 20%;
				  border: none;
				  border-radius: 4px;
				  background-color: #f1f1f1;
				}
				.textInteres {
				  width: 20%;
				  padding: 0.5%;
				  box-sizing: border-box;
				}
				.my_div{
					margin: 2%;
				}

		</style>
</head>
<body>









	<h3 class="titlesA1">Update Book </h3>


<div class="myGroup">
	

<form action= "ActionUpdateBook.php?id=<?php echo($id) ; ?>" id="addBookForm_"  method="POST" enctype="multipart/form-data">
		<p class="bookInfo">Book Information</p>
			<div class="my_div"> <label class="headers" for="BookName_id">Book Name</label>
					<input class="textInteres" type="text" placeholder="Book Name" name="bookName_name" id="BookName_id" value="<?= ((isset($row))? $row["bookName"]:"" )?>">
			</div>
			<div class="my_div"> 
				<label class="headers" for="BookOuther_id">Book Outher</label>
					<input class="textInteres" type="text" placeholder="Book Name" name="BookOuther_name" id="BookName_id" value="<?= ((isset($row))? $row["BookOuther_name"]:"" )?>">
			</div>

			<div class="my_div"> 
				<label class="headers" for="BookPublish_id">Book Publish</label>
						<input class="textInteres" type="text" placeholder="Book Name" name="BookPublish_name" id="BookName_id" value="<?= ((isset($row))? $row["bookPublish_name"]:"" )?>">

			</div>
			<div class="my_div"> 
				<label class="headers" for="BookType_id">Book Type</label>
						<input class="textInteres" type="text" placeholder="Book Name" name="BookType_name" id="BookName_id" value="<?= ((isset($row))? $row["bookType"]:"" )?>">

				
			</div>			
			 
			 <div class="my_div">
			 	<label class="headers" for="BookNumber_id">International Standard Book Number </label>
					<input class="textInteres" type="text" placeholder="Standard Book Number" name="BookNumber_name" id="BookNumber_id" value="<?= ((isset($row))? $row["bookNumber"]:"" )?>">
			</div>

		
			<div class="my_div"> 
				<label class="headers" >Book Status</label>
				<input type="radio" name="state" value="f" <?php  if (isset($row) && $row['state'] == 'f') echo 'checked'; ?> > Free
				<input type="radio" name="state" value="p" <?php  if (isset($row) && $row['state'] == 'p') echo 'checked'; ?>  > Paid
			</div>

		


			<div class="my_div">
				<label class="headers" for="bookImage_id">Book Image</label>
				<input type="file" name="bookImage" id="bookImage_id">
			</div>

			
			<div>
					<button type="submit" id="BooksubmitUpdate_id">Update Book</button> 
			</div>
			
	</form>



	
</div>









  





</body>

</html>

