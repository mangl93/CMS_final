<?php 
ob_start();
session_start();

if ($_SESSION['tipo']=='user') {
    session_destroy();
    echo $_SESSION['tipo'];
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

          <?php if (!isset($_POST["tipo"])) : ?>
            
            <form role="form" method="post" enctype="multipart/form-data">
  
            <div class="form-group row">


            <label for="display_name" class="col-lg-12 col-form-label">Tipo</label>

            <div class="col-lg-12 text-left">

                <input type="text" class="form-control" name="tipo" placeholder>

            </div>

            </div>
  
          
            <div class="form-group row">


            <label for="display_name" class="col-lg-12 col-form-label">Descripcion</label>

            <div class="col-lg-12 text-left">

                <input type="text" class="form-control"  name="descripcion" placeholder>

            </div>

            </div>
            <div class="form-group row">


            <label for="display_name" class="col-lg-6 col-form-label">Precio :</label>

            <div class="col-lg-6 text-left">

                <input type="text" class="form-control"  name="precio" placeholder="€">

            </div>

            </div>
            
            <div class="form-group row">


            <label for="display_name" class="col-lg-12 col-form-label">Imagen</label>

                <div class="col-lg-12 text-left">

                <input type="file" class="form-control" name="imagen" placeholder>

                </div>
                
            </div>

  
             
                  
              <div class="form-group row">
  
                  <div class="col-lg-12 text-left ">
  
                      <input type="submit" class="form-control btn btn-info" placeholder>
      
                  </div>
  
              </div>
                      
              </div>
  
  
              </form>
              <?php else:  ?>

              <?php
                $tipo = $_POST['tipo'];
                $descripcion = $_POST['descripcion'];
                $precio = $_POST['precio'];
                $file = $_FILES["imagen"]["tmp_name"];
                $location = "../pistas/";
                $name = $_FILES["imagen"]["name"];

                if (!move_uploaded_file( $file, $location . $_FILES["imagen"]["name"])) {
                   
                };
                $connection = new mysqli("localhost", "tf", "123456", "proyecto");
                $connection->set_charset("utf8");
                if ($connection->connect_errno) {
                    printf("Connection failed: %s\n", $connection->connect_error);
                    exit();
                }
                $query="insert into Pistas(tipo,Descripcion,file,Precio) 
                values('$tipo','$descripcion','pistas/$name','$precio');";

                if ($result = $connection->query($query)) {
                header("location: pistas-admin.php");
                }

              ?>
              <?php endif ?>

             
  
        </div>
  
  
  
 




    </body>

</html>
<?php
ob_end_flush();
?>