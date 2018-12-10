<?php
    session_start();
    

    if(isset($_COOKIE["ID"]) && isset($_COOKIE["Username"]))
    {
        $id = $_COOKIE["ID"];
        $key = $_COOKIE["key"];

        $result=mysqli_query($conn,"SELECT Username FROM user WHERE ID=$id");
        $row=mysqli_fetch_assoc($result);

        if($key === hash('sha256',$row["Username"]))
        {
            $_SESSION["login"]=true;
        }
    }

    if(isset($_SESSION["login"]))
    {
        header("Location:home.php");
        exit;
    }
    
    require 'function.php';

    if(isset($_POST["login"]))
    {
        $user = $_POST["user"];

        if($user=="user"){
            $username=$_POST["Username"];
            $password=$_POST["Password"];
    
            $result=mysqli_query($conn,"SELECT * FROM user WHERE Username='$username'");
    
            if(mysqli_num_rows($result)===1)
            {
                $row=mysqli_fetch_assoc($result);
    
                if(password_verify($password,$row["Password"]))
                {
                    $_SESSION["login"]=true;
    
                    if(isset($_POST["remember"]))
                    {
                        setcookie("ID",$row["ID"],time()+60);
                        setcookie('key',hash(sha256,$row["Username"]),time()+60);
                    }
                    
                    header("Location:home.php");
                    exit;
                }
            }
        
            }elseif($user== "admin"){
                $username=$_POST["Username"];
                $password=$_POST["Password"];
        
                $result=mysqli_query($conn,"SELECT * FROM uas WHERE Username='$username'");
        
                if(mysqli_num_rows($result)===1)
                {
                    $row=mysqli_fetch_assoc($result);
        
                        $_SESSION["login"]=true;
        
                        if(isset($_POST["remember"]))
                        {
                            setcookie("ID",$row["ID"],time()+60);
                            setcookie('key',hash(sha256,$row["Username"]),time()+60);
                        }
                        
                        header("Location:admin.php");
                        exit;
                    }
                }
                $error=true;
        }
?>

<!DOCTYPE html>
<html>
<head>
<title>Halaman Login</title>  
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>      
    <style>    
     body {
  background-image: linear-gradient(to left top, #17a2b8, #14abc4, #12b3d1, #11bcde, #12c5eb);
  height: 100vh;
}
#login .container #login-row #login-column .login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 320px;
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
    
    <?php if(isset($error)):?>
        <p style="color:red;font-style=bold">
        username dan password salah</p>

        <?php endif ?>

        <div id="login">    
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            
        <form action="" method="POST">
        <div id="login-column" class="col-md-6">
                <div class="login-box col-md-12">
                    <form id="login-form" class="form">
                        <h3 class="text-center text-info">Login</h3>
                        <div class="form-group">
                            <label for="Username" class="text-info">Username:</label><br>
                            <input type="text" name="Username" id="Username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Password" class="text-info">Password:</label><br>
                            <input type="Password" name="Password" id="Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="radio" name="user" value="admin" required>Admin
                            <input type="radio" name="user" value="user"required>User
                        </div>
                        <div class="form-group">
                            <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                            <input type="submit" name="login" class="btn btn-info btn-md" value="submit">
                            <a href="registrasi.php" class="text-info">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
</body>
</html>