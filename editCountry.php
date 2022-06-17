<?php 

    session_start();
    if(!$_SESSION['loggedIn']){
        header("location:login.php");
        exit;
    }

    include "connectDB.php";
    include "databaseCountriesFunctions.php";

    if(isset($_GET['id'])){
        $country = findCountryByID($_GET['id']);
    }else{
        header("location:countries.php");
    }
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phonebook - edit country</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="row mt-5">
        <div class="col-8 offset-2">
            <h3>Izmjena detalja drzave</h3>
            <form action="updateCountry.php" method="POST">
                <input type="hidden" name="id" value="<?=$country['id']?>">
                <input type="text" required class="mt-3 form-control" name="name" placeholder="Unesite ime drzave..." value="<?=$country['name']?>">
                <a href="./countries.php" class="float-start btn mt-3 btn-primary">Nazad</a>
                <button class="float-end btn mt-3 btn-primary">Izmijeni drzavu</button>
            </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>