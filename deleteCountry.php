<?php

    session_start();
    if(!$_SESSION['loggedIn']){
        header("location:login.php");
        exit;
    }

    include "connectDB.php";
    include "databaseCountriesFunctions.php";

    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }else{
        header('location:countries.php');
        exit;
    }

    if(checkCountryAndCity($id)){
        header('location:countries.php?msg="CannotDeleteCountry-RelatedData"');
        exit;
    }

    deleteCountry($id);
    header('location:countries.php');

?>