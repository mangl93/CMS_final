

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
      

    <div class="background container-fluid">
    <div class="row justify-content-center" id="tercero">
    
        <div class="col-md-6">
        
            <div>
            <?php
                     $connection = new mysqli("localhost", "tf", "123456", "proyecto");
                     $connection->set_charset("utf8");
 
                     
                     
                     $query="select u.Nickname as remi ,m.hora_envio as hora,m.Asunto as asu,m.Cuerpo as cue
                     from Mensajes m join Usuarios u on m.Remitente=u.Codusu where CodMen='".$_GET['cod']."';";
                     
                     if ($result = $connection->query($query)) {
                     while($obj = $result->fetch_object()) {
                        
                          echo "<div class='row justify-content-center row1'>";
                            echo "<div class='col-4'>";
                                echo "<img src='iconos/mensaje.png' width='40px'><br>";
                                echo "From : ".$obj->remi;
                                echo "<br>";
                                echo "Fecha : ".$obj->hora;
                            echo "</div>";
                            echo "<div class='col-8 mensaje'>";


                            echo "<div class='card text-white bg-info mb-3' style='max-width: 18rem;'>";
                                echo "<div class='card-header'>".$obj->asu."</div>";
                                echo "<div class='card-body'>";
                                echo "<p class='card-text'>".$obj->cue."</p>";
                                echo "</div>";
                            echo "</div>";


                                
                                

                            echo "</div>";
                           echo "</div>";
                        
                        }}

                        
                     $result->close();
                     unset($obj);
                     unset($connection);
                    


                ?>
                <?php 
                $connection = new mysqli("localhost", "tf", "123456", "proyecto");
                $connection->set_charset("utf8");

             
             
                $query2="update Mensajes set leido=TRUE where CodMen='".$_GET['cod']."';";
             
                if ($result = $connection->query($query2)) {

                   
                    
                }
                
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
