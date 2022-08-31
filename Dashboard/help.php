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
                            <a class="nav-link" href="encrypt.php">
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
                          <a class="nav-link active" href="help.php">
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
                                 <div class="row">
                                    <b>1. Langkah Menu Enkrip File :</p></b>
                                    <p class="text-xl-start">- Pilih Menu Enkripsi pada Form Menu Utama.</p>
                                    <p class="text-xl-start">- Pilih File pdf, doc, docx, xls, xlsx atau file txt yang akan di enkripsi</p>
                                    <p class="text-xl-start">- Isi Data Pasien Secara Lengkap</p>
                                    <p class="text-xl-start">- Masukan Password</p>
                                    <p class="text-xl-start">- Klik Tombol Enkripsi File</p>
                                    <b><p class="text-xl-start">2. Langkah Menu Dekrip File :</p></b>
                                    <p class="text-xl-start">- Pilih Menu Dekripsi pada Form Menu.</p>
                                    <p class="text-xl-start">- Pilih File Hasil Enkripsi yang akan di didekripsi.</p>
                                    <p class="text-xl-start">- Masukan Password</p>
                                    <p class="text-xl-start">- Klik Tombol Dekripsi File</p>
                                    </b>
                                    <br>
                                    <br>
                                    <b>Note :
                                    </b>
                                    <p class="text-xl-start">Silahkan hubungi admin bila terjadi masalah kehilangan password akun atau password dekripsi file.</p>
                                    <b>Email :</b>
                                    <p class="text-xl-start">feficasio011@gmail.com</p>
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
    <script>
        $(document).ready(function() {
          
        $('#list_user').DataTable();
        } );

    </script>
</body>
</html>