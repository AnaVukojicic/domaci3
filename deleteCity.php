<?php

    session_start();
    if(!$_SESSION['loggedIn']){
        header("location:login.php");
        exit;
    }

    include "connectDB.php";
    include "databaseCitiesFunctions.php";

    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }else{
        header('location:cities.php');
        exit;
    }

    if(checkCityAndContacts($id)){
        header('location:cities.php?msg="CannotDeleteCity-RelatedData"');
        exit;
    }
    deleteCity($id);
    header('location:cities.php');

?>