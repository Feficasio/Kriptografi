<?php
    session_start(); //inisialisasi session
    echo"<script>alert('logout')</script>";
    if(session_destroy()) {//menghapus session
        echo"<script>alert('logout')</script>";

        header("Location: ../"); //jika berhasil maka akan diredirect ke file index.php
    }
?>