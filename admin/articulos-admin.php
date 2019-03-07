<?php 
session_start();
ob_start();

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
        <?php
        $connection = new mysqli("localhost", "tf", "123456", "proyecto");
        $connection->set_charset("utf8");

        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }


        $query="select * from Articulos;";

        if (isset($_GET['delete'])) {
            echo $_GET['delete'];
            $query = "delete from Articulos where CodArt = ".$_GET['delete'];
            if ($result = $connection->query($query)) {
                header("location: articulos-admin.php");
            }

        }
        else {
        if ($result = $connection->query($query)) {
             
           
            while($obj = $result->fetch_object()) {
                 
                echo "<div class='card m-3 col-lg-3' style='color:black;'>";
                echo "<div class='card-header'>";
                echo "<p class='text-uppercase'>".$obj->Nombre."</p>";
                echo "</div>";

                echo "<div class='card-body'>";
                echo "<ul>";
                echo "<li>Articulo número : ".$obj->CodArt."</li>";
                echo "<li>Marca : ".$obj->Marca."</li>";
                echo "<li>Precio : ".$obj->Precio." €</li>";
                echo "<h3>Imagen :</h3>";
                echo "<img class=' btn-light' src='../".$obj->file."' height='100px' >";
                echo "</ul>";
                echo "<p>".$obj->Descripcion. " </p>";
                echo "</div>";

                echo "<div class='card-footer'>";
                echo "<a class='btn btn-info float-left' href='editararticulos-admin.php?cod=$obj->CodArt'>Editar</a>";
                echo "<a class='btn btn-danger float-right' href='articulos-admin.php?delete=$obj->CodArt'>Eliminar</a>";
                echo "</div>";
                echo "</div>";
            }
        }
        echo "<a href='articulonuevo-admin.php'><button class='btn btn-info mt-5 ml-5' >
            Nuevo articulo</button></a>";
    }
        ?>

        
        
        </div>
  
    </div>

  
    <?php
        ob_end_flush();
    ?>





    </body>

</html>