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
                          <a class="nav-link active" href="decrypt.php">
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
                                <h5>Dekripsi file</h5>
                                <?php
                                include"../function_user/decrypt.php";
                                ?>
                                <div id="form" style="display:block">
                                <form method="post" action="" id="" style="display:block;" enctype="multipart/form-data" onsubmit="document.getElementById('form').style.display = 'none';">
                                    <div class="mb-3">
                                        <label for="formFileSm" class="form-label">Pilih File </label>
                                        <input class="form-control form-control-sm" id="formFileSm" type="file" name="file">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Password </label>
                                        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder=""name="katakunci">
                                    </div>
                                    <button type="submit" class="btn btn-red mb-3"name="decrypt" onclick="myFunction()">Dekripsi</button>
                                </form>
                            </div>
                                <div id="result" style="display:none;">
                                    <p>lohsdfd</p>
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
        $("#modal").modal();
        $('#list_user').DataTable();
        } );

    </script>
    <script>
        $('#modal').modal('show'); 
</script>
</body>
</html>