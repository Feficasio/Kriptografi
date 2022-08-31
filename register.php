    <?php

    include 'config.php';
    session_start();

    if (isset($_SESSION['username'])) {
        header("Location: index.php");
    }

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        if ($password == $cpassword) { // cek password sama apa tidak jika sama lanjut
        $sql = "SELECT * FROM login WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        $cek = mysqli_num_rows($result);
        if ($cek > 0){ // cek username di database jika ada pesan peringatan
            echo "<script>alert('Gagal Mendaftar, Username Sudah Terdaftar')</script>";
        }else {
            $sql = "INSERT INTO login (username , password) VALUES ('$username','$password')";
            $res = mysqli_query($conn,$sql);
            if ($res) { // jika berhasil mendaftar tampil pesan
                echo "<script>alert('Pendaftaran Berhasil');
                window.location.href= 'index.php';</script>";
            }else{
                echo "<script>alert('Pendaftaran Gagal')</script>";
            }
        }
        }elseif ($username || $password == ""){
        echo "<script>alert ('Password Berbeda')</script>";
        
        }else {
        echo "<script>alert ('Username & Password Berbeda)</script>";
        }
    }

    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Boostrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
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
                    </div>
            <div class="intro-content-wrapper">
                <h1 class="intro-title">Selamat Datang !</h1>
                <p class="intro-text">"Tetapi orang yang bersabar dan memaafkan, sesungguhnya (perbuatan) yang demikian 
                    itu termasuk hal-hal yang diutamakan." - QS. Asy-Syura: 43</p>
            </div>
                </div>
                <div class="col-sm-6 col-md-5 form-section">
                    <div class="login-wrapper">
                    <h2 class="login-title">Pendaftaran</h2>
                <form action="" method="POST">
                <div class="form-group">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="form-group mb-3">
                    <label for="password" class="sr-only">Password</label>
                <div class="input-group" id="show_hide_password">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                <div class="input-group-append">
                    <a href="" class="btn btn-outline-secondary"><i class="bi bi-eye" aria-hidden="true"></i></a>
                </div>
                </div>
                </div>

                <div class="form-group mb-3">
                    <label for="password" class="sr-only">Konfirmasi Password</label>
                <div class="input-group" id="show_hide_password1">
                    <input type="password" name="cpassword" id="password" class="form-control" placeholder="Confirm Password" required>
                <div class="input-group-append">
                    <a href="" class="btn btn-outline-secondary"><i class="bi bi-eye" aria-hidden="true"></i></a>
                </div>
                </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <button type="submit" name="submit" class="btn login-btn">Daftar</button>
                </div>
            </form>
                <p class="login-register-text">Sudah mempunya akun? <a href="index.php">Login Disini.</a></p>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Data Tables -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $("#show_hide_password a").on('click', function(event) {
                    event.preventDefault();
                    if($('#show_hide_password input').attr("type") == "text"){
                        $('#show_hide_password input').attr('type', 'password');
                        $('#show_hide_password i').addClass( "bi bi-eye-slash" );
                        $('#show_hide_password i').removeClass( "bi bi-eye" );
                    }else if($('#show_hide_password input').attr("type") == "password"){
                        $('#show_hide_password input').attr('type', 'text');
                        $('#show_hide_password i').removeClass( "bi bi-eye-slash" );
                        $('#show_hide_password i').addClass( "bi bi-eye" );
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $("#show_hide_password1 a").on('click', function(event) {
                    event.preventDefault();
                    if($('#show_hide_password1 input').attr("type") == "text"){
                        $('#show_hide_password1 input').attr('type', 'password');
                        $('#show_hide_password1 i').addClass( "bi bi-eye-slash" );
                        $('#show_hide_password1 i').removeClass( "bi bi-eye" );
                    }else if($('#show_hide_password1 input').attr("type") == "password"){
                        $('#show_hide_password1 input').attr('type', 'text');
                        $('#show_hide_password1 i').removeClass( "bi bi-eye-slash" );
                        $('#show_hide_password1 i').addClass( "bi bi-eye" );
                    }
                });
            });
        </script>
    </body>
    </html>
