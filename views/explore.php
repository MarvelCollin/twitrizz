<?php
session_start();
$title = 'Explore';
$navbar = 'true';
require_once '../controller/auth/checkauth.php';
require_once '../links.php';
require_once 'navbar.php';
require_once '../conn.php';

//get all tweets
$query = 'select * from tweets';
$result = mysqli_query($conn, $query);
$echodata = mysqli_fetch_assoc($result);

// get session
$username = $_SESSION['username'];

// profile filtering
$profile = mysqli_query($conn, "select * from users where username like '%" . $username . "%'");
$echoprofile = mysqli_fetch_assoc($profile);
// var_dump($echoprofile);
// echo var_dump($ech   oprofile);
// echo $id_users;

//echo tweet profile image func

// search function
$issets = isset($_GET['search']);

if ($issets) {
    $search = $_GET['search'];

    // $resultcomment = mysqli_fetch_all($checkcomment, MYSQLI_ASSOC);
    // $gettweety = $data['id_tweets'];
    // $checkcomment = mysqli_query($conn, "select * from comments where tags like '%" . $tweety . "%'");

    // comment search setup
    $checkcomment = mysqli_query($conn, "select * from comments where tags like '%" . $search . "%'");
    $resultcommenty = mysqli_fetch_all($checkcomment, MYSQLI_ASSOC);

    $userIds = [];

    // masukin ke array
    foreach ($resultcommenty as $commenty) {
        array_push($userIds, $commenty['id_user_tweeted']);
    }

    // echo var_dump($userIds);

    // tweets search set up
    $checktweets = mysqli_query($conn, "select * from tweets where tags like '%" . $search . "%'");
    $resulttweety = mysqli_fetch_all($checktweets, MYSQLI_ASSOC);

    $userIdst = [];

    // masukin ke array
    foreach ($resulttweety as $tweety) {
        array_push($userIdst, $tweety['id_tweets']);
    }

    // echo " S P A C E ";
    // echo var_dump($userIdst);

    // merging and filter duplicate
    $merged = array_merge($userIdst, $userIds);
    $ALLsearch = array_unique($merged);
    // echo var_dump($ALLsearch);

    // get id commented , get id tweets, combine , filter, done
} else {
    $data = mysqli_query($conn, 'select * from tweets ');
    $ALLsearch = array_column(mysqli_fetch_all($data, MYSQLI_ASSOC), 'id_tweets');
}

?>


