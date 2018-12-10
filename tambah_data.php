<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    
    <style>
     
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    
    .row.content {height: 450px}
    
    
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
    </style>
</head>
<body>
    <h1> tambah data mahasiswa </h1>
    
    <form action="" method="POST" enctype="multipart/form-data">
        <ul>
            <li>
            <label for="Nama">Nama</label>
            <input type="text" name="Nama" id="Nama" required>
            </li>
            <li>
            <label for="Nim">Nim</label>
            <input type="text" name="Nim" id="Nim" required>
            </li>
            <li>
            <label for="Email">Email</label>
            <input type="text" name="Email" id="Email" required>
            </li>
            <li>
            <label for="Jurusan">Jurusan</label>
            <input type="text" name="Jurusan" id="Jurusan" required>
            </li>
            <li>
            <label for="Gambar">Gambar</label>
            <input type="file" name="Gambar" id="Gambar" >
            </li>
        <li>
        <button type="submit" name="submit">Tambah</button>
        </li>
        </ul>
    </form>
    
</body>
</html>

<?php

require 'function.php';    

if(isset($_POST['submit']))
{
    //var_dump($_POST);
    //var_dump($_FILES);
    //die();
        
    if(tambah($_POST)>0){
        echo "
        <script>
            alert('data berhasil disimpan');
            document.location.href='home.php';
            </script>
            ";
    }else{
        echo "
        <script>
            alert('data gagal disimpan');
            document.location.href='tambah_data.php';
            </script>";
            echo "<br>";
            echo mysqli_error($conn);
    }

    session_start();
    if(isset($_SESSION["login"]))
    {
        echo $_SESSION["login"];
        header("Location:login.php");
        exit;
    }

}
?>