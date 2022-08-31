<?php
 session_start();
 if( !isset($_SESSION['username']) ){
     header("Location:../");
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Apps</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <nav class="navbar navbar-light bg-light p-3">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            <a class="navbar-brand " href="#"> <img id="head"src="../img/md banget.png" width="9%" height="auto">
                RSIA PKU MUHAMMADIYAH CIPONDOH
            </a>
            <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
            <div class="dropdown">
                <button class="btn btn-red dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                  <?php echo 'Hallo '.$_SESSION['username'];?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li><a class="dropdown-item" href="logout.php">Keluar</a></li>
                </ul>
              </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link" aria-current="page" href="index.php">
                            <i class="bi bi-house-fill"></i>
                            <span class="ml-2">DASHBOARD</span>
                          </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="encrypt.php">
                            <i class="bi bi-lock-fill"></i>
                            <span class="ml-2">ENKRIPSI</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="decrypt.php">
                            <i class="bi bi-unlock-fill"></i>
                            <span class="ml-2">DEKRIPSI</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="list_file.php">
                            <i class="bi bi-file-earmark-lock2-fill"></i>
                            <span class="ml-2">DAFTAR FILE</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="help.php">
                            <i class="bi bi-question-circle-fill"></i>
                            <span class="ml-2">BANTUAN</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="about.php">
                            <i class="bi bi-file-person-fill"></i>
                            <span class="ml-2">TENTANG</span>
                          </a>
                        </li>
                </div>
            </nav>
              <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5>Enkripsi file</h5>
                                <?php
                                include"../function_user/encrypt.php";
                                ?>
                                <div id="form" style="display:block">
                                <form class="" method="post" action="" id="" style="display:block;" enctype="multipart/form-data" onsubmit="document.getElementById('form').style.display = 'none';">
                                    <div class="mb-3">
                                        <label for="formFileSm" class="form-label">Unduh File </label>
                                        <input class="form-control form-control-sm" id="formFileSm" type="file" name="file">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Lengkap </label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder=""name="nama">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder=""name="alamat">
                                    </div>
                                    <div class="mb-3">
                                        <label>Poli</label>
                                        <select class="form-select" required name="poli" id="poli">
                                            <option value="pilih">Pilih Poli</option>
                                            <option value="Poli Bedah">Poli Bedah</option>
                                            <option value="Poli Penyakit Dalam">Poli Penyakit Dalam</option>
                                            <option value="Poli Kandungan">Poli Kandungan</option>
                                            <option value="Poli Anak">Poli Anak</option>
                                            <option value="Poli Gigi">Poli Gigi</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Password </label>
                                        <div class="input-group" id="show_hide_password">
                                        <input type="password" class="form-control" id="rpw" placeholder=""name="rpw">
                                        <div class="input-group-append">
                                         <a href="" class="btn btn-outline-secondary"><i class="bi bi-eye" aria-hidden="true"></i></a>
                                     </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Konfirmasi Password </label>
                                        <div class="input-group" id="show_hide_password1">
                                        <input type="password" class="form-control" id="cpw" placeholder=""name="katakunci">
                                        <div class="input-group-append">
                                         <a href="" class="btn btn-outline-secondary"><i class="bi bi-eye" aria-hidden="true"></i></a>
                                     </div>
                                        </div>
                                        <p style="color: red;" id="pwmsg"></p>
                                    </div>
                                    <button type="submit" id="sub"class="btn btn-red mb-3"name="encrypt" onclick="myFunction()">Enkripsi</button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
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
         $('#list_user').DataTable();
        });

    </script>
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
    <script>
        $(document).ready(function() {
            $("#cpw").keyup(validate);
        });
        function validate() {
            var password1 = $("#rpw").val();
            var password2 = $("#cpw").val();

            if(password1 == password2) {
                $("#pwmsg").attr("style","color:green;");
                $("#pwmsg").text("Password Cocok");

            }
            else {
                $("#pwmsg").attr("style","color:red;");
                $("#pwmsg").text("password berbeda, silahkan masukkan yang benar");
            }
        }
    </script>
    </script>
</body>
</html>