<?php

// check session (jadi gabisa langsung ganti path diatas) tanpa login
if (isset($_SESSION['username'])){
    } else {
        header("Location: ../../index.php");
    }
    