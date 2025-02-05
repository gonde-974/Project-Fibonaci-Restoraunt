<?php 
require_once "bootstrap.php";

if($_POST['sendMessageBtn']){
    // var_dump('Podatok od forma vo contsact.php');
    $contact->contactCustomer();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>Contaact</title>
    <style>
        body{
            background-image: url('https://media.istockphoto.com/id/1148553628/photo/delivery-healthy-food.jpg?s=612x612&w=0&k=20&c=HZ4HIxeH2AfOQ37mkB5Ug7i6xwhLUGAcG2jAs21iuZE=');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        div{
            margin-top: 0pxpx;
            display: flex;
            
            color:brown;
            font-size: 30px;
            text-align: center;
        }
        .alert{
            margin-left: 300px;
            width: 60%;
        
        
        }

        @media(max-width: 480px){
            .alert{
                margin-left: 5px;
            }
        }
        
       
    </style>
</head>
<body>
<nav class="custom-navbar" style="margin-top: -500px">
    <div class="container">
      <a href="index.html" class="navbar-brand">Fibonaci</a>
      <div class="navbar-toggler" id="navbar-toggler">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <ul class="navbar-links">
        <li><a href="./index.html" class="nav-link">Home</a></li>
        <li><a href="./about.html" class="nav-link">About</a></li>
        <li><a href="./menu.html" class="nav-link">Menu</a></li>
        <li><a href="./blog.html" class="nav-link">Stories</a></li>
        <li><a href="./contact.html" class="nav-link">Contact</a></li>
        <li><a href="./reservation.html" class="cta nav-link">Book a table</a></li>
      </ul>
    </div>
  </nav>

</body>
</html>