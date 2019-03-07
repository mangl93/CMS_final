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
  
         
  
          <div class="col-lg-12 text-left">

          <?php if (!isset($_POST["nombre"])) : ?>

          <?php
          $connection = new mysqli("localhost", "tf", "123456", "proyecto");
                $connection->set_charset("utf8");
                if ($connection->connect_errno) {
                    printf("Connection failed: %s\n", $connection->connect_error);
                    exit();
                }
                $query="select * from Articulos where CodArt = ".$_GET['cod'].";";

                if ($result = $connection->query($query)) {
                    while($obj = $result->fetch_object()) {
                        $nombre = $obj->Nombre;
                        $marca = $obj->Marca;
                        $file = $obj->file;
                        $precio = $obj->Precio;   
                        $descripcion = $obj->Descripcion;


                    }
                }
            ?>

            <form role="form" method="post" enctype="multipart/form-data">
  
            <div class="form-group row">


            <label for="display_name" class="col-lg-12 col-form-label">Nombre</label>

            <div class="col-lg-12 text-left">

                <input type="text" class="form-control" name="nombre" value="<?php echo $nombre;?>">

            </div>

            </div>
            <div class="form-group row">


            <label for="display_name" class="col-lg-12 col-form-label">Marca</label>

            <div class="col-lg-12 text-left">

                <input type="text" class="form-control" name="marca" value="<?php echo $marca;?>">

            </div>

            </div>

            <div class="form-group row">


            <label for="display_name" class="col-lg-12 col-form-label">Imagen </label>

            <div class="col-lg-4 text-left">

                <img name="tipo" src="../<?php echo $file;?>" width="150px">

            </div>
            

            </div>
            <div class="form-group row">


            <label for="display_name" class="col-lg-12 col-form-label">Nueva imagen </label>

            <div class="col-lg-12 text-left">

                <input type="file" class="form-control"  name="imagen" >

            </div>
            

            </div>
            
  
          
            <div class="form-group row">


            <label for="display_name" class="col-lg-12 col-form-label">Descripcion</label>

            <div class="col-lg-12 text-left">

                <input type="text" class="form-control"  name="descripcion" value="<?php echo $descripcion;?>">

            </div>

            </div>
            <div class="form-group row mt-3 ml-3">


            <label for="display_name" class="col-lg-6 col-form-label">Precio :</label>

            <div class="col-lg-6 text-left">

                <input type="text" class="form-control"  name="precio" value="<?php echo $precio;?>">
                </div>

            <div class="col-lg-6 text-left">
                <input type="submit" class="form-control btn btn-info" placeholder>
            </div>
           

            </div>
            
            
            
            <div class="form-group row">


            

  
             
                  
              <div class="form-group row">
  
                  <div class="col-lg-12 text-left ">
  
                      
      
                  </div>
  
              </div>
                      
              </div>
  
  
              </form>
              <?php else:  ?>

              <?php
                
                $connection = new mysqli("localhost", "tf", "123456", "proyecto");
                $connection->set_charset("utf8");
                if ($connection->connect_errno) {
                    printf("Connection failed: %s\n", $connection->connect_error);
                    exit();
                }


                
                if (($_FILES['imagen']['size']) != 0 ) {

                  
                $descripcion1 = $_POST['descripcion'];
                $precio1 = $_POST['precio'];
                $marca1 = $_POST['marca'];
                $nombre1 = $_POST['nombre'];
                $file = $_FILES["imagen"]["tmp_name"];
                $location = "../articulos/";
                $name = $_FILES["imagen"]["name"];

                move_uploaded_file( $file, $location . $_FILES["imagen"]["name"]);

                $query="update Articulos set Nombre = '$nombre1' ,Descripcion = '$descripcion1' ,
                Marca = '$marca1' ,Precio = '$precio1' , file = 'articulos/$name' where CodArt = '".$_GET['cod']."';";

                if ($result = $connection->query($query)) {

                    echo "<div class='card' style='color:black;'>";
                    echo "<div class='card-header bg-secondary'>";
                    echo "Articulo nº ".$_GET['cod'];
                    echo "</div>";
                    echo "<div class='card-body'>";
                    echo "Articulo actualizado";
                    echo "</div>";
                    echo "<div class='card-footer'>";
                    echo "<button><a href='articulos-admin.php'>Volver</a></button>";
                    echo "</div>";
                }   
                }
                else {
                    
                    $descripcion1 = $_POST['descripcion'];
                    $precio1 = $_POST['precio'];
                    $marca1 = $_POST['marca'];
                    $nombre1 = $_POST['nombre'];
                    $query="update Articulos set Nombre = '$nombre1' ,Descripcion = '$descripcion1' ,
                Marca = '$marca1' ,Precio = '$precio1'  where CodArt = '".$_GET['cod']."';";

                if ($result = $connection->query($query)) {

                    echo "<div class='card' style='color:black;'>";
                    echo "<div class='card-header bg-secondary'>";
                    echo "Articulo nº ".$_GET['cod'];
                    echo "</div>";
                    echo "<div class='card-body'>";
                    echo "Articulo actualizado";
                    echo "</div>";
                    echo "<div class='card-footer'>";
                    echo "<button><a href='articulos-admin.php'>Volver</a></button>";
                    echo "</div>";
                } else {
                    echo $query;
                }


                }
               

              ?>
              <?php endif ?>
             
  
        </div>
  
  
  
 




    </body>

</html>
