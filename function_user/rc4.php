<?php
echo "<fieldset id='fieldset'>
	<legend id='legend'><font size='4' face='Tahoma' color ='#4169E1'>Dekripsi</font></legend>";
echo " <h2><center><font color='#4169E1'>HASIL PROSES DEKRIPSI</font></center></h2>";
//Keterangan File
echo "Upload : " . $_FILES["file"]["name"] . "<br />";
echo "Type : " . $_FILES["file"]["type"] . "<br />";
echo "Size : " . $_FILES["file"]["size"] / 1024 . " Kb<br />";
$pass = $_POST["katakunci"];
$namafile = $_FILES["file"]["name"];
function setupkey()
{
    error_reporting(E_ALL ^ E_NOTICE);
    $pass = $_POST["katakunci"];
    //echo "<br>";
    for ($i = 0; $i < 256; $i++) {
        $key[$i] = ord($pass[$i % strlen($pass)]); /*rubah ASCII ke desimal*/
    }
    global $mm;
    $mm = [];
    /*buat decrypt*/
    for ($i = 0; $i < 256; $i++) {
        $mm[$i] = $i;
    }
    $j = 0;
    $i = 0;
    for ($i = 0; $i < 256; $i++) {
        $a = $mm[$i];
        $j = ($j + $a + $key[$i]) % 256;
        $mm[$i] = $mm[$j];
        $mm[$j] = $a;
    }
} /*akhir function*/
function decrypt2($chipertext)
{
    global $mm;
    $xx = 0;
    $yy = 0;
    $plain = "";
    for ($n = 1; $n <= strlen($chipertext); $n++) {
        $xx = ($xx + 1) % 256;
        $a = $mm[$xx];
        $yy = ($yy + $a) % 256;
        $mm[$xx] = $b = $mm[$yy];
        $mm[$yy] = $a;
        /*proses XOR antara chipertext dengan kunci
			dengan $chipertext sebagai chipertext
			dan $mm sebagai kunci*/
        $plain = ($chipertext ^ $mm[($a + $b) % 256]) % 256;
        return $plain;
    }
}
setupkey();
$nmfile = "../upload/$namafile";
/*ambil data dari file enkripsifile*/
$fp = fopen($nmfile, "r");
$isi = fread($fp, filesize($nmfile));
$go = $isi;
$key = $kcf;

// Algoritma Dekripsi RC4
for ($i = 0; $i < strlen($go); $i++) {
    $b[$i] = ord($go[$i]); /*rubah ASCII ke desimal*/
    $d[$i] = decrypt2($b[$i]); /*proses dekripsi RC4*/
    $s[$i] = chr($d[$i]); /*rubah desimal ke ASCII*/
}
$hsl = "";
//Hasil Dekripsi
for ($i = 0; $i < strlen($go); $i++) {
    $hsl = $hsl . $s[$i];
}
move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/temp");
$namafile = str_replace("Enkrip", "Dekrip", $_FILES["file"]["name"]);
/*simpan data di file*/
$fp = fopen("../upload/" . $namafile, "w");
fwrite($fp, $hsl);
fclose($fp);
$time_end = microtime_float();
$time = $time_end - $time_start;
echo "File Hasil Dekripsi :";
echo $namafile;
//echo "<br>Lokasi Hasil Dekripsi :"; echo realpath("upload/". $namafile);
echo "<br>Waktu Proses Dekripsi : $time seconds\n";
echo "<br>Status Decrypt : Berhasil Di Dekripsi";
// echo "<br>File Berhasil Didekripsi ! ";
// echo "<br>file :" .$isi. "<br>menjadi : ".$hsl;
//	echo "<br>Isi File Enkripsi: "; echo $dataen;

$query = "SELECT counter FROM login WHERE username='$username'";
$sql = mysqli_query($conn, $query);
$data = mysqli_fetch_array($sql);
$awal = $data[0];
$counter = $awal + 1;
$input = "UPDATE login SET counter='$counter' WHERE username='$username'";
$sql2 = mysqli_query($conn, $input);
//masukan data ke dalam data base
mysqli_query(
    $conn,
    "insert into file (nama_file,password,kd_user,type) values ('$namafile','$kcf','$kd_user','decrypt')"
);
echo "<br><br><a href=decrypt.php> <button class='btn btn-danger mb-3' name ='Kembali'>Kembali</button> </a><a href=../function_user/download.php?download_file=" .
    $namafile .
    "><button class='btn btn-success mb-3' name='Download'>Download</button></a>";
echo "</fieldset>";
echo "<script>
	$(document).ready(function() {
		var x = document.getElementById('form');
		if (x.style.display === 'none') {
			x.style.display = 'block';
			} else {
				x.style.display = 'none';
			}";

?>
