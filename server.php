<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'hw1');
	$name = "";
	$email = "";
	$surname = "";
	$id = 0;
	$update = false;
	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$surname = $_POST['surname'];
		mysqli_query($db, "INSERT INTO hww (name, email, surname) VALUES ('$name', '$email', '$surname')"); 
		$_SESSION['message'] = "Email saved"; 
		header('location: index.php');
	}
if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$surname = $_POST['surname'];
	mysqli_query($db, "UPDATE hww SET name='$name', email='$email', surname='$surname' WHERE id=$id");
	$_SESSION['message'] = "Email updated!"; 
	header('location: index.php');
}
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM hww WHERE id=$id");
	$_SESSION['message'] = "Email deleted!"; 
	header('location: index.php');
}