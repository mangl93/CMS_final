<?php 
session_start();
if ($_SESSION['tipo']!='root') {
    session_destroy();
    header ("Location: ../index.php");
}   
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="layoutpractica.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> 
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>  
 
</head>

<body>
    <style>
        body {
          font-family: 'Roboto', sans-serif;
          font-size: 18px;
          background-color: grey;
          color:black;
        }
      </style>
  <div class="row justify-content-between" id="cabecera">
    <?php
    include("header-admin.php");
    ?>

    </div>
         
    <div class="container-fluid background">

    <div class="row justify-content-center" id="tercero">
        
 
    <div class="row ">
<?php if (!isset($_POST["mail"])) : ?>
                                <form method="post">
                                <div id="prueba" style="font-family:serif;">
                                    
                                                                <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="inputEmail4">Nombre</label>
                                    <input type="text" class="form-control" name="Nombre">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="inputPassword4">Apellidos</label>
                                    <input type="text" class="form-control" name="Apellidos">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Direccion</label>
                                    <input type="text" class="form-control" name="Direccion">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress2">Email</label>
                                    <input type="email" class="form-control" name="mail" required>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="inputCity">Password</label>
                                    <input type="password" class="form-control" name="pass" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                    <label for="inputState">Repita password</label>
                                    <input type="password" class="form-control" name="pass1"><br>
                                    </div>
                                    <div class="form-group col-md-2">
                                    <label for="inputZip">Nickname</label>
                                    <input type="text" class="form-control" name="Nickname">
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Registrar</button>
                                </form>
                                
                            <?php else: ?>

                                <?php

                        
                                $connection = new mysqli("localhost", "tf", "123456", "proyecto");
                                $connection->set_charset("utf8");



                                if ($connection->connect_errno) {
                                printf("Connection failed: %s\n", $connection->connect_error);
                                exit();
                                }

                                if ( $_POST['pass'] == $_POST['pass1']) {
                                $query="INSERT INTO Usuarios(Nombre,Apellidos,Direccion,pass,email,Nickname,tipo) values 
                                ('".$_POST['Nombre']."','".$_POST['Apellidos']."'
                                ,'".$_POST['Direccion']."',md5('".$_POST['pass']."'),'".$_POST['mail']."','".$_POST['Nickname']."','user');";
                                
                                
                                if ($result = $connection->query($query)) {
                                    
                                    echo "Usuario creado";
                                    echo "<button><a href='usuarios-admin.php'>VOLVER</a></button>";
                                    
                                } 
                                }else {

                                echo "LAS CONTRASEÑAS NO COINCIDEN";
                                } 
                                
                                
                                    
                                    
                                ?>

                            <?php endif ?>
                              
        </div>
  
  
  
 




  </body>

</html>
