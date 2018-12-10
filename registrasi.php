<?php
    require 'function.php';

    if(isset($_POST['register']))
    {
        if(registrasi($_POST)>0)
        {
        echo "
            <style>
                alert('user berhasil ditambahkan');
            </style>
            ";
    }else
    {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Registrasi</title>
    <style>    
     body {
  background-image: linear-gradient(to left top, #17a2b8, #14abc4, #12b3d1, #11bcde, #12c5eb);
  height: 100vh;
}
#login .container #login-row #login-column .login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 350px;
  border: 1px solid #9C9C9C;
  background-image: linear-gradient(to bottom, #aec1c3, #a9b5b7, #bcc5c6, #cfd5d5, #e3e5e5);
}
#login .container #login-row #login-column .login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column .login-box #login-form #register-link {
  margin-top: -85px;
}
    </style>
</head>
<body>
<div id="login">    
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div class="login-box col-md-12">
                    <form id="login-form" class="form" action="" method="post">
                        <h3 class="text-center text-info">Registrasi</h3>
                            <div class="form-group">
                            <label for="Username" class="text-info">Username</label><br>
                            <input type="text" name="username" id="username" class="form-control">  
                            </div>
                            <div class="form-group">
                            <label for="password" class="text-info">Password</label><br>
                            <input type="password" name="password" id="password" class="form-control">  
                            </div>
                            <div class="form-group">
                            <label for="password2" class="text-info">Konfirmasi Password</label><br>
                            <input type="password" name="password2" id="password2" class="form-control">  
                            </div>
                            <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            <a href="login.php" class="navbar-right glyphicon glyphicon-arrow-left">Back</a>
                            </div>
    </form>
</body>
</html>