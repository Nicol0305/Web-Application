<?php

require_once ("db.php");
require_once ("component.php");

$con = Createdb();            //connecting to the database

// create button click
if(isset($_POST['create'])){
    createData();
}

if(isset($_POST['update'])){
    UpdateData();
}

if(isset($_POST['delete'])){
    deleteRecord();
}

if(isset($_POST['deleteall'])){
    deleteAll();

}


//insert data into sql database
function createData(){
    $numeprodus = textboxValue("nume_produs");
    $pretprodus = textboxValue("pret_produs");
    $cantitate = textboxValue("cantitate");
    $descriere = textboxValue("descriere");
    $comentarii = textboxValue("comentarii");
    $rating = textboxValue("rating");


    if($numeprodus && $pretprodus && $cantitate){

        $sql = "INSERT INTO produs (nume_produs, pret_produs, cantitate, descriere, comentarii, rating)       
                VALUES ('$numeprodus','$pretprodus', '$cantitate','$descriere','$comentarii','$rating')";  //query 

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Record Successfully Inserted...!");
        }else{
            echo "Error";
        }

    }else{
            TextNode("error", "Provide Data in the Textbox");
    }
}

function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    }else{
        return $textbox;
    }
}


// messages
function TextNode($classname, $msg){
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}


// get data from mysql database
function getData(){
    $sql = "SELECT * FROM produs";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}

// get ordered data from mysql database
function getOrderedDataByRating(){
    $rating = textboxValue("rating");
    $sql = "SELECT * FROM produs ORDER BY rating DESC";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}

function getOrderedDataByPrice(){
    $cantitate = textboxValue("pret_produs");
    $sql = "SELECT * FROM produs ORDER BY pret_produs DESC";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
    }
} 

// update data
function UpdateData(){
    $idprodus = textboxValue("IDProdus");
    $numeprodus = textboxValue("nume_produs");
    $pretprodus = textboxValue("pret_produs");
    $cantitate = textboxValue("cantitate");
    $descriere = textboxValue("descriere");
    $comentarii = textboxValue("comentarii");
    $rating = textboxValue("rating");

    if($numeprodus && $pretprodus && $cantitate && $descriere && $comentarii && $rating){
        $sql = "UPDATE produs SET nume_produs='$numeprodus', pret_produs = '$pretprodus', cantitate = '$cantitate', descriere = '$descriere',comentarii = '$comentarii', rating = '$rating'  WHERE IDProdus='$idprodus';";              //query pentru update in tabelul firme

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Data Successfully Updated");
        }else{
            TextNode("error", "Enable to Update Data");
        }

    }else{
        TextNode("error", "Select Data Using Edit Icon");
    }


}

//delete data
function deleteRecord(){
    $idprodus = (int)textboxValue("IDProdus");

    $sql = "DELETE FROM produs WHERE IDProdus=$idprodus";   //query pentru delete din tabelul firme

    if(mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success","Record Deleted Successfully...!");
    }else{
        TextNode("error","Enable to Delete Record...!");
    }

}

// if there are more than 3 products in the table, the button activates
function deleteBtn(){
    $result = getData();
    $i = 0;
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $i++;
            if($i > 3){
                buttonElement("btn-deleteall", "btn btn-danger" ,"<i class='fas fa-trash'></i> Delete All", "deleteall", "");
                return;   
            }
        }
    }
}


function deleteAll(){
    $sql = "DROP TABLE firme";

    if(mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success","All Record deleted Successfully...!");
        Createdb();
    }else{
        TextNode("error","Something Went Wrong Record cannot deleted...!");
    }
}


// the ID increments automatically
function setID(){
    $getid = getData();
    $id = 0;
    if($getid){
        while ($row = mysqli_fetch_assoc($getid)){
            $id = $row['IDProdus'];
        }
    }
    return ($id + 1);
}