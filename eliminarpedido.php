

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
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
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
        
    <?php  //CREATING THE CONNECTION

             $connection = new mysqli("localhost", "tf", "123456", "proyecto");
            $connection->set_charset("utf8");

            //TESTING IF THE CONNECTION WAS RIGHT
            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }

        ?>




      <?php if (!isset($_POST["Con"])) : ?>
        <?php
        
            //MAKING A SELECT QUERY
            /* Consultas de selección que devuelven un conjunto de resultados */
         
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
            <legend>ACTUALIZAR PEDIDO NÚMERO <?php echo $cp ?> : </legend>
            </div>
            <div class="card-body" style="color:black;">
            Confirme la cancelación del pedido : 
            <input type="hidden" name="Con" value="<?php echo $cp ?>">
            <select name="sel" style="font-size:18px;">
                <option>si</option>
                <option>no</option>
            </select>
            <br>
            <p><center><input type="submit" value="Enviar"></center></p>
            </div>
          </fieldset>
         
        </form>

      <!-- DATA IN $_POST['mail']. Coming from a form submit -->
      <?php else:  ?>
      
      <?php 
      
      $cp=$_POST['Con'];
      
      $connection = new mysqli("localhost", "tf", "123456", "proyecto");
      $connection->set_charset("utf8");

      //TESTING IF THE CONNECTION WAS RIGHTNombre
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }

      if ($_POST['sel']=='si') {
        
        $query="Delete from Pedidos where CodPed='$cp';";

        if ($result = $connection->query($query)) {
        
        header("location: pedidos.php"); 

        }
      
        } else {
            echo "<button type='button' class='btn btn-PRIMARY lista btn-lg'>
            <a href='pedidos.php'>VOLVER A MIS PEDIDOS</a>
          </button>";  
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
