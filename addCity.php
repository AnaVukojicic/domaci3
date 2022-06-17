<?php
    session_start();
    if(!$_SESSION['loggedIn']){
        header("location:login.php");
        exit;
    }
    include "connectDB.php";
    include "databaseFunctions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phonebook-add city</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container">
        <diw class="row mt-5">
            <div class="col-8 offset-2">
                <h3>Dodavanje novog grada</h3>
                <form action="saveCity.php" method="POST">
                    <input type="text" required class="mt-3 form-control" name="name" placeholder="Unesite ime grada...">
                    <select name="country_id" id="country_id" class="form-control mt-3" onchange="displayCities()">
                        <?php
                            echo "<option value='' selected disabled>Odaberite drzavu</option>";
                        
                            $countries = getCountries();
                            while($country = mysqli_fetch_assoc($countries)){
                                $countryId = $country['id'];
                                $countryName = $country['name'];
                        
                                echo "<option value=\"$countryId\" >$countryName</option>";
                            }
                        ?>
                    </select>
                    <a class="btn float-start mt-3 btn-primary" href="./countries.php">Nazad</a>
                    <button class="btn float-end mt-3 btn-primary">Dodaj grad</button>
                </form>
            </div>
        </diw>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>