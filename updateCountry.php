<?php

    session_start();
    if(!$_SESSION['loggedIn']){
        header("location:login.php");
        exit;
    }

    include "connectDB.php";
    include "databaseCountriesFunctions.php";

    $id = $_POST['id'];
    $name = $_POST['name'];

    updateCountry($name, $id);

    header('location:countries.php');    

?>