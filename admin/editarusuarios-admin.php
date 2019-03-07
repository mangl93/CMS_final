<?php 
session_start();
include("header-admin.php");

if ($_SESSION['tipo']=='user') {
    session_destroy();
    header ("Location: ../index.php");
} 

?>
<!doctype html>


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="layoutpractica.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> 
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
          
          color: black;
        }
      </style>

  <div class="container-fluid">
    <div class="row justify-content-around background" id="tercero">
        
    <?php  
             $connection = new mysqli("localhost", "tf", "123456", "proyecto");
            $connection->set_charset("utf8");


            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }

        ?>




          <?php if (!isset($_POST["Nom"])) : ?>
            <?php
            
                $query="select * from Usuarios where CodUsu=".$_GET['cod'];
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
            
            <form class="form-group" method="post">

            
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Nombre</label>
                  
                  <input type="text" class="form-control" name="Nom" value="<?php echo $Nombre ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Apellidos</label>
                  <input type="text" class="form-control" name="Ape" value="<?php echo $Apellidos ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputAddress">Direccion</label>
                <input type="text" class="form-control" name="Dir" value="<?php echo $Direccion ?>">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputCity">Nickname</label>
                  <input type="text" class="form-control" name="nick" value="<?php echo $nick ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputState">Email</label>
                  <input type="text" class="form-control" name="mail" value="<?php echo $mail ?>">
                </div>
              
              </div>
              <center>
              <button type="submit" class="btn btn-primary">Editar</button>

                </center>
                </form>

              <?php else:  ?>
              
              <?php 
              $nombre1=$_POST['Nom'];
              $Apellidos1=$_POST['Ape'];
              $Direccion1=$_POST['Dir'];
              $nick1=$_POST['nick'];
              $mail1=$_POST['mail'];

              
              
              $connection = new mysqli("localhost", "tf", "123456", "proyecto");
              $connection->set_charset("utf8");

              //TESTING IF THE CONNECTION WAS RIGHTNombre
              if ($connection->connect_errno) {
                  printf("Connection failed: %s\n", $connection->connect_error);
                  exit();
              }


              $query="UPDATE Usuarios set Nombre='$nombre1', Apellidos='$Apellidos1'
              , Direccion='$Direccion1', Nickname='$nick1' ,email='$mail1' 
              where CodUsu='".$_GET['cod']."';"; 

                
                if ($result = $connection->query($query)) {
                    echo "<div class='card'>";
                    echo "<div class='card-header bg-secondary '>";

                    echo "<h3>ACTUALIZAR USUARIO ".$_GET['cod']." : </h3>";
                    echo "</div>";
                    echo "<div class='card-body' style='color:black;'>";

                    echo "Nuevo nombre : ".$nombre1."<br>";
                    echo "Nuevos apellidos : ".$Apellidos1."<br>";
                    echo "Nueva dirección : ".$Direccion1."<br>";
                    echo "Nuevo nickname : ".$nick1."<br>";
                    echo "Nuevo email : ".$mail1."<br><br>";

                    echo "<center><button type='button' class='btn btn-light lista btn-lg'>
                    <a href='usuarios-admin.php'>VOLVER</a>
                  </button></center>"; 
                  echo "</div>";

                    echo "</div>";
                    
                    
                    
                    
                } else {
                    echo $query;
                }
              
              
              ?>

              <?php endif ?>
              </div>
            
            

            </body>

        </html>
