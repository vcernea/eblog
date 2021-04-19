<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Gabi and the sun</title>

		<!-- Custom fonts for this template -->
		<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

		<!-- Custom styles for this template -->
		<link href="css/navbar.css" rel="stylesheet">
		<link href="css/clean-blog.css" rel="stylesheet">

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
	





		<!-- <nav class="navbar">
			<ul class="nav-ul">
				<li class="nav-li"><a href="about.html">About</a></li>
				<li class="nav-li home-btn"><a href="index.php">Home</a></li>
				<li class="nav-li"><a href="contact.php">Contact</a></li>
			</ul>
		</nav> -->

		<!-- Page Header -->
		<header class="masthead">
				<div class="first-cont">
					<div class="">
						<div class="site-heading">
							<h1>Our Blog</h1>
							<span class="subheading">The best blog you have ever seen. Because of you, Gabi</span>
						</div>
						<div id="godown">
							<a class="js-scroll-trigger" href="#posts"><span></span>Scroll</a>
						</div>
					</div>
				</div>
		</header>

		<!-- Main Content -->
		<div id="posts">
			<div class="container">
				
				
				
				<?php
					include('connect.php');
					$sql = "SELECT * FROM posts WHERE state = 1 ORDER BY id DESC";
					$result = $conn->query($sql);
					$i = 0;
					$plus = '';
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {

							if ($i > 0)
								$plus = '<hr class="myhr">';
							else
								$plus = '';

							echo  $plus . '	<div class="post-preview">
										<a href="post.php?id=' . $row["id"] . '">
											<h2 class="post-title">' . $row["title"] . '</h2>
										</a>
										<h3 class="post-subtitle">' . substr($row["content"], 0, 400) . '...</h3>
										<p class="post-meta">Posted by ' . $row["author"] . ' on ' . date("d.m.Y", strtotime($row["added_time"])) . '</p>
									</div>';
							$i++;
						}
					}
				?>
			</div>
		</div>

		<!-- Footer -->
		<footer>
			<div class="container">
				<p class="copyright text-muted">Copyright &copy; gabiandthesun 2018</p>
			</div>
		</footer>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- Custom scripts for this template -->
		<script src="js/clean-blog.js"></script>
	</body>

</html>
