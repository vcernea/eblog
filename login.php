<?php
	include('connect.php');
	session_start();
	if (isset($_SESSION['log_user']))
		header("Location: admin.php");

	$error = '';
	if(isset($_POST['tosubmit']))
	{
		$myusername = mysqli_real_escape_string($conn, $_POST['login']);
		$mypassword = md5(mysqli_real_escape_string($conn, $_POST['pass']));

		$sql = "SELECT id FROM admins WHERE login = '$myusername' and password = '$mypassword'";
		$result = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($result);

		if ($count == 1)
		{
			$_SESSION['log_user'] = $myusername;
			header("Location: admin.php");
		} else {
			$error = '<p class="error">Incorrect username or password (or you have to verify email).</p>';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Our Blog :3</title>

		<!-- Custom fonts for this template -->
		<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

		<!-- Custom styles for this template -->
		<link href="css/login.css" rel="stylesheet">
		<link href="css/navbar.css" rel="stylesheet">

	</head>

	<body>

		<!-- Navigation -->
		<nav id="nav" role="navigation">
			<a href="#nav" title="Show navigation">Show navigation</a>
			<a href="#" title="Hide navigation">Hide navigation</a>
			<ul class="clearfix">
				<li><a href="about.html">About</a></li>
				<li><a href="index.php">Home</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</nav>

		<!-- Page Header -->
		<header class="masthead">
			<div class="login-page">
				<div class="form">
					<form acion="" method="post" class="login-form">
						<input name="login" type="text" placeholder="username" />
						<input name="pass" type="password" placeholder="password" />
						<?PHP echo $error; ?>
						<input type="submit" name="tosubmit" value="Login" class="but"/>
						</form>
				</div>
			</div>
		</header>

		<!-- Footer -->
		<footer>
			<div class="container">
				<p class="copyright text-muted">Copyright &copy; gabiandthesun 2018</p>
			</div>
		</footer>
	</body>

</html>
