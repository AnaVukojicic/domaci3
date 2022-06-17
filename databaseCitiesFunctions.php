<?php

    function getCitiesFromDatabase($searchTerm=''){
        global $db_connection;
        $command="SELECT cities.*, countries.name AS country_name FROM cities,countries WHERE cities.country_id=countries.id";
        if($searchTerm!=''){
            $term=strtolower($searchTerm);
            $command.=" AND lower(cities.name) LIKE '%$term%'";
        }
        $res=mysqli_query($db_connection,$command);
        $cities=[];
        while($city=mysqli_fetch_assoc($res)){
            $cities[]=$city;
        }
        return $cities;
    }

    function findCityByID($id){
        global $db_connection;
        $command="SELECT cities.*, countries.name AS country_name FROM cities,countries WHERE cities.id=$id AND cities.country_id=countries.id";
        $res=mysqli_query($db_connection,$command);
        return mysqli_fetch_assoc($res);
    }

    function updateCity($name,$country_id,$id){
        global $db_connection;
        $command="UPDATE cities SET name='$name', country_id=$country_id WHERE id=$id";
        return mysqli_query($db_connection,$command);
    }

    function deleteCity($id){
        global $db_connection;
        $command="DELETE FROM cities WHERE id=$id";
        return mysqli_query($db_connection,$command);
    }

    function checkCityAndContacts($id){
        global $db_connection;
        $command="SELECT contacts.id FROM cities,contacts WHERE cities.id=contacts.city_id AND cities.id=$id";
        $res=mysqli_query($db_connection,$command);
        return mysqli_fetch_assoc($res);
    }

    function saveCity($name,$country_id){
        global $db_connection;
        $command="INSERT INTO cities(name,country_id) VALUES('$name',$country_id)";
        return mysqli_query($db_connection,$command);
    }

?>