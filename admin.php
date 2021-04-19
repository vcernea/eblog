<?php
	include('connect.php');
	session_start();
	if (!$_SESSION['log_user'])
		header("location: login.php");

	$name = $_SESSION['log_user'];
	$error = '';
	if (isset($_POST['tosubmit']))
	{
		$stmt = $conn->prepare("INSERT INTO posts (title, content, author, added_time) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("ssss", $title, $cont, $author, $time);

		$title = $_POST['titlu'];
		$cont =  $_POST['content'];
		$author = $name;
		$time = date("Y/m/d");
		$stmt->execute();
	}
	if (isset($_POST['deletep']))
	{
		$stmt = $conn->prepare("UPDATE posts SET state = 0 WHERE ID = ?");
		$stmt->bind_param("i", $od);

		$od = $_POST['idul'];
		$stmt->execute();
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
							<input name="titlu" type="text" placeholder="Title" />
							<textarea name="content" type="text" placeholder="content" class="cont-in"></textarea>
							<?PHP echo $error; ?>
							<input type="submit" name="tosubmit" value="Add post" class="but"/>
						</form>
					</div>
				</div>
			</div>
		</header>
		
		<div id="posts">
			<div class="container">
				<section class="special-bg">
					<div class="tbl-header">
						<table cellpadding="0" cellspacing="0" border="0">
							<thead>
								<tr>
									<th>Id</th>
									<th>Titlu</th>
									<th>Content</th>
									<th>Added time</th>
									<th>Public?</th>
									<th>Action</th>
								</tr>
							</thead>
						</table>
					</div>
					<div class="tbl-content">
						<table cellpadding="0" cellspacing="0" border="0">
							<tbody>
								
								
								<?php
									$sql = "SELECT * FROM posts ORDER BY id DESC";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while ($row = $result->fetch_assoc()) {
											if ($row['state'] == 1) 
												$del = "Yes";
											else
												$del = "No";
											echo '
													<tr>
														<td>' . $row['id'] . '</td>
														<td>' . $row['title'] . '</td>
														<td>' . substr($row["content"], 0, 100) . '...' . '</td>
														<td>' . date("d.m.Y", strtotime($row["added_time"])) . '</td>
														<td>' . $del . '</td>
														<td> <form action="" method="post"><input style="display: none" name="idul" type="text" value=' . $row['id'] . '/><input type="submit" name="deletep" value="Delete"/></form></td>
													</tr>';	
										}
									}
								?>
							</tbody>
						</table>
					</div>
				</section>

			</div>
		</div>

		<div id="posts">
			<div class="container">
				<section class="special-bg">
					<div class="tbl-header">
						<table cellpadding="0" cellspacing="0" border="0">
							<thead>
								<tr>
									<th>Id</th>
									<th>Subiect</th>
									<th>From</th>
									<th>Message</th>
									<th>Date</th>
								</tr>
							</thead>
						</table>
					</div>
					<div class="tbl-content">
						<table cellpadding="0" cellspacing="0" border="0">
							<tbody>
								
								
								<?php
									$sql = "SELECT * FROM mess ORDER BY id DESC";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while ($row = $result->fetch_assoc()) {
											echo '
													<tr>
														<td>' . $row['id'] . '</td>
														<td>' . $row['subject'] . '</td>
														<td>' . $row["who"] . '</td>
														<td>' . $row["content"] . '</td>
														<td>' . date("d.m.Y", strtotime($row["sent_time"])) . '</td>
													</tr>';	
										}
									}
								?>
							</tbody>
						</table>
					</div>
				</section>

			</div>
		</div>


		<!-- Footer -->
		<footer>
			<div class="down-footer">
				<p class="copyright">Copyright &copy; gabiandthesun 2018</p>
			</div>
		</footer>

	</body>

</html>
