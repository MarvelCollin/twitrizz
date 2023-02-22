<?php
session_start();


require_once '../../conn.php';
if (isset($_POST['post'])) {

    // $data = (object)$_POST;
	

    // get from  input
	$image_url = $_FILES["uploadimg"]["name"];
	$tempname = $_FILES["uploadimg"]["tmp_name"];
	$folder = "../../images/" . $image_url;
    
    
    // get from input
    $comment = $_POST['comment'];
	$user_commenter = $_SESSION['username'];

    // connect database + supaya bisa di get
	$queryfilteremail = mysqli_query($conn, "select * from users where username like '%" . $user_commenter . "%'");
    $resultemail = mysqli_fetch_assoc($queryfilteremail);
    $user_email = $resultemail['email'];
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
    // $user_email = $_SESSION['email'];
    // $id_user_tweeted = '2';
	$id_user_tweeted = $_GET['id_tweets'];
    // echo $id_user_tweeted;
    
    // Splitting #
    $splitted_comment = explode(' ', $comment);
    $hashtags = [];
    foreach ($splitted_comment as $splitted) {
        if (substr($splitted, 0, 1) === '#') {
            $hashtags[] = $splitted;
        }
    }

    $allhash = join(" ", $hashtags);
    $queryCreateComment = mysqli_query($conn, "insert into comments (comment, image_url, id_user_tweeted, user_commenter, user_email, tags) values ('$comment', '$image_url', '$id_user_tweeted', '$user_commenter', '$user_email', '$allhash')");
    // insert comment

    

    //redirect
    header('location: ../../views/explore.php');

	// if (move_uploaded_file($tempname, $folder)) {
	// } else {
        // header('location:../../views/explore.php?error=ss');

	// }
}


?>
