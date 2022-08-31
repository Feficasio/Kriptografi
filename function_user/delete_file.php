<?php
include '../config.php';
$id = $_GET['id'];
$delete = mysqli_query($conn,"DELETE FROM file WHERE kd_file='$id'");
if ($delete){
	header('Location:../dashboard/list_file.php');
}
?>