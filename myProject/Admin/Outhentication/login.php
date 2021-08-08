<?php

$connection = mysqli_connect('localhost','root','','booksystem');
	if (! $connection ) {
		echo "error";
	}else{

	}



?>


<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<style type="text/css">
		.myForm{
			margin-left: 42%;
			margin-right: 40%;
			margin-top: 10%;
		}
		.labels{
			padding-right: 10%;
			font-size: 130%;
			color: #0A1931;
			font-weight: 900;
		}

		.formcontrol {
		  border: none;
		  border-bottom: 2px solid red;
		    background-color: #3CBC8D;
		    padding: 5%;
			}
		.go{
			margin: 10%;
			  border: none;
			  color: white;
			  padding: 15px 32px;
			  text-align: center;
			  text-decoration: none;
			  display: inline-block;
			  font-size: 16px;
			background-color: #008CBA;
		}


	</style>

</head>
<body>

	<div class="container">

		<?php

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$enc_password = md5($password);

			$query = "select name,pass from admin where name = '$username' AND pass = '$password'";
			$result = mysqli_query($connection, $query);

			if (mysqli_num_rows($result) > 0) {
				session_start();
				$_SESSION['is_login'] = true;

				header("location: http://localhost/myProject/Admin/Books/ShowAllBooks.php");
			} else {
				echo 'error';
			}
		}


		?>


		<div class="row">
			<div class="myForm">
				<h2 style=" color: #005792;">Log In </h2>
				<form action="" method="POST" >
					<div >
						<label class="labels">Username</label>
						<input type="text" name="username" class="formcontrol">
					</div>

					<div>
						<label class="labels" >Password</label>
						<input type="password" name="password" class="formcontrol">
					</div>

					<button class="go" >Login</button>
				</form>
			</div>
		</div>
	</div>

</body>
</html>