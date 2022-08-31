<?php
include"config.php";
if(isset($_POST['login'])){ #Mengecek Form Login Jika Disubmit
  $username = $_POST['username'];#Mengambil Data Username Dari Form
  $password = $_POST['password'];#Mengambil Data Password Dari Form 
  $query = "SELECT * FROM login WHERE username='".$username."' AND password='".$password."'";
  $result = mysqli_query($conn,$query);
  $cek = mysqli_num_rows($result);
  $array = mysqli_fetch_array($result);
  if($cek > 0){
    while ($row = mysqli_fetch_array($result)){
      $_SESSION['username'] = $row['username'];
      $_SESSION['kd_user'] =$row['kd_user'];
      header('location:user/');
    }
  }else{
    echo '<div class="alert alert-danger" role="alert">Username/Password Salah</div>';
  }
}
?>
