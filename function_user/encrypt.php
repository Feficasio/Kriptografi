<?php
include '../config.php';
if (isset($_POST['encrypt'])){
	if ($_POST['poli'] == 'pilih') {
		echo '<div class="alert alert-danger" role="alert">
		Gagal Menambahkan Data. Pastikan Semua Form Sudah Disi
		</div>';
	}elseif ($_POST['rpw'] != $_POST['katakunci']) {
		 echo '<div class="alert alert-danger" role="alert">
        Password Konfirmasi Tidak Cocok Dengan Password Utama
        </div>';
	
	}else{
		echo "<script> myFunction()</script>";
	ini_set('memory_limit', '-1');
	ini_set('max_execution_time', '-1');
	$username = $_SESSION['username'];
	$kd_user   = $_SESSION['kd_user'];
	$panjangpass = $_POST['katakunci'];
	$nama = $_POST['nama'];
	$poli = $_POST['poli'];
	$alamat = $_POST['alamat'];
	$kcf = $_POST['katakunci'];
	$namafile = $_FILES['file']['name'];//strrpos= mencari posisi karakter dari suatu variabel
	$uploaded_ext = substr($namafile, strrpos($namafile, '.') + 1);//substr=mengambil sebagian karakter
	$uploaded_size = $_FILES["file"]["size"];
	function microtime_float()
	{
		list($usec, $sec) = explode(" ", microtime());
		return ((float)$usec + (float)$sec);
	}
	$time_start = microtime_float();
	if($_FILES["file"]["error"] != 0){
		echo "<script>alert('Tidak ada file yang diunggah!')</script>";
		return;
	}
	if(strlen($panjangpass)<8){
		echo "<script>alert('Password kurang dari 8 atau Password Kosong!')</script>";
		return;
	}
	if($uploaded_ext != "txt" && $uploaded_ext != "doc" && $uploaded_ext != "docx" && $uploaded_ext != "xls" && $uploaded_ext != "xlsx" 
	&& $uploaded_ext != "pptx" && $uploaded_ext != "pdf" && $uploaded_ext != "jpg" && $uploaded_ext != "jpeg"){
		echo "<script>alert('Format : ".$uploaded_ext." Tidak Didukung ')</script>";
		return;
	}
	if($uploaded_size > 2097152) {
		echo "<script>alert('File yang dimasukkan lebih besar dari 2MB')</script>";
		return;
	}
	//Fungsi Proses Enkripsi RC4
	function setupkey(){  //proses KSA key scheduling algoritm
	error_reporting(E_ALL ^ (E_NOTICE));
	
	  $pass = $_POST["katakunci"];
	  $key=array();
	  for($i=0;$i<256;$i++){
		$key[$i]=ord($pass[$i % strlen($pass)]); 
	   }//ambil nilai ASCII dari tiap karakter password
	   //masukan password ke array key secara berulang sampai penuh
	   
	   //isi array s
	   global $s;
	   $s=array();	   	   
	   for($i=0;$i<256;$i++){
		$s[$i] = $i;//isi array s 0 s/d 255
	   }
	   
	   //permutasi/pengacakan isi array s
	   $j = 0;
	   $i = 0;	   
	   for($i=0;$i<256;$i++)
		{
		 $a = $s[$i];
		 $j = ($j + $s[$i] + $key[$i]) % 256;
		 $s[$i] = $s[$j]; //swap
		 $s[$j] = $a;		 
		}
	}
	//proses PRGA
	function enkrip($plainttext){
	 global $s;
	 $x=0;$y=0;
	 $ciper='';
	 for($n=1;$n<= strlen($plainttext);$n++){
	 $x = ($x+1) % 256;
	 $a = $s[$x];
	 $y = ($y+$a) % 256;
	 $s[$x] = $b = $s[$y];//swap
	 $s[$y] = $a;
	 /*proses XOR antara plaintext dengan kunci
	 dengan $plainttext sebagai plaintext
	 dan $s sebagai kunci*/
	 $ciper = ($plainttext^$s[($a+$b) % 256]) % 256;
	 return $ciper;
	 }
	} 
	
	move_uploaded_file($_FILES["file"]["tmp_name"],"../upload/temp");
	$isifile = file_get_contents("../upload/temp");
	
	// Algoritma Enkripsi RC4
	setupkey();
	for($i=0;$i<strlen($isifile);$i++){
	 $kode[$i]=ord($isifile[$i]); /*rubah ASCII ke desimal*/
	 $b[$i]=enkrip($kode[$i]); /*proses enkripsi RC4*/
	 $c[$i]=chr($b[$i]); 
	}
	$hasil = '';
	 for($i=0;$i<strlen($isifile);$i++){
	  $hasil = $hasil . $c[$i];

	 }
	 //Menyimpan File yang di enkripsi
	move_uploaded_file($_FILES["file"]["tmp_name"],$_FILES["file"]["name"]);
	$namafile =$_FILES["file"]["name"];
	$nama_file= str_replace(" ","_", $nama);
	$nm_file = "".$nama_file.'.'.$uploaded_ext;
	
	 
	
	/*simpan data di file*/
	
	$fp = fopen("../upload/Enkrip_".$nm_file,"w");
	fwrite($fp,$hasil);
	fclose($fp);
	$time_end = microtime_float();
	$time = $time_end - $time_start;
	

	//Keterangan File
	echo"<fieldset id='fieldset'>
	<legend id='legend'></legend>";
	echo" <h2><center><font color='#f05b4f'>HASIL PROSES ENKRIPSI</font></center></h2>";
	echo "Unggah: " 	. $_FILES["file"]["name"] . "<br />";
	echo "Tipe: " 		. $_FILES["file"]["type"] . "<br />";
	echo "Ukuran: " 		. ($_FILES["file"]["size"] / 2048) . " Kb";	     
	echo "<br>File Hasil Enkripsi :"; echo $nm_file; 
	
	echo "<br>Waktu Proses Enkripsi : $time seconds\n</br>";
	echo "<script>myFunction()
	</script>";
	//Input Data File ke database---------------------------------------
	mysqli_query($conn,"insert into file (kd_user,nama_file,nama_lengkap,alamat,password,poli,type) values ('$kd_user','Enkrip_$nm_file','$nama','$alamat','$kcf','$poli','encrypt')");
	echo "<br><a href=encrypt.php> <button class='btn btn-danger mb-3' name ='Kembali'>Kembali</button> </a><a href=../function_user/download.php?download_file=Enkrip_".$nm_file."><button class='btn btn-success mb-3' name='Download'>Download</button></a>";
	echo"</fieldset>";
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
