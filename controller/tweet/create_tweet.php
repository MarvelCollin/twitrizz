<?php
session_start();

require_once '../../conn.php';
if (isset($_POST['post'])) {
    $data = (object) $_POST;

    //get
    $image_url = $_FILES['uploadfile']['name'];
    $tempname = $_FILES['uploadfile']['tmp_name'];
    $folder = '../../images/' . $image_url;
    $tweet = $_POST['captions'];
    // $captions = $_POST['captions'];
    // $tags = $_POST['tags'];

    // get the session
    $by_user = $_SESSION['username'];

    // $by_email = $_SESSION['email'];

    //splitting #
    $splitted_tweet = explode(' ', $tweet);
    $hashtags = [];
    foreach ($splitted_tweet as $splitted) {
        if (substr($splitted, 0, 1) === '#') {
            $hashtags[] = $splitted;
        }
    }

    // database connect + sleect
    $profile = mysqli_query($conn, "select * from users where username like '%" . $by_user . "%'");
    $echoprofile = mysqli_fetch_assoc($profile);
    $by_email = $echoprofile['email'];

    // var_dump($hashtags);
    $allhash = join(" ", $hashtags);
    // echo $allhash;
    $queryCreateTweet = mysqli_query($conn, "insert into tweets (captions, image_url, by_user, tags, by_email) values ('$tweet', '$image_url', '$by_user', '$allhash', '$by_email')");
    // condition if image valid
    if (move_uploaded_file($tempname, $folder)) {
        header('location: ../../views/explore.php');
    } else {
        header('location:../../views/explore.php?error=ss');
    }
}

?>
