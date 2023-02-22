<?php
session_unset();
session_start();

require_once '../../conn.php';

// jadikan object (untungnya berjalan) kalau berjalan == jangan diganti KWKWWK 
$data = (object)$_POST;

//check kalau emailnya ga > 0 (sudah ada)
$queryEmail = mysqli_query($conn, "select * from users where email = '$data->email' LIMIT 1");
$queryUser = mysqli_query($conn, "select * from users where username = '$data->username' LIMIT 1");
$resultEmail = mysqli_fetch_assoc($queryEmail);
$resultUser = mysqli_fetch_assoc($queryUser);

// $password = $data['password'];
// $password_hash = password_hash($password, PASSWORD_DEFAULT);

// $username = $_POST['username'];
// $email = $_POST['email'];

$password = $_POST['password'];

//check num rows tidak duplicate
if(mysqli_num_rows($queryUser) != 0){
    header("Location: ../../views/register.php?errors=udhada");
    // utk error
} else {
    //hashing manual password menggunakan md5 
    $password = $data->password;
    $password_hash = md5($password);

    //get + insert + redirect
    $username = $_GET['username'];
    $filter = $_SESSION['username'] = $username;
    $queryCreateUser = mysqli_query($conn, "insert into users (username, email, password, bio, image) values ('$data->username', '$data->email', '$password_hash', 'this user rather lazy to set the bio :(', 'avatarnull.jpg')");
    // $_SESSION['email'] = $email;
    // $_SESSION['image'] = $image;
    header("location: ../../index.php");

}

