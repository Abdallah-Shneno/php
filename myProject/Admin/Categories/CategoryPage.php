<?php 

session_start();

if (isset($_SESSION['is_login']) && $_SESSION['is_login']) {

} else {
	header("location: http://localhost/myProject/Admin/Outhentication/login.php");

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Outher</title>
	<style type="text/css">


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



				




		.addOutherDesign{
			margin: 2%;
			height: 40%;
			width: 90%;
			padding: 2%;
			background-color: #9dbeb9;
		}
		.updateOutherDesign{
			height: 40%;
			margin: 2%;
			width: 90%;
			padding: 2%;
			background-color: #9dbeb9;

		}
		.deleteherDesign{
			height: 40%;
			width: 90%;
			margin: 2%;
			padding: 2%;
			background-color: #9dbeb9;

		}
		h3{
			color: #ff8882;
			font-size: 140%;
		}
		.btns{
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
		.show{
			color: #bf1363;
		}
	</style>
</head>
<body>



	



<div class="deleteherDesign">
	<h3>All Categories</h3>
	<?php 

		$connection = mysqli_connect('localhost','root','','booksystem');
			if (! $connection ) {
				//	echo "error";
			}else{
				//	echo "db connection done";
				}
			$query = "SELECT name from category";
			$result = mysqli_query($connection , $query);
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result) ) {
							echo '<p class="show">'.'- '.$row['name'].'</p>';
						}
					}
					mysqli_close($connection);

					?>
</div>










	<div class="allOuthers"></div>

	<div class="addOutherDesign">
		<div class="my_div">
			<h3>Add New Category Part</h3>
				<form action="CategoryOperations.php?oid=1" method="POST">
				<label class="headers" for="bookImage_id">New Category Name</label>
				<input class="textInteres" type="text" name="addOuther" id="bookImage_id">
				<br><br><br>
				<button class="btns" type="submit" id="addNewOuther">ADD</button> 
				</form>
			</div>
	</div>
	<div class="updateOutherDesign">
		<div class="my_div">
				<h3>Update Category Part</h3>
				<form action="CategoryOperations.php?oid=2" method="POST">
				<label class="headers" for="bookImage_id">Old Category Name</label>
				<select name="outhers_list" id="outhers_list"> 
					<?php 
					$connection = mysqli_connect('localhost','root','','booksystem');
					if (! $connection ) {
						//	echo "error";
					}else{
						//	echo "db connection done";
						}
						$query = "SELECT * from category";
						$result = mysqli_query($connection , $query);
						if (mysqli_num_rows($result) > 0) {
							while ($row = mysqli_fetch_assoc($result) ) {

							echo('<option value="'.$row['name'].'">'.$row['name'].'</option>');
							}
							mysqli_close($connection);
						}

				?>
				</select>
				<br><br><br>
				<label class="headers" for="updateNewOutherName">New Category Name</label>
				<input class="textInteres" type="text" name="updateNewOutherName" id="updateNewOutherName">
				<br><br><br>
				<button class="btns" type="submit" id="updateOuther">UPDATEE</button> 
				</form>
				
			</div>
	</div>
	<div class="deleteherDesign">
		<div class="my_div">
				<h3>Delete Category Part</h3>
				<form action="CategoryOperations.php?oid=3" method="POST">
				<label class="headers" for="deleteOuther">Category Name</label>
				<select name="deleteOuther" id="deleteOuther"> 
					<?php 
					$connection = mysqli_connect('localhost','root','','booksystem');
					if (! $connection ) {
						//	echo "error";
					}else{
						//	echo "db connection done";
						}
						$query = "SELECT * from category";
						$result = mysqli_query($connection , $query);
						if (mysqli_num_rows($result) > 0) {
							while ($row = mysqli_fetch_assoc($result) ) {

							echo('<option value="'.$row['name'].'">'.$row['name'].'</option>');
							}
							mysqli_close($connection);
						}

				?>
				</select>
				<br><br><br>
				<button class="btns" type="submit" id="deleteOuther">DELETE</button> 
				</form>
			</div>
	</div>

</body>
</html>