<?php

session_start();
if(!$_SESSION['loggedIn']){
    header("location:login.php");
    exit;
}

    include "connectDB.php";
    include "databaseCitiesFunctions.php";

    $name=$_POST['name'];
    $country_id=$_POST['country_id'];
    saveCity($name,$country_id);
    header('location:./cities.php');

?>