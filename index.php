<?php 
    $title = "Login";
    $navbar = "false";

    require_once 'views/navbar.php';
    require_once 'conn.php';
    require_once 'links.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<div style="min-height: 100vh;" class="container d-flex justify-content-center align-items-center">
    <form action="./controller/auth/loginController.php" method="post">
        <div class="">
            <div class="d-flex  justify-content-center align-items-center">
                <i class="fa fa-twitter mr-2 mb-4 " style="font-size: 40px; color:deepskyblue;    "></i>
                <h2 class="text-center mb-4">Twitrizz</h2>
            </div>
            <div class="text-center mb-2 text-danger">
               <!-- erorrnya letak disini -->
               <?php 
                    if(isset($_GET['errors'])){
                        if($_GET['errors'] == 'errorbrok'){
                            echo "incorrect password or not registrated, Please try again !"; 
                        }
                    }
               ?>
            </div>
        </div>

        <div class="form-floating mb-3">
            <label for="username">Username</label>
            <input type="username" class="form-control" id="username" name="username" placeholder="Your Username">
        </div>
        <div class="form-floating mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Your Password">
        </div>
        <button type="submit" class="btn btn-primary form-control mb-3">Login</button>
        <a href="views/register.php" class="mt-2 text-center">Oh you're new here ? Register here</a>

    </form>
</div>
    
</body>
</html>