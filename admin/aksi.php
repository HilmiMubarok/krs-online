<?php
include '../config.php';
$aksi = $_GET['aksi'];
$nim  = $_GET['nim'];

if ($aksi == "acc") {

	$query = "UPDATE pengambilan SET status = 'acc' WHERE nim = '$nim' ";
	mysqli_query($conn, $query);
	$query = "UPDATE user SET status = '3' WHERE nim = '$nim' ";
	mysqli_query($conn, $query);
	header("location:krs.php");

} elseif ($aksi == "reject") {

	$query = "DELETE FROM pengambilan WHERE nim = '$nim' ";
	mysqli_query($conn, $query);
	$query = "UPDATE user SET status = '2' WHERE nim = '$nim' ";
	mysqli_query($conn, $query);
	header("location:krs.php");

} else {
	header("location:dashboard.php");
}