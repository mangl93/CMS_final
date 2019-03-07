

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
    <span ><h3>REALIZAR PEDIDO  </h3></span>
    <div class="row justify-content-center" id="tercero">
      
    
          
          
         
          <?php 
                    
                    $connection = new mysqli("localhost", "tf", "123456", "proyecto");
                    $connection->set_charset("utf8");
       
                    if ($connection->connect_errno) {
                        printf("Connection failed: %s\n", $connection->connect_error);
                        exit();
                    }
                  
                      $query="select * from Articulos;";
                    if ($result = $connection->query($query)) {
                    
               
                        while($obj = $result->fetch_object()) {



                            echo "<div class='col-3 mb-3'>";
                            echo "<div class='card' style='color:black;'>";
                            echo "<div class='card-header bg-primary'>";
                            echo $obj->Nombre." ".$obj->Marca;
                            echo "</div>";
                            echo "<div class='card-body'>";
                            echo "<img src=".$obj->file." height='200px'>";
                            echo "</div>";
                            echo "<div class='card-footer'>";
                            echo "<a class='btn btn-info' href='detalles.php?cod=$obj->CodArt'>Detalles</a>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";



                              
      
      
                            
                        }
                    
                        $result->close();
                        unset($obj);
                        unset($connection);
                    
                    } 
                    
                    ?>
    
    </div>

    <?php
      include("includes/footer-admin.html");
      ?>
    </div>
</body>

</html>
