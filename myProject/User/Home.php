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
	<title>Show All Books</title>
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
				background-color: #ffc2b4 ;
				display: inline-block;
				width: 100%;
				margin-top: 4%;

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
	
			#Booksubmit_id {
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
				.item{
					margin-left: 12.5%;
					margin-right: 10%;
					margin-top: 5%;
					margin-bottom: 5%;
					  border-radius: 25px;
					background-color: #f1f1f1;
					height: 20%;
					width: 20%;
 				 line-height: 80%;
 				 padding: 2%;
 				 font-size: 80%;
 				 overflow: auto;
 				 display: auto;
 				 float: left;	}


 				 		.myGroup{

				background-color: #9dbeb9 ;
				 overflow: visible;
 				 display: block;
 				 float: left;
 				 width: 100%;
			}
			.updatebtn{ text-decoration: none;
									font-size: 120%;
									color: #3c8dad;
									padding: 5%;
									margin-top: 10%;
									float: left;
									background-color: #dddddd; }
			.deletebtn{text-decoration: none;
									font-size: 120%;
									color: #c84b31;
									padding: 5%;
									margin: 10%;
									margin-left: 20%;
									float: left;
									background-color: #dddddd;
									 position: relative;

								}

								.imgView{
									 position: relative;
 									 clip: rect(0px,50px,50px,0px);
								}		
								.img {
									margin-left: 50px;
									height: 100px;
									width: 100px;
								}		

								.myBox {
										font-size: 150;
										margin-top: 5%;
										font-size: 150%;
										background-color: #ff8882 ;
										padding: 3%;
										color: #fff;
										float: all;
								}

		</style>
			
</head>
<body>


 <ul id="nav">
          <li><a href="#">All Books</a></li>
          <li><a href="UserCategory.php">Categories</a></li>
          <li><a href="UserPublisher.php">Publisher</a></li>
          <li><a href="UserOuthers.php">Outhers</a></li>
          <li><a href="..\Admin\Outhentication\login.php">Admin</a></li>

        </ul>




	<div class="myBox">
		
		<span>
			<h3 >Show All Books </h3>

			<form style="margin-left: 75%; position: relative;" action="" method="GET">
			<input type="text" style=" padding: 10px;" placeholder="type here" name="search" id="search">
			<span><button style=" padding: 10px;" type="submit">Search</button></span>
		</form>
		</span>
	</div>


<div class="myGroup">


					<?php 
						$connection = mysqli_connect('localhost','root','','booksystem');
					if (! $connection ) {
					//	echo "error";
					}else{
					//	echo "db connection done";
					}



										// (description LIKE '%$keywords%' OR item LIKE '%$keywords%')
												if (!empty($_GET['search'])) {
															$value  = $_GET['search'];
												$query = "SELECT * from book where bookName like '$value%' || BookOuther_name like '$value%' || bookPublish_name like '$value%'|| bookType like '$value%' ";

												}else{
													$query = "SELECT * from book ";
												}
		
								$result = mysqli_query($connection , $query);
								if (mysqli_num_rows($result) > 0) {
											while ($row = mysqli_fetch_assoc($result) ) {
								
												echo '<td>'.'<div class="item">' 
												 .'<div class="imgView"> <img class="img" src="'.'http://localhost/myProject/'. $row['bookImage'] .'"></div>'
												 .'<p>Book Name '. $row['bookName'].'</p>'
												 .'<p>Book outher name '. $row['BookOuther_name'].'</p>'
												 .'<p>Book Publish Name '. $row['bookPublish_name'].'</p>'
												 .'<p>Book Type '. $row['bookType'].'</p>'
												 .'<p>Book Number '. $row['bookNumber'].'</p>'
												 .'<p>State '. $row['state'].'</p>'						
												 .'</div>'.'</td>';


											}


								}


					

					/*
{
						$query = "SELECT * from book  ";


	$connection = mysqli_connect('localhost','root','','booksystem');
					if (! $connection ) {
					//	echo "error";
					}else{
					//	echo "db connection done";
					}
								$result = mysqli_query($connection , $query);
								if (mysqli_num_rows($result) > 0) {
											while ($row = mysqli_fetch_assoc($result) ) {
								
												echo '<td>'.'<div class="item">' 
												 .'<div class="imgView"> <img class="img" src="'.'http://localhost/myProject/'. $row['bookImage'] .'"></div>'
												 .'<p>Book Name '. $row['bookName'].'</p>'
												 .'<p>Book outher name '. $row['BookOuther_name'].'</p>'
												 .'<p>Book Publish Name '. $row['bookPublish_name'].'</p>'
												 .'<p>Book Type '. $row['bookType'].'</p>'
												 .'<p>Book Number '. $row['bookNumber'].'</p>'
												 .'<p>State '. $row['state'].'</p>'						
												 .'</div>'.'</td>';


											}


								}


					}

					*/
			
								mysqli_close($connection);

					?>





</div>








  <div id="footer">
      <p class="copyright">Copyright &#8858; 2021 IUG  | <a id="name" href="#">Coding by ABDALLAH SHNENO</a> | <a style="color: black; text-shadow: .2px 0px #000000;;" href="#">Support</a></p>
    </div>
	    </div>

  





</body>
</html>

<script type="text/javascript">
	$('#Booksubmit_id').click(function (e) {
		  var res = confirm("Are you sure ?");
		  if ( res == true ) {
		  		$('#addBookForm').submit();
		  }	

	});

</script>
