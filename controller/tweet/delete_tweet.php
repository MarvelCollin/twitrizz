<?php

session_start();

require_once '../../conn.php';


// get the id (unique)
$id = $_GET['id_tweets'];

mysqli_query($conn, "delete from tweets where id_tweets='$id'");    


header('location:../../views/explore.php');

