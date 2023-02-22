<?php
@session_start();

require_once '../../conn.php';


// setup get session, select table
$username = $_SESSION['username'];
$queryuser = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
$user = mysqli_fetch_assoc($queryuser);
$id_users = $user['id_users'];
echo 'kahsd';


//check empty
if (!empty($_POST['bio'])) {
    $bio = $_POST['bio'];
    mysqli_query($conn, "UPDATE users SET bio = '$bio' WHERE id_users = '$id_users'");
    echo 'kahsd';
    
    
}

//check empty
if (!empty($_FILES['uploadfile'])) {
    
    
    // if (!empty($user['image'])) {
        // unlink(__DIR__ . '/../../profile_image/' . $user['image']);
        // }
        
        
        
    // set up image
    $image_url = $_FILES['uploadfile']['name'];
    $tempname = $_FILES['uploadfile']['tmp_name'];
    $folder = '../../profile_image/' . $image_url;

    // move file to path
    move_uploaded_file($tempname, $folder);
    
    // update + redirect
    mysqli_query($conn, "UPDATE users SET image = '$image_url' WHERE id_users = '$id_users'");
    // echo 'image bise';
    header("location: ../../views/editprofile.php");
}

