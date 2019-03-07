

    <!doctype html>


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="layoutpractica.css">
  <!-- Bootstrap CSS -->
  <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
          font-size: 18px;
          color: white;
        }
      </style>
    
  <div class="row justify-content-between" id="cabecera">
    
    <?php
    session_start();
        if (!isset($_SESSION['cod'])) {
            header("Location: index.php");
        }
    include("header.php");
    ?>
    
    </div>

    <div class="container-fluid background">
    <div class="row justify-content-around" id="tercero">

      <?php if (!isset($_POST["can"])) : ?>
        <?php
        
            $connection = new mysqli("localhost", "tf", "123456", "proyecto");
            $connection->set_charset("utf8");

            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }
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
            <div class="card">
            <div class="card-header bg-secondary">
            <legend class="mb-3">ACTUALIZAR PEDIDO NÚMERO <?php echo $cp ?> : </legend>
            </div>
            <div class="card-body" style="color:black;">
            Cantidad : <input type="text" name="can"  value="<?php echo $cant ?>" required><br>
            <input type="hidden" name="carticulo" value="<?php echo $ca ?>"><br>

            <p><center><input type="submit" value="Enviar"></center></p>
        </div>
          </fieldset>
         
        </form>

      <?php else:  ?>
      
      <?php 
      $COD=$_SESSION['cod'];
      $cant1=$_POST['can'];

      $ca1=$_POST['carticulo'];
      $ped=$_GET['cod'];
      
      $connection = new mysqli("localhost", "tf", "123456", "proyecto");
      $connection->set_charset("utf8");

      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }


      $query="UPDATE Pedidos set cantidad='$cant1' where CodPed='$ped';"; 
        
        if ($result = $connection->query($query)) {
            header("location: pedidos.php");
            
            
        }
       
       
       ?>

      <?php endif ?>



    </div>

    <?php
      include("includes/footer-admin.html");
      ?>
    </div>
</body>

</html>
