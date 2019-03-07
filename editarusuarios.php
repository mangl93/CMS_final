

    <!doctype html>


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="layoutpractica.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
    <?php 
    session_start();
    if (!isset($_SESSION['cod'])) {
        session_destroy();
        header ("Location: index.php");
    }

    ?>
    <style>
        body {
          font-family: 'Roboto', sans-serif;
          font-size: 18px;
          color: black;
        }
      </style>
    
    <?php
    include("header.php");
    ?>
    
      

    <div class="container-fluid background">
    <div class="row justify-content-around" id="tercero">
        
    <?php  //CREATING THE CONNECTION

        
             $connection = new mysqli("localhost", "tf", "123456", "proyecto");
            $connection->set_charset("utf8");

            //TESTING IF THE CONNECTION WAS RIGHT
            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }

        ?>




      <?php if (!isset($_POST["Nom"])) : ?>
        <?php
        
            //MAKING A SELECT QUERY
            /* Consultas de selección que devuelven un conjunto de resultados */
         
            $query="select * from Usuarios where CodUsu=".$_SESSION['cod'];
            if ($result = $connection->query($query)) {
                while($obj = $result->fetch_object()) {
                
                $CodUsu=$obj->CodUsu;
                $Nombre=$obj->Nombre;
                $Apellidos=$obj->Apellidos;
                $Direccion=$obj->Direccion;
                $nick=$obj->Nickname;
                $mail=$obj->email;

                }
            }

        ?>
        
        <form method="post">
        
        <fieldset>
            <div class="card">
            <div class="card-header bg-secondary">
            <center><h2 style="color:white;">ACTUALIZAR USUARIO</h2></center>
            </div>
            <div class="card-body">
            <input type="hidden" name="Cod" value="<?php echo $_SESSION['cod']?>" ><br>
            <span>Nombre : </span><input type="text" name="Nom" value="<?php echo $Nombre?>"required><br>
            <span>Apellidos : </span><input type="text" name="Ape" value="<?php echo $Apellidos?>" required><br>
            <span>Nickname : </span><input type="text" name="nick" value="<?php echo $nick?>"required><br>
            <span>Email : </span><input type="text" name="mail" value="<?php echo $mail?>"required><br>
            <span>Direccion : </span><input type="text" name="Dir" value="<?php echo $Direccion?>" required><br>
            <br>
            <p><input type="submit" value="Enviar"></p>
          </fieldset>
        </div>
        
         
        </form>

      <!-- DATA IN $_POST['mail']. Coming from a form submit -->
      <?php else:  ?>
      
      <?php 
      $COD=$_SESSION['cod'];
      $nombre1=$_POST['Nom'];
      $Apellidos1=$_POST['Ape'];
      $Direccion1=$_POST['Dir'];
      $nick=$_POST['nick'];
      $mail=$_POST['mail'];
      
      
      $connection = new mysqli("localhost", "tf", "123456", "proyecto");
      $connection->set_charset("utf8");

      //TESTING IF THE CONNECTION WAS RIGHTNombre
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }

      
      $query="UPDATE Usuarios set Nombre='$nombre1', Apellidos='$Apellidos1'
      , Direccion='$Direccion1',Nickname='$nick', email='$mail' where CodUsu='$COD';"; 
        

        if ($result = $connection->query($query)) {
            echo "<div class='card mb-3' style='color:black;'>";
            echo "<div class='card-header bg-secondary'>";
            echo "<h3 style='color:white;'>ACTUALIZACIÓN DE USUARIO </h3>";
            echo "</div>";
            echo "<div class='card-body' '>";
            echo "Codigo de Usuario : ".$COD."<br>";
            echo "Nuevo nombre : ".$nombre1."<br>";
            echo "Nuevos apellidos : ".$Apellidos1."<br>";
            echo "Nuevo nickname : ".$nick."<br>";
            echo "Nuevo email : ".$mail."<br>";
            echo "Nueva dirección : ".$Direccion1."<br><br>";
            echo "<center><button type='button' class='btn btn-PRIMARY lista btn-lg'>
            <a href='principal.php'>VOLVER A MI INFORMARCION</a></button></center>"; 
            echo "</div>";
            echo "</div>";
            echo "</div>";

            
             
            
        }
       
       
       ?>
       
      <?php endif ?>





    <?php
      include("includes/footer-admin.html");
      ?>
      </div>
</body>

</html>
