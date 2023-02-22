<?php

session_start();

include '../../conn.php';
    
// get input 
$username = $_POST['username'];
$password = $_POST['password'];
$password_hash = md5($password);

// connect database , select, fetch
$queryuser = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' LIMIT 1");
$resultuser = mysqli_fetch_assoc($queryuser);


// echo num rows
$check = mysqli_num_rows($queryuser);

// pakai md5 karena saya coba pakai password_verify gabisa(bug maybe? :( ))
if($password_hash != $resultuser['password'] ){
    return;
}

// session username + redirect
$_SESSION['username'] = $username;
header('location: ../../views/explore.php');