<?php 
session_start();
if ($_SESSION['tipo']!='root') {
    session_destroy();
    header ("Location: ../index.php");
}   
?>

    <!doctype html>


    <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="layoutpractica.css">
  <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">
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
    <div class="row justify-content-around" id="tercero">
        
    <?php  

             $connection = new mysqli("localhost", "tf", "123456", "proyecto");
            $connection->set_charset("utf8");
            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }

        ?>




      <?php if (!isset($_POST["Con"])) : ?>
        <?php
            $query="select * from Pedidos where CodPed=".$_GET['cod'];
            if ($result = $connection->query($query)) {
                while($obj = $result->fetch_object()) {
                
                $cp=$obj->CodPed;
                $ca=$obj->CodArt;
                $cant=$obj->cantidad;
                }
            }
        ?>
        
        <form method="post">
        
        <fieldset>
            <legend>ACTUALIZAR PEDIDO NÚMERO <?php echo $_GET['cod'] ?></legend>
           
            Cantidad : <input type="text" name="Con" value="<?php echo $cant ?>" required><input class="ml-4"type="submit" value="Enviar"><br>
            <br>
            <p></p>
          </fieldset>
         
        </form>

      <?php else:  ?>
      
      <?php 
      $cant1=$_POST['Con'];
      $ped=$_GET['cod'];
      
      $connection = new mysqli("localhost", "tf", "123456", "proyecto");
      $connection->set_charset("utf8");

      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }


      $query="UPDATE Pedidos set cantidad='$cant1' where CodPed='$ped';"; 
        
        if ($result = $connection->query($query)) {
            echo "<div>";
            echo "<h3>ACTUALIZACIÓN DE PEDIDO ".$ped.": </h3>";
            echo "CANTIDAD : ".$cant1."<br>";
            echo "<button type='button' class='btn btn-PRIMARY lista btn-lg'>
            <a href='pedidos-admin.php'>VOLVER</a>
          </button>";
            echo "</div>";
            
            
        }
       
       
       ?>

      <?php endif ?>



    </div>
    </div>
    <?php
      include("includes/footer.html");
      ?>
</body>

</html>
