<?php
	include('connect.php');
	$error = '';
	if (isset($_POST['tosubmit']))
	{
		if (!empty($_POST['content']) && !empty($_POST['subject']) && !empty($_POST['from'])) {
			$stmt = $conn->prepare("INSERT INTO mess (`who`, `subject`, `content`, `sent_time`) VALUES (?, ?, ?, ?)");
			$stmt->bind_param("ssss", $from, $sub, $cont, $time);
	
			$from = $_POST['from'];
			$sub = $_POST['subject'];
			$cont =  $_POST['content'];
			$time = date("Y/m/d");
			$stmt->execute();
			header("location: index.php");
		}
		
		else
			$error = '<p class="error">Please fill all fields.</p>';
	}
?>
<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Title of the post</title>

		<!-- Custom fonts for this template -->
		<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

		<!-- Custom styles for this template -->
		<link href="css/admin.css" rel="stylesheet">
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
				<div class="first-cont">
					<div class="form">
						<form acion="" method="post" class="login-form">
							<input name="subject" type="text" placeholder="Subject" />
							<input name="from" type="text" placeholder="From" />
							<textarea name="content" type="text" placeholder="Content" class="cont-in"></textarea>
							<?PHP echo $error; ?>
							<input type="submit" name="tosubmit" value="Send!" class="but"/>
						</form>
					</div>
				</div>
			</div>
		</header>

		<!-- Footer -->
		<footer>
			<div class="down-footer">
				<p class="copyright">Copyright &copy; gabiandthesun 2018</p>
			</div>
		</footer>

	</body>

</html>
