<?php
    session_start();
    if(!isset($_SESSION["login"]))
    {
        echo $_SESSION["login"];
        header("Location:login.php");
        exit;
    }
    
    require 'function.php';
    $mahasiswa = query("SELECT * FROM phpdatabase");

    if(isset($_POST["cari"]))
    {
        $mahasiswa = cari($_POST["keyword"]);
    }

    
?>

<!DOCTYPE html>
<html leng = "en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title> Document </title>
        
</head>
<body>
<ul class="nav nav-tabs">
       <li class="nav-item">
            <a class="nav-link" href="./index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./index.php">Tentang</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./index.php">Contact</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./index.php">Comment</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./tambah_data.php">Daftar</a>
        </li>
        </ul>
    
        <ul class="nav navbar-nav navbar-right">
        <li>
            <a class="nav-link" href="./login.php">Login</a>
        </li>
        <li>
            <a class="nav-link" href="./registrasi.php">Registrasi</a>
        </li>
        <li>
            <a class="nav-link" href="./logout.php">Logout</a>
        </li>
    </ul>

        
    <table border = "1" cellpadding = "10" cellspacing = "0">

    

    <form action="" method="POST">
        
        <br>
        <input type="text" name="keyword" size="20" autofocus placeholder="Pencarian" autocomplete="off">
        <button type="submit" name=cari>cari</button>
    </form>
    
    <br>
    <br>
    

    <!-- //kita biat contoh data static -->

    <?php $i=1 ?>
    
    <?php foreach ($mahasiswa as $row): ?>
    <tr>
        <td><?= $i; ?></td>
        <td><?= $row["Nama"];?></td>
        <td><?= $row["Nim"];?></td>
        <td><?= $row["Email"];?></td>
        <td><?= $row["Jurusan"];?></td>
        <td> <img src="img/<?php echo $row["Gambar"]; ?>" alt="" srcset="" width="100" height="100"></td>
        <td>

            <a href="edit.php?id=<?php echo $row["ID"];?>">Edit</a>
            <a href="hapus.php?id=<?php echo $row["ID"];?>"onclick="return confirm('apakah data ini akan dihapus')">Hapus</a>
        </td>
    </tr>
    <?php $i++ ?>
    <?php endforeach;?>
    
</body>
</html>