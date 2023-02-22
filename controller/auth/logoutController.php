<?php

// memastikan dengan pasti dan pasti dan pasti utk hapus semua session :>

session_start();
$_SESSION['id_users'] = '';
unset($_SESSION['id_users']);
session_unset();
session_destroy();


// redirect
header('location: ../../index.php');