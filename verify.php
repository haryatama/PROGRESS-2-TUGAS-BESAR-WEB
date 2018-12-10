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
<title> Document </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>      
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <li class="active"><a href="home.html">Beranda</a></li>
        <li><a href="verify.php">Verifikasi</a></li>
        <li><a href="messagges.php">Pesan</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
      </ul>

    </div>
  </div>
</nav>

        
    <table border = "1" cellpadding = "10" cellspacing = "0">
        
        <br>
        <div class="col-sm-2 col-sm-offset-10">
        <input type="text" name="keyword" size="15" autofocus placeholder="Pencarian" autocomplete="off" >
        <button type="submit" name=cari class="glyphicon glyphicon-search"></button>
        
        
    
</body>
</html>