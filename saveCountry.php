<?php

    session_start();
    if(!$_SESSION['loggedIn']){
        header("location:login.php");
        exit;
    }

    include "connectDB.php";
    include "databaseCountriesFunctions.php";

    $name=$_POST['name'];
    saveCountry($name);
    header('location:./countries.php');

?>