<?php
	include('connect.php');
	$sql = "SELECT title, content, author, added_time FROM posts WHERE id = " . $_GET['id'];
	$result = $conn->query($sql);
	$result2 = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>
				<?php
					if ($result->num_rows > 0)
						while ($row = $result->fetch_assoc())
							echo $row["title"] . " - gabiandthesun";
				?>
		</title>

		<!-- Custom fonts for this template -->
		<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

		<!-- Custom styles for this template -->
		<link href="css/navbar.css" rel="stylesheet">
		<link href="css/clean-blog-post.css" rel="stylesheet">

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
				
				
				<?php
					if ($result2->num_rows > 0) {
						while ($row = $result2->fetch_assoc()) {
							
							echo '	<div class="post-normal">
										<h3 class="post-title">' . $row["title"] . '</h3>
										<!-- <hr class="myhr"> -->
										<h3 class="post-content">' . $row["content"] . '</h3>
										<p class="post-meta">Posted by ' . $row["author"] . ' on ' . date("d.m.Y", strtotime($row["added_time"])) . '</p>
									</div>';
						}
					}
				?>
				
				
				
				
				
				
				
				
				
				
				
				
							
				<!--			<div class="post-normal">-->
				<!--				<h3 class="post-title">Here will be our greatest title ever</h3>-->
				<!--				<hr class="myhr">-->
				<!--				<h3 class="post-content">	Here will be a story about how this site was created and how it was developed by two kids. Here also will be a description/introduction about the post. The story will be a lomg one, so i dont need to take care of how this text box will look like. Also, i'm sure the author will be as beautiful as this post, because this site is made with love and it is meant to be loved.-->
				<!--We don't need anything but inspiration to write the content. And, aren't we the inspiration? Aren't we the kids who don't need the school but are the best of the best in an entire country? are we whpse who write this kind of texts instead of lorem ipsum dolor est (from latin, te template text used in every site before customization).-->
				<!--We'll, we are more than you know.-->
				<!--				</h3>-->
				<!--				<p class="post-meta">Posted by us on November 29, 2017</p>-->
				<!--			</div>-->
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
