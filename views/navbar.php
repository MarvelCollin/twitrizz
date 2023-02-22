<!-- ini saya ambil dari simple navbar boostraps -->

<head>
    <!-- ganti title -->
    <title><?php echo $title ?></title>
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/733/733579.png" />
    <?php 
    // set ada navbar atau tidak
        if($navbar == 'true'){
            ?>
    <nav class="navbar align-items-center  d-flex justify-content-center navbar-expand-lg border border-secondary mb-3">
        <i class="fa fa-twitter mr-1 mb-2" style="font-size: 50px; color:deepskyblue;"></i>
        <h2 class="navbar-brand mb-2" style="font-size:30px;">
            Twitrizz
        </h2>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse  " id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto mr-3">
                <li class="d-flex align-items-center mb-3 mt-1 nav-item active">
                    <i class="fa fa-hashtag font-weight-light" style="font-size: 25px;"></i>
                    <a class="nav-link mr-3 text-secondary" style="font-size: 20px;" href="explore.php">Explore<span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown d-flex align-items-center mb-3 mt-1 mr-3">
                    <i class="fa fa-gear font-weight-light" style="font-size: 25px;"></i>
                    <a class="nav-link dropdown-toggle  text-secondary" href="#" style="font-size: 20px;"
                        id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        Settings
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-secondary" href="editprofile.php">PROFILE</a>
                        <a class="dropdown-item text-danger" href="../controller/auth/logoutController.php">LOGOUT</a>
                    </div>
                </li>
                <!-- <li class="d-flex align-items-center mb-3 mt-1 nav-item active">
                    <i class="fa fa-gear font-weight-light" style="font-size: 25px;"></i>
                    <a class="nav-link mr-3" style="font-size: 20px;" href="setting.php">Settings<span class="sr-only">(current)</span></a>
                </li> -->
                <!-- <li class="d-flex align-items-center mb-3 mt-1 nav-item active">
                    <i class="fa fa-envelope font-weight-light" style="font-size: 25px;"></i>
                    <a class="nav-link mr-3 text-secondary " style="font-size: 20px;" href="postingtweets.php">Tweets<span
                            class="sr-only">(current)</span></a>
                </li> -->
            </ul>

            <form class="form-inline my-2 my-lg- mb" method="get" action="">
                <input class="form-control mr-sm-2" type="search" placeholder="Search Tweets!" name="search"
                    aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>



    <!-- dropdown menu -->

    <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" style="font-size: 20px;" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Actions
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item " href="">PROFILE</a>
            <a class="dropdown-item text-primary" href="">POST</a>
            <a class="dropdown-item text-danger" href="" >LOGOUT</a>
        </div>
    </li> -->

    <?php
        }
    else {

    }
    ?>
</head>