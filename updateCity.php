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
    $id=$_POST['id'];

    updateCity($name,$country_id,$id);
    header('location:./cities.php');

?>