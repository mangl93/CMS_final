<?php 
session_start();

if ($_SESSION['tipo']=='') {
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
          color: black;
        }
      </style> 
  <div class="row justify-content-between" id="cabecera">
    
    <?php
    include("header-admin.php");
    ?>

    </div>
         
    <div class="container-fluid background">
        <center>

    <div  id="tercero">
    <div class="col-10 card" style="color:black;">
        <?php
        $connection = new mysqli("localhost", "tf", "123456", "proyecto");
        $connection->set_charset("utf8");

        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }

        $query="select * from Usuarios";
        if ($result = $connection->query($query)) {
        ?>

    <table style="border:1px solid white">
    <thead >
        <tr>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Direccion</th>
            <th>Email</th>
            
            <th>Acciones</th>
        </tr>
    </thead>
    

    <?php

        //FETCHING OBJECTS FROM THE RESULT SET
        //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
        
        
        while($obj = $result->fetch_object()) {
            //PRINTING EACH ROW
            
            echo "<tr >";
            echo  "<td align='center'>
            ".$obj->CodUsu."
            </td>";
            echo "<td>".$obj->Nombre."</td>";
            echo "<td>".$obj->Apellidos."</td>";
            echo "<td>".$obj->Direccion."</td>";

            echo "<td>".$obj->email."</td>";

            echo "<td><a href='editarusuarios-admin.php?cod=$obj->CodUsu'><center><button class='btn'>
            <i class='fa fa-pencil' style='color:blue;' aria-hidden='true'></i></a></button>
            <button class='btn'><a href='eliminarusuarios-admin.php?cod=$obj->CodUsu'>
            <i class='fa fa-trash'  style='color:red;' 
            aria-hidden='true'></i></a></button></center></td>";
            echo "<td><td>";

            

                        
            echo "</tr>";
            
        }echo "</table>";

        $result->close();
        unset($obj);
        unset($connection);

    } 

        ?>
       
        <div class="card-footer">
        <a href="nuevousuario-admin.php"><div class="btn btn-block btn-info" >Nuevo usuario</div></a>

        </div>
      
    </div>
  </div>
</div>
      </div>
          </div>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  

      </div></center>
      </div>
    </div>

 



    </body>

</html>