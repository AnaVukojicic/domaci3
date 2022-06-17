<?php

    session_start();
    if(!$_SESSION['loggedIn']){
        header("location:login.php");
        exit;
    }

    include "connectDB.php";
    Include "databaseCitiesFunctions.php";
    include "databaseFunctions.php";

    if(isset($_GET['id'])){
        $city=findCityByID($_GET['id']);
    }else{
        header('location:cities.php');
        exit;
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
                <h3>Izmjena detalja grada</h3>
                <form action="updateCity.php" method="POST">
                    <input type="hidden" name="id" value="<?=$city['id']?>">
                    <input type="text" required class="mt-3 form-control" name="name" placeholder="Unesite ime grada..." value="<?=$city['name']?>">
                    <select name="country_id" id="country_id" class="form-control mt-3" onchange="displayCities()">
                        <?php
                            $name=$city['name'];
                            $id=$city['id'];
                            $country_name=$city['country_name'];
                            $country_id=$city['country_id'];
                            echo "<option value='$country_id' selected >$country_name</option>";
                        
                            $countries = getCountries();
                            while($country = mysqli_fetch_assoc($countries)){
                                $countryId = $country['id'];
                                $countryName = $country['name'];
                        
                                echo "<option value='$countryId' >$countryName</option>";
                            }
                        ?>
                    </select>
                    <a href="./cities.php" class="float-start btn mt-3 btn-primary">Nazad</a>
                    <button class="btn float-end mt-3 btn-primary">Izmijeni grad</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src='./app.js'></script>
</body>
</html>