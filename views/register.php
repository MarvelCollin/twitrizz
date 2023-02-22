<?php
    $title = "Register";
    $navbar = "false";

    require_once '../conn.php';
    require_once '../links.php';
    require_once 'navbar.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <title><?php echo $title ?></title>
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/733/733579.png" />
</head>

<body>
    <div style="min-height: 100vh;" class="container d-flex justify-content-center align-items-center">
        <form action="../controller/auth/registerController.php" method="post">
            <div class="">
                <div class="d-flex  justify-content-center align-items-center">
                    <i class="fa fa-twitter mr-2 mb-4 " style="font-size: 40px; color:deepskyblue;    "></i>
                    <h2 class="text-center mb-4">Twitrizz</h2>
                </div>
                <div class="text-center mb-2 text-danger">
                    <!-- erorrnya letak disini -->
                </div>
            </div>

            <div class="form-floating mb-3">
                <label for="email">Email</label>
                <input type="Email" class="form-control" id="Email" name="email" placeholder="Your Email" required>
            </div>
            <div class="form-floating mb-3">
                <label for="username">Username</label>
                <input type="username" class="form-control" id="username" name="username" placeholder="Your Username" required>
            </div>
            <div class="form-floating mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Your Password" required>
            </div>
            <button type="submit" class="btn btn-primary form-control mb-3">Register</button>
            <a href="../index.php" class="mt-2 text-center">Whoa!? had an account? Register here</a>

        </form>
    </div>

</body>

</html>