<!doctype html>
<html lang="en">

<head>
  
  <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
  

  <title>Hello, world!</title>
</head>


<body>
<style>
         #prueba {
          font-family: 'Staatliches', serif;
          font-size: 20px;
          color: white;
        }
        
      </style>


<?php if (!isset($_POST["mail"])) : ?>
                    <form method="post">
                      <div id="prueba">
                        CREAR CUENTA:
                        
                        <input type="text" name="Nombre" placeholder="Nombre *" required><br>
                        <input type="text" name="Apellidos" placeholder="Apellidos usuario *" required><br>
                        <input type="text" name="Direccion" placeholder="Direccion usuario *" required><br>
                        <input type="password" name="pass" placeholder="Contraseña (5 digitos)*" required><br>
                        <input type="password" name="pass1" placeholder="Repita Contraseña *" required><br>
                        <input type="email" name="mail" placeholder="Email *" required><br>
                       <p> <input type="submit" style="font-family: 'Staatliches',serif; font-size: 20px;" 
                       value="SEND"></p>
      </div>
                    </form>

                  <!-- DATA IN $_POST['mail']. Coming from a form submit -->
                  <?php else: ?>

                    <?php

            
                    $connection = new mysqli("localhost", "tf", "123456", "proyecto");
                    $connection->set_charset("utf8");



                    if ($connection->connect_errno) {
                    printf("Connection failed: %s\n", $connection->connect_error);
                    exit();
                    }

                    if ( $_POST['pass'] == $_POST['pass1']) {
                      $query="INSERT INTO Usuarios(Nombre,Apellidos,Direccion,pass,email) values 
                    ('".$_POST['Nombre']."','".$_POST['Apellidos']."'
                    ,'".$_POST['Direccion']."','".$_POST['pass']."','".$_POST['mail']."');";
                    
                    
                    if ($result = $connection->query($query)) {
                    
                        echo "Se ha creado el usuario.<br>";
                        echo "Nombre : ".$_POST['Nombre']."<br>";
                        echo "Apellidos : ".$_POST['Apellidos']."<br>";
                        echo "Direccion : ".$_POST['Direccion']."<br>";
                        echo "Email : ".$_POST['mail'];
                    } else {
                        echo "Ha habido algun error";
                        echo $query;
                    } 
                    }
                      else {

                      echo "LAS CONTRASEÑAS NO COINCIDEN";
                    } 
                    
                     
                        
                        
                    ?>

                  <?php endif ?>


                  </body>

</html>
