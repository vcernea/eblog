<?php
	$servername = "localhost";
	$username = "root";
	$password = "gabiedulce";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	// Create database
	$sql = "CREATE DATABASE `maindb`";
	if ($conn->query($sql) === TRUE) {
		echo "Database created successfully<br>";
	} else {
		echo "Error creating database: " . $conn->error;
	}
	$conn->close();
	$dbname = "maindb";
	
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "CREATE TABLE admins (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			login VARCHAR(30) NOT NULL,
			password VARCHAR(255) NOT NULL
			)";
	
	if ($conn->query($sql) === TRUE) {
		echo "Table admins created successfully<br>";
	} else {
		echo "Error creating table: " . $conn->error;
	}
	$sql = "CREATE TABLE posts (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			title VARCHAR(1024),
			content TEXT(65535),
			author INT(6),
			added_time TIMESTAMP,
			state INT(6) DEFAULT 1
			)";
	
	if ($conn->query($sql) === TRUE) {
		echo "Table posts created successfully<br>";
	} else {
		echo "Error creating table: " . $conn->error;
	}
	$sql = "CREATE TABLE `mess` (
			`id` int(6) unsigned NOT NULL AUTO_INCREMENT,
			`from` varchar(300) NOT NULL,
			`subject` varchar(300) NOT NULL,
			`content` varchar(30000) NOT NULL,
			`sent_time` timestamp NOT NULL,
			PRIMARY KEY (`id`)
			);";
	
	if ($conn->query($sql) === TRUE) {
		echo "Table mess created successfully<br>";
	} else {
		echo "Error creating table: " . $conn->error;
	}	
	
	$conn->close();
?>