

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
    <div class="row justify-content-center" id="tercero">
        <div class="col-md-6">
            <h1>MENSAJES ENVIADOS</h1>
            <div>
            <?php
                     $connection = new mysqli("localhost", "tf", "123456", "proyecto");
                     $connection->set_charset("utf8");
 
                     
 
                     $query="select * from Mensajes where Remitente='".$_SESSION['cod']."';";
                     
                     if ($result = $connection->query($query)) {
                        $total=0;
                     while($obj = $result->fetch_object()) {
                          $cod=$obj->CodMen;
                         
                          echo "<div class='row justify-content-center mt-2'>";
                            echo "<div class='col-2'>";
                                
                            $total++;
                          
                                echo "<img src='iconos/mensaje.png' width='40px'> ".$total;
                                
                            echo "</div>";
                            echo "<div class='col-9'>";
                                echo "<button type='button' class='btn btn-info btn-block' ><a style='color:black' href='leer1.php?cod=$cod'>"
                                .$obj->Asunto."</a > ".$obj->hora_envio."</button>";
                                
                            echo "</div>";
                           echo "</div>";
                           
                        }
                    
                    }
                     $result->close();
                     unset($obj);
                     unset($connection);
                    


                ?>
            </div>
        </div>
        <?php 
            include("botones.mensajes.php");
        ?>
    </div>

    <?php
      include("includes/footer-admin.html");
      ?>
    </div>
</body>

</html>
