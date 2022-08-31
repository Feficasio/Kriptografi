<?php
include "../config.php";
if (isset($_POST['decrypt'])){
	ini_set('memory_limit', '-1');
	ini_set('max_execution_time', '-1');
	$kcf = $_POST["katakunci"];
	$username = $_SESSION['username'];
	$kd_user = $_SESSION['kd_user'];
	$uploaded_name = $_FILES['file']['name'];
	$uploaded_ext = substr($uploaded_name, strrpos($uploaded_name, '.') + 1);
	$uploaded_size = $_FILES["file"]["size"];
	$dta = $_FILES["file"]["type"];
	function microtime_float()
	{
		list($usec, $sec) = explode(" ", microtime());
		return ((float)$usec + (float)$sec);
	}
	$time_start = microtime_float();
	if($_FILES["file"]["error"] != 0){
		echo "<script>alert('Tidak ada file enkrip yang diunggah!')</script>";
		return;
	}
	if(substr($uploaded_name,0,7)!="Enkrip_"){
		echo "<script>alert('File yang dimasukan bukan hasil enkripsi')</script>";
		return;
	}
	if(strlen($kcf)<8){
		echo "<script>alert('Password Kurang dari 8 karakter atau Password Kosong!')</script>";
		return;
	}
	$pass = $_POST["katakunci"];
	$namafile = $_FILES["file"]["name"];

	//Validasi Apakah Passwprd File Yang Mau Di Decrypt Cocok Atau Tidak
	$sql = mysqli_query($conn, "SELECT * FROM file WHERE nama_file='$namafile' AND password='$kcf'");
	$row = mysqli_fetch_array($sql);
	if ($row > 0) { //Jika Cocok Maka Akan Memanggil Function Decrypt
		include"rc4.php";
	}else{//Jika Tidak Cocok Maka File Maka Akan Menampilkan Ini
	  	echo "<fieldset id='fieldset'>
	  	<legend id='legend'><font size='4' face='Tahoma' color ='#4169E1'>Dekripsi</font></legend>";
	  	echo " <h2><center><font color='#f05b4f'>HASIL PROSES DEKRIPSI</font></center></h2>";
	  	//Keterangan File
	  	echo "Unggah : " . $_FILES["file"]["name"] . "<br />";
	  	echo "Tipe : " . $_FILES["file"]["type"] . "<br />";
	  	echo "Ukuran : " . $_FILES["file"]["size"] / 2048 . " Kb<br/>";
	  	$time_end = microtime_float();
	  	$time = $time_end - $time_start;
	  	echo "<br>Waktu Proses Dekripsi : $time seconds\n";
	  	echo "<br>Status Decrypt : Gagal! Password Tidak Cocok";
	  	echo "<br><br><a href=decrypt.php> <button class='btn btn-danger mb-3' name ='Kembali'>Kembali</button> </a>";
	  	echo "</fieldset>";
	  	echo "<script>
	  	$(document).ready(function() {
		var x = document.getElementById('form');
		if (x.style.display === 'none') {
			x.style.display = 'block';
			} else {
				x.style.display = 'none';
			}";

	}
}
?>