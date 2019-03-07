

    <!doctype html>


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="layoutpractica.css">
  <!-- Bootstrap CSS -->
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
        <div>
        <form action="reservar.php" method="post">
        <fieldset>
        
        <?php
                    
                    $fecha2=$_GET['hora'];

                
                



                    if ($connection->connect_errno) {
                    printf("Connection failed: %s\n", $connection->connect_error);
                    exit();

                    } 

                
                
                    $connection = new mysqli("localhost", "tf", "123456", "proyecto");
                    $connection->set_charset("utf8");



                    $query="
                        select CodRes from Reservas where CodPis='".$_SESSION['pista']."'
                        and fecha='".$_SESSION['fecha']."' and hora='".$_GET['hora']."';
                    ";
                
                    if ($result = $connection->query($query)) {
                        while($obj = $result->fetch_object()) {
                            $codigo=$obj->CodRes;
                            
                            
                        }
                    
                    }

                    if ($result->num_rows==0) {

                    if ( ($fecha2[3]=='0') && ($fecha2[4]=='0') ) {


                    $query="INSERT INTO Reservas(CodUsu,CodPis,fecha,hora) VALUES ('".$_SESSION['cod']."','".$_SESSION['pista']."'
                    ,'".$_SESSION['fecha']."','".$_GET['hora']."');";
                    
                    
                            
                        if ($result = $connection->query($query)) {
                            
                            echo "<div>";
                            echo "Confirmación de la reserva : </br>";   
                            echo "El Usuario con codigo nº ".$_SESSION['cod']." ha reservado la pista con código nº ".$_SESSION['pista'].
                            "</br> el día ".$_SESSION['fecha']." a las ".$_GET['hora'];
                            echo "</div>";
                            echo "<div>";
                            echo "<center><img src='iconos/success.png'>";
                            echo "</div>";
                            echo "<br>";
                            echo "<div class='progress '>";
                                    echo "<div class='progress-bar progress-bar-striped active' role='progressbar'
                                    aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width:100%'>";
                                    echo "Reservar";
                                    echo "</div>";
                            echo "</div>";
                            echo "<br>";
                            echo "</center>";
                            echo "<center>";
                            echo "<button type='button' class='btn btn-PRIMARY lista btn-lg'>
                                <a href='principal.php'>VOLVER A LA PÁGINA PRINCIPAL</a>
                            </button></center>";
                            $_SESSION['fecha']="";
                            $_SESSION['hora']="";
                            $_SESSION['pista']="";
                                
                        } else {
                            echo "Ha habido algun error";
                            echo $query;
                            
                        }
                        } else {
                            echo "Debe introducir una hora exacta o <br>";
                            echo "dentro del horario (10:00-21:00).";
                            
                        }

                    
                    } else {echo "Esta hora ya está reservada";}



                    ?>


           

        </fieldset>
      </form>
        </div>
    </div>
    </div>
    <?php
      include("admin/footer-admin.html");
      ?>
</body>

</html>
