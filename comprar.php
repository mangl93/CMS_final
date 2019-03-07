<!doctype html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="layoutpractica.css">
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
    <div class="row justify-content-center" id="tercero">
      
    
          
          
         
          


    <?php if (!isset($_POST["img"])) : ?>
    <form method="post">
    <?php 
                    
                    $connection = new mysqli("localhost", "tf", "123456", "proyecto");
                    $connection->set_charset("utf8");
       
                    if ($connection->connect_errno) {
                        printf("Connection failed: %s\n", $connection->connect_error);
                        exit();
                    }
                  
                      $query="select * from Articulos where CodArt=".$_GET['cod'].";";
                    if ($result = $connection->query($query)) {
                    
               
                        while($obj = $result->fetch_object()) {
                            $Nombre = $obj->Nombre;
                            $Marca = $obj->Marca;
                            $codigo = $obj->CodArt;
                            $file = $obj->file;
                        }
                    
                        $result->close();
                        unset($obj);
                        unset($connection);
                    
                    } 
                    
                    ?>
        <div class="card" style="color:black;">
        <h3><?php echo $Nombre; echo " "; echo $Marca; ?></h3>
        <center><img class="rounded m-5" src="<?php echo $file; ?>" width="200px"></center><br>
        <input class="input" type="number" name="cantidad" placeholder="cantidad" required><br>
        <button class="button" type="submit" name="img" value="<?php echo $codigo ;?>">Confirmar compra</button>

                </div>
    </form>

    <!-- DATA IN $_POST['mail']. Coming from a form submit -->
    <?php else: ?>

    <?php

            
                    $connection = new mysqli("localhost", "tf", "123456", "proyecto");
                    $connection->set_charset("utf8");



                    if ($connection->connect_errno) {
                    printf("Connection failed: %s\n", $connection->connect_error);
                    exit();
                    }

                
                      
                        $query="INSERT INTO Pedidos(CodUsu,CodArt,cantidad) VALUES ('".$_SESSION['cod']."','".$_POST['img']."'
                        ,'".$_POST['cantidad']."');";
            
                        
                        
                        if ($result = $connection->query($query)) {
                            header("location: pedidos.php");
                            
                        } else {
                            echo "ERROR";
                            echo $_POST['cantidad'];
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
