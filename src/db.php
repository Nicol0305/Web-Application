<!-- CONECTAREA LA BAZA DE DATE -->

<?php

function Createdb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "caracteristici_produs";

    // create connection
    $con = mysqli_connect($servername, $username, $password);

    // Check Connection
   if (!$con){
        die("Connection Failed : " . mysqli_connect_error());
    }

    // create Database
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    if(mysqli_query($con, $sql)){
        $con = mysqli_connect($servername, $username, $password, $dbname);

        $sql = "
                        CREATE TABLE IF NOT EXISTS produs(
                            IDProdus INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            nume_produs VARCHAR (25) NOT NULL,
                            pret_produs DECIMAL(8,2) NOT NULL,
                            cantitate INT(3),
                            descriere TEXT,
                            comentarii TEXT,
                            rating INT(1),
                            image varchar(255)
                            
                        );
        ";

        if(mysqli_query($con, $sql)){
            return $con;
        }else{
            echo "Cannot Create table...!";
        }

    }else{
        echo "Error while creating database ". mysqli_error($con);
    }

}