<body>
    <!-- TWEET USER -->
    <div class="container d-flex" style="width:30%;">
        <div class="">
            <img src="../profile_image/<?= $echoprofile['image'] ?>" alt="" class="rounded-circle text-left"
                style="width: 6vh; ">
        </div>
        <div class="">
            <div class="ml-1 mt-2 font-weight-bold" style="font-size: 17px; margin-bottom: 0px;">
                <?= $echoprofile['username'] ?>
            </div>
            <div class="text-muted">
                <?= $echoprofile['email'] ?>
            </div>
        </div>
    </div>
    <form action="../controller/tweet/create_tweet.php" method="post" enctype="multipart/form-data">
        <div class=" mt-2 container d-flex align-items-center text-center" style="width:30%;">
            <textarea name="captions" id="" cols="65" placeholder="What a nice Day! #twitterwithrizz" rows="2"
                required></textarea>
            <button name="post" class="btn btn-primary ml-2" style="width:10%; height:53px;"><i
                    class="fa fa-twitter"></i></button>
        </div>
        <!-- <div class="mt-2 container d-flex align-items-center text-center" style="width:30%;">
            <textarea name="tags" id="" cols="65" placeholder="Your tags ! #twitterwithrizz" rows="1"
                required></textarea>

        </div> -->
        <div class="container d-flex justify-content-center mt-2 align-items-center text-center" style="width:30%;">
            <label for="customFile" class="text-center btn btn-primary">
                <!-- UPLOAD YOUR FILE HERE -->
                <input type="file" class="form-control-file file-field" name="uploadfile" id="customFile">
            </label>
        </div>
    </form>



    <!-- DATA TWEETED -->

    <?php
    if (isset($ALLsearch) && $ALLsearch) :
        foreach ($ALLsearch as $searchy) {
            $data = mysqli_query($conn, "select * from tweets where id_tweets like '%" . $searchy . "%'");
            while ($echodata = mysqli_fetch_assoc($data)) {
                //   var_dump($echodata);  


                // SEARCH ECHO 
                if (mysqli_num_rows($data) < 1) {
    ?>
    <div class="font-weight-bold  d-flex align-items-center text-danger  justify-content-center w-100 text-center w-50"
        align="center">
        <h2>No tweet yet</h2>
    </div>
    <?php
                }
                ?>

    <?php
    //get searched
    $queryprofiletweet = mysqli_query($conn, "select * from users where username like '%" . $echodata['by_user'] . "%'");
    $profiletweet = mysqli_fetch_assoc($queryprofiletweet);
    ?>
    <div class="d-inline text-center  align-items-center justify-content-center container  " align="center">

        <div class="container rounded  img-thumbnail text-center" style="height:auto; width:fit-content; width:50vh; ">
            <div class="text-right ">
                <a class="nav-link dropdown-toggle" href="#" style="font-size: 20px;" id="navbarDropdown"
                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </a>
                <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
                    <a href="../controller/tweet/delete_tweet.php?id_tweets=<?php echo $echodata['id_tweets']; ?>"
                        class="dropdown-item btn  btn-danger text-danger" type="submit">DELETE</a>
                </div>
            </div>
            <div class="d-flex text-left justify-content-start align-items-left">
                <div class="">
                    <img src="../profile_image/<?php echo $profiletweet['image']; ?>" alt="" class="rounded-circle text-left"
                        style="width: 60px; ">
                </div>
                <div class="">
                    <div class="ml-1 mt-2 font-weight-bold" style="font-size: 17px; margin-bottom: 0px;">
                        <?= $echodata['by_user'] ?>
                    </div>
                    <div class="text-muted" style="position:relative; bottom:5px;">
                        <?= $echodata['by_email'] ?>
                    </div>
                </div>
            </div>
            <div class="text-left">
                <div class="text-left text-break">
                    <?php
                    echo $echodata['captions'];
                    ?>
                    <br>
                    <p class="text-primary font-weight-bold">
                        <?php
                        // echo $echodata['tags'];
                        ?>
                    </p>
                </div>
                <div class="d-flex w-100 justify-content-center align-items-center text-center">
                    <div class="text-break cut_text " style="word-break: break-all; height:auto;">
                        <div class="d-flex justify-content-center align-items-center text-center">

                        </div>
                        <div class="">
                            <?php
                                        if (!empty($echodata['image_url'])) {
                                        ?>
                            <img class=" p-3 text-center w-100"
                                style="min-height:20vh; min-width:20vw; max-width: 40vw; max-height: 40vh;    "
                                src="../images/<?php echo $echodata['image_url']; ?>">
                            <?php
                                        }
                                        ?>

                        </div>


                    </div>
                </div>


                <!-- COMMENT  -->
                <form action="../controller/comment/create_comment.php?id_tweets=<?= $echodata['id_tweets'] ?>"
                    method="post" class="d-flex mt-3 container d-flex align-items-center text-center"
                    enctype="multipart/form-data">
                    <label class="text-center btn btn-primary">
                        <!-- UPLOAD YOUR FILE HERE -->
                        <div class="">
                            <i class="fa fa-photo  text-center"></i></input>
                            <input type="file" class="text-center form-control-file file-field" name="uploadimg"
                                hidden>
                        </div>
                    </label>
                    <textarea name="comment" placeholder="Reply a Tweet... as @<?= $echoprofile['username'] ?>"
                        class="form-control  textareas align-center border border-primary ml-2" id="textAreaExample1" rows="2"
                        required></textarea>
                    <button name="post" type="submit"
                        class="d-flex justify-content-center align-items-center btn btn-primary ml-2 text-center">

                        <a href="" class="btn btn-primary d-flex justify-content-center align-items-center"
                            style="width:10%; height:53px;">
                            <i class="fa fa-twitter" style="width:25px;"></i></a>
                    </button>
                </form>

            </div>

            <?php
            
            ?>
            <?php


                        // get all comments
                        $querycomment = mysqli_query($conn, 'select * from comments');
                        $echocomment = mysqli_fetch_assoc($querycomment);

                        // show filtered comment (to not duplicate)
                        while ($echocomment = mysqli_fetch_assoc($querycomment)) {
                            if ($echodata['id_tweets'] == $echocomment['id_user_tweeted']) {
                                // echo comment profile image func
                                $queryprofilecomment = mysqli_query($conn, "select * from users where username like '%" . $echocomment['user_commenter'] . "%'");
                                $profilecomment = mysqli_fetch_assoc($queryprofilecomment);
                        ?>
            <div class="text-left container border mt-2  justify-content-start container d-flex  ">
                <div class="d-flex mt-2 mb-2">
                    <div class="">
                        <img src="../profile_image/<?= $profilecomment['image'] ?>" alt=""
                            class="rounded-circle text-left" style="width: 4.5vh; ">
                    </div>
                    <div class="">
                        <div class="d-flex">
                            <div class="ml-1 d-flex  font-weight-bold" style="font-size: 14px; margin-bottom: 0px;">
                                <?= $echocomment['user_commenter'] ?>
                            </div>
                            <div class="text-muted d-flex ml-1" style="font-size:14px;">
                                <?= $echoprofile['email'] ?>
                            </div>
                        </div>
                        <div class="ml-1"><?= $echocomment['comment'] ?></div>
                        <div class="">

                        </div>
                    </div>
                </div>
            </div>

            <?php
                            }
                            ?>
            <?php
            
            ?>


            <?php
                        }
                        ?>
        </div>
    </div>

    <?php
            }
            //sorry for messy code :>

        }
    endif;  
    ?>


</body>
