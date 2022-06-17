<?php

    function getCountriesFromDatabase($searchTerm=''){
        global $db_connection;
        //$user_id=$_SESSION['user']['id'];
        // $command="SELECT countries.* FROM countries,users,cities,contacts WHERE users.id=contacts.user_id AND contacts.city_id=cities.id 
        //         AND cities.country_id=countries.id";
        $command="SELECT * FROM countries";
        if($searchTerm!=''){
            $term=strtolower($searchTerm);
            $command.=" WHERE lower(name) LIKE '%$term%'";
        }
        $res=mysqli_query($db_connection,$command);
        $countries=[];
        while($country=mysqli_fetch_assoc($res)){
            $countries[]=$country;
        }
        return $countries;
    }

    function findCountryByID($id){
        global $db_connection;
        $command="SELECT * FROM countries WHERE countries.id=$id";
        $res=mysqli_query($db_connection,$command);
        return mysqli_fetch_assoc($res);
    }

    function updateCountry($name,$id){
        global $db_connection;
        $command="UPDATE countries SET name='$name' WHERE id=$id";
        return mysqli_query($db_connection,$command);
    }

    function deleteCountry($id){
        global $db_connection;
        $command="DELETE FROM countries WHERE countries.id=$id";
        return mysqli_query($db_connection,$command);
    }

    function checkCountryAndCity($id){
        global $db_connection;
        $command="SELECT cities.id FROM countries,cities WHERE countries.id=$id AND cities.country_id=countries.id";
        $res=mysqli_query($db_connection,$command);
        return mysqli_fetch_assoc($res);
    }

    function saveCountry($name){
        global $db_connection;
        $command="INSERT INTO countries(name) VALUES('$name')";
        return mysqli_query($db_connection,$command);
    }

?>