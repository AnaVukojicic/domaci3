<?php

    session_start();
    include "connectDB.php";
    include "databaseCountriesFunctions.php";

    if(!$_SESSION['loggedIn']){
        header('location:./login.php');
        exit;
    }

    $searchTerm = "";
    if(isset($_GET['searchTerm']) && $_GET['searchTerm'] != ""){
        $searchTerm = $_GET['searchTerm'];
        $countries = getCountriesFromDatabase($searchTerm);
    }else{
        $countries = getCountriesFromDatabase();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Phonebook - countries</title>
</head>
<body>

    <div class="container-fluid">
        <div class="row bg-dark">
            <nav class="navbar navbar-light offset-3 col-6">
                <a class="btn btn-outline-warning" id="nav-link" class="navbar-brand " href="./index.php">Kontakti</a>
                <a class="btn btn-outline-warning" id="nav-link" class="navbar-brand " href="./countries.php">Drzave</a>
                <a class="btn btn-outline-warning" id="nav-link" class="navbar-brand " href="./cities.php">Gradovi</a>
            </nav>
        </div>
    </div>

    <div class="container">

        <div class="row mt-5">
            <div class="offset-1 col-2">
                <a class="btn btn-success" href="addCountry.php">Dodaj drzavu</a>
            </div>
            <div class="col-8">
                <form action="countries.php" method="GET">
                    <input type="text" value="<?=$searchTerm?>" name="searchTerm" placeholder="Pretrazite drzavu po imenu" class="btn-outline-dark form-control">
                </form>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-10 offset-1">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Naziv drzave</th>
                            <th>Izmjena</th>
                            <th>Brisanje</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            foreach($countries as $country){
                                $name=$country['name'];
                                $id=$country['id'];
                                
                                echo "<div class='modal fade' id='country$id' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                            <h5 class='modal-title' id='exampleModalLabel'>Brisanje drzave</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body'>
                                                Da li ste sigurni da zelite da obrisete drzavu <b>$name</b>?
                                            </div>
                                            <div class='modal-footer'>
                                            <a href='./countries.php' class='btn btn-secondary' data-bs-dismiss='modal'>Ne</a>
                                            <a class='btn btn-danger' href='deleteCountry.php?id=$id'>Da</a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>";

                                echo "<tr>
                                        <td>$name</td>
                                        <td><a class='btn btn-warning' href='./editCountry.php?id=$id'>Izmjena</a></td>
                                        <td>
                                            <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#country$id'>
                                                Brisanje
                                            </button>
                                        </td>
                                    </tr>";
                            }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>