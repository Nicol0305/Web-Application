<?php

require_once ("component.php");            //se importa fisierele necesare 
require_once ("operation.php");
require_once ("db.php");

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Magazin online</title>


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
  <a href="http://localhost/myphp/crud/aplicatie/cart.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-shopping-cart"></span> Cos de cumparaturi
        </a>

  <style>
body {
  background-image: url('1.png');

   height: 100%;
}
</style>

<main>
    <div class="container text-center">
        <h1 class="py-4 bg-light text-dark rounded"><i class="fas fa-swatchbook"></i>PRODUSE</h1>
      
        <div class="d-flex justify-content-center">

            <form action="" method="post" class="w-50">         <!--declarerea casetelor de text -->

                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-id-badge'></i>","ID", "IDProdus",setID()); ?>
                </div>
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-book'></i>","Nume Produs", "nume_produs",""); ?>
                </div>
                <div class="pt-2">
                     <?php inputElement("<i class='fas fa-people-carry'></i>","Pret(RON)", "pret_produs",""); ?>
                 </div>
                <div class="pt-2">
                     <?php inputElement("<i class='fas fa-people-carry'></i>","Cantitate", "cantitate",""); ?>
                </div>
                <div class="pt-2">
                     <?php inputElement("<i class='fas fa-people-carry'></i>","Descriere", "descriere",""); ?>
                </div>
                <div class="pt-2">
                     <?php inputElement("<i class='fas fa-people-carry'></i>","Comentarii", "comentarii",""); ?>
                </div>
                <div class="row pt-2">
                    <div class="col">
                        <?php inputElement("<i class='fas fa-people-carry'></i>","Rating(1-5)", "rating",""); ?>
                    </div>
                   
                </div>

                <div class="d-flex justify-content-center">           <!--declarerea butoanelor de insert, update, delete, ordonare, search box -->

                        <?php buttonElement("btn-create","btn btn-success","<i class='fas fa-plus'></i>","create","data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
                        <?php buttonElement("btn-read","btn btn-primary","<i class='fas fa-sync'></i>","read","data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                        <?php buttonElement("btn-update","btn btn-light border","<i class='fas fa-pen-alt'></i>","update","data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
                        <?php buttonElement("btn-delete","btn btn-danger","<i class='fas fa-trash-alt'></i>","delete","data-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
                        <?php deleteBtn();?>
                        <?php buttonElement("btn-rating","btn btn-dark","<i class='fas fa-sort-amount-up'></i>","rating","data-toggle='tooltip' data-placement='bottom' title='Order by rating'"); ?>

                         <a class="btn" href="http://localhost/myphp/crud/aplicatie/cart.php"></a>

                    
                       <input type="text" name="search" placeholder="">
                       <button type="submit" name="submit">Search</button> 
                        
                </div>

                 

            </form>

        </div>

        <!-- Bootstrap table  -->
        <div class="d-flex table-data">
            <table class="table table-striped table-light">    <!--crearea tabelului in care vor fi afisate valorile -->
                <thead class="thead-light">
                    <tr>                                      <!--capul de tabel-->
                        <th>ID</th>
                        <th>Nume Produs</th>
                        <th>Pret</th>
                        <th>Cantitate</th>
                        <th>Descriere</th>
                        <th>Comentarii</th>
                        <th>Rating</th>
                        
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                   <?php


                   if(isset($_POST['read'])){         //daca se apasa butonul de read
                       $result = getData();

                       if($result){                  //daca exista rezultate in urma interogarii

                           while ($row = mysqli_fetch_assoc($result)){ ?>     <!--cat timp exista rezultate, acestea se vor afisa -->

                               <tr>                   <!--se afiseaza in cadrul tabelului creeat, valorile corespunzatoare din baza de date-->

                                   <td data-id="<?php echo $row['IDProdus']; ?>"><?php echo $row['IDProdus']; ?></td>
                                   <td data-id="<?php echo $row['IDProdus']; ?>"><?php echo $row['nume_produs']; ?></td>
                                   <td data-id="<?php echo $row['IDProdus']; ?>"><?php echo $row['pret_produs']; ?></td>
                                   <td data-id="<?php echo $row['IDProdus']; ?>"><?php echo $row['cantitate']; ?></td>
                                   <td data-id="<?php echo $row['IDProdus']; ?>"><?php echo $row['descriere']; ?></td>
                                   <td data-id="<?php echo $row['IDProdus']; ?>"><?php echo $row['comentarii']; ?></td>
                                   <td data-id="<?php echo $row['IDProdus']; ?>"><?php echo $row['rating']; ?></td>
                                   
                                   <td ><i class="fas fa-edit btnedit" data-id="<?php echo $row['IDProdus']; ?>"></i></td> 
                                   <!--se editeaza valorile corespunzatoare ID-ului ales-->
                               </tr>

                   <?php
                           }

                       }
                   }

                   

                   elseif(isset($_POST['rating'])){         //daca se apasa butonul de ordonare dupa rating
                       $result = getOrderedDataByRating();

                       if($result){                  //daca exista rezultate in urma interogarii

                           while ($row = mysqli_fetch_assoc($result)){ ?>     <!--cat timp exista rezultate, acestea se vor afisa -->

                               <tr>                   <!--se afiseaza in cadrul tabelului creeat, valorile corespunzatoare din baza de date-->

                                   <td data-id="<?php echo $row['IDProdus']; ?>"><?php echo $row['IDProdus']; ?></td>
                                   <td data-id="<?php echo $row['IDProdus']; ?>"><?php echo $row['nume_produs']; ?></td>
                                   <td data-id="<?php echo $row['IDProdus']; ?>"><?php echo $row['pret_produs']; ?></td>
                                   <td data-id="<?php echo $row['IDProdus']; ?>"><?php echo $row['cantitate']; ?></td>
                                   <td data-id="<?php echo $row['IDProdus']; ?>"><?php echo $row['descriere']; ?></td>
                                   <td data-id="<?php echo $row['IDProdus']; ?>"><?php echo $row['comentarii']; ?></td>
                                   <td data-id="<?php echo $row['IDProdus']; ?>"><?php echo $row['rating']; ?></td>
                                   
                                   <td ><i class="fas fa-edit btnedit" data-id="<?php echo $row['IDProdus']; ?>"></i></td> 
                                   <!--se editeaza valorile corespunzatoare ID-ului ales-->
                               </tr>

                   <?php
                           }

                       }
                   }


                   ?>
                </tbody>
            </table>
        </div>    

      <?php

        if (isset($_POST['submit'])){ 

          $search = $_POST['search']; ?> <!-- variabila search preia ce este scris in caseta respectiva -->
          <div class="container">
          <table class="table table-hover">
          <thead>
          <tr>
            <th>ID</th>
                        <th>Nume Produs</th>
                        <th>Pret</th>
                        <th>Cantitate</th>
                        <th>Descriere</th>
                        <th>Comentarii</th>
                        <th>Rating</th>
         </tr> <?php

        $sql = "SELECT * FROM produs WHERE produs.nume_produs = '$search'";   //interogarea la baza de date

    $result = mysqli_query($con, $sql);      //apelarea efectiva a bazei de date 
    $resultCheck = mysqli_num_rows($result);  //preluarea rezultatelor interogarii


    if ($resultCheck > 0){                   // daca exista rezultate, acestea se vor afisa
      
      while ($row = $result->fetch_assoc()) {
       
        
        ?><tr>
           <td data-id="<?php echo $row['IDProdus']; ?>"><?php echo $row['IDProdus']; ?></td>
           <td data-id="<?php echo $row['IDProdus']; ?>"><?php echo $row['nume_produs']; ?></td>
           <td data-id="<?php echo $row['IDProdus']; ?>"><?php echo $row['pret_produs']; ?></td>
           <td data-id="<?php echo $row['IDProdus']; ?>"><?php echo $row['cantitate']; ?></td>
           <td data-id="<?php echo $row['IDProdus']; ?>"><?php echo $row['descriere']; ?></td>
           <td data-id="<?php echo $row['IDProdus']; ?>"><?php echo $row['comentarii']; ?></td>
           <td data-id="<?php echo $row['IDProdus']; ?>"><?php echo $row['rating']; ?></td>
          
         </tr><?php
    }   }
    else 
      echo '<span style="color:black;">Acest produs nu exista!<br><br></span>'; //daca nu exista rezultate, se va afisa un mesaj text
      
  
    
    }    
                   
       ?> 

    </div>
</main>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="main.js"></script>
</body>
</html>