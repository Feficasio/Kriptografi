<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500&display=swap" rel="stylesheet">
    <!-- Own CSS-->
    <link rel="stylesheet" href="css/login.css">
    <title>Security Apps</title>
</head>
<body>
    <!-- Container -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-md-7 intro-section">
                <div class="brand-wrapper">
                    <?php
                        session_start();
                        if(!empty($_SESSION['login'])){
                            header('location: Dashboard/');
                        }
                        include 'config.php';
                        if(isset($_POST['login'])){
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            $result = mysqli_query($conn, "SELECT * FROM login WHERE username='".$username."' AND password='".$password."'");
                            $cek = mysqli_num_rows($result);
                            $array = mysqli_fetch_array($result);
                            if($cek > 0){
                            $_SESSION['username'] = $username;
                            $_SESSION['kd_user'] = $array['kd_user'];
                            header("Location:Dashboard/");
                            }else{
                                echo "<script>alert('Password Salah')</script>";
                            }
                        }
                    ?>
                </div>
          <div class="intro-content-wrapper">
            <h1 class="intro-title">Selamat Datang !</h1>
            <p class="intro-text">"Tetapi orang yang bersabar dan memaafkan, sesungguhnya (perbuatan) yang demikian 
                itu termasuk hal-hal yang diutamakan." - QS. Asy-Syura: 43</p>
          </div>
            </div>
            <div class="col-sm-6 col-md-5 form-section">
                <div class="login-wrapper">
                <h2 class="login-title">Login</h2>
            <form action="" method="POST">
            <div class="form-group">
                <label for="username" class="sr-only">Username</label>
                <input type="text" name="username" id="email" class="form-control" placeholder="Username" required>
            </div>
            <div class="form-group mb-3">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            </div>
            <div class="d-flex justify-content-between align-items-center mb-5">
                <button type="submit" name="login" class="btn login-btn">Login</button>
            </div>
            <p class="login-register-text">Tidak Mempunyai Akun? <a href="register.php">Daftar disini.</a></p>
        </div>
    </div>
    <!-- Close Container -->

<!-- Boostrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>