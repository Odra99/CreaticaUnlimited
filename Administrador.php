<?php
session_start();
if(!$_SESSION['user']){
  header("location: index.php");
}
?>
 <!DOCTYPE html>

 <html lang="en">

 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Creatica Unlimited</title>


   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
   <link rel="stylesheet" type="text/css" href="css/style.css">
 <script src="https://kit.fontawesome.com/e51fb510f5.js" crossorigin="anonymous"></script>

 </head>

 <body>
<style type="text/css">
body{
  background-image: url("img/fondo.png");
  background-repeat: no-repeat;
  background-attachment: fixed;
 background-size: cover;
}
</style>

  <?php include("navAdministrador.html"); ?>



   <script src="js/jquery.min.js"></script>
   <script src="js/jquery.easing.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/custom.js"></script>
   <script src="contactform/contactform.js"></script>

 </body>

 </html>
