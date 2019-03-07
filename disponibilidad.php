

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
    
 
        $_SESSION['fecha']=$_POST['fecha1'];
        $_SESSION['hora']=$_POST['hora1'];
        $_SESSION['pista']=$_POST['img'];
        $fecha2=$_POST['hora1'];
        $horan=$_SESSION['hora'][0];
        $horan1=$_SESSION['hora'][1];

        function hora($a,$b) {
            $c=$a.$b;
            return $c;
        }
        

        

        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();

            } 

        
        
            $connection = new mysqli("localhost", "tf", "123456", "proyecto");
            $connection->set_charset("utf8");

            $contador=0;
            $contador1=0;
            echo "<style>";
            echo ".disp{
                border: 3px dotted black;
                margin: 5px;
                padding: 5px;
            }";
            echo "</style>";
            echo "<div class='disp'>";
                echo "<center><h3>CONSULTAR DISPONIBILIDAD EL DIA ".$_SESSION['fecha']." </h3>";
                echo "<h3>PISTA NUMERO ".$_SESSION['pista'];
                echo "<br><br>";
                echo "<button type='button' class='btn btn-success lista btn-lg '>DISPONIBLE</button>
                <button type='button' class='btn btn-danger lista btn-lg'>RESERVADO</button>
                </h3></center>";
            echo "</div>";


            $hora3=hora($_SESSION['hora'][0],$_SESSION['hora'][1]);
            $hora3=$hora3.":00";


            echo "<br>";
            echo "<fieldset>";
            
            echo "<center><h1>A LAS ".$hora3." ";
            $query="
                select CodRes from Reservas where CodPis='".$_SESSION['pista']."'
                and fecha='".$_SESSION['fecha']."' and hora='".$hora3."';
                ";
                
                
                if ($result = $connection->query($query)) {
                    
                    if ($result->num_rows==1) {
                       
                            
                            echo "<button type='button' class='btn btn-danger lista btn-lg '>RESERVADO</button>";
                         }
                        
                        
                    } 
                    
                    if ($result->num_rows==0) {
                        
                        echo "<button type='button'  class='btn btn-success lista btn-lg '><a href='reservar.php?hora=$hora3' style='color:#F0FFFF;'>RESERVAR!</a></button>";
                    }
            echo "</h1></center>";
            echo "</fieldset>";
            echo "<br>";
            echo "<fieldset class='fieldset1'>";
            echo "Podría reservar : ";
            echo "<center>";
            echo "<legend>ANTES : </legend>";
            while ($contador1 < 3) {
                
                
                $hora3=$hora3-1;
                $hora3=$hora3.":00";
                
                
                $query="
                select CodRes from Reservas where CodPis='".$_SESSION['pista']."'
                and fecha='".$_SESSION['fecha']."' and hora='".$hora3."';
                ";
                
                
                if ($result = $connection->query($query)) {
                    
                    if ($result->num_rows==1) {
                       
                            
                            echo "<button type='button' class='btn btn-danger lista btn-lg ml-3 mr-3'>".$hora3."</button>";
                         }
                        
                        
                    } 
                    
                    if ($result->num_rows==0) {
                        
                        echo "<button type='button' class='btn btn-success lista btn-lg ml-3 mr-3'><a href='reservar.php?hora=$hora3' style='color:#F0FFFF;'>".$hora3."</a></button>";
                    }
               
                $contador1=$contador1+1; 
                
            }
            $hora3=$_POST['hora1'];
            
            echo "</fieldset>";
            echo "<br>";echo "<br>";
            
            echo "<fieldset>";
            echo "<center>";
            echo "<legend>DESPUÉS : </legend>";

            while ($contador < 3) {
                $hora3=$hora3+1;
                $hora3=$hora3.":00";
                $query="
                select CodRes from Reservas where CodPis='".$_SESSION['pista']."'
                and fecha='".$_SESSION['fecha']."' and hora='".$hora3."';
                ";
                
                if ($result = $connection->query($query)) {
                    
                    if ($result->num_rows==0) {
                        if (hora($hora3[0],$hora3[1])=='24') {
                            $hora3[0]=0;
                            $hora3[1]=0;
                            echo "<button type='button' class='btn btn-success lista btn-lg ml-3 mr-3'><a href='reservar.php?hora=$hora3' style='color:#F0FFFF;'>".$hora3."</a></button>";
                        } else {
                            echo "<button type='button' class='btn btn-success lista btn-lg ml-3 mr-3'><a href='reservar.php?hora=$hora3' style='color:#F0FFFF;'>".$hora3."</a></button>";
                        }
                        
                        
                    } else {
                        
                        echo "<button type='button' class='btn btn-danger lista btn-lg'>".$hora3."</button>";
                    }
                } 

               
                $contador=$contador+1; 
            }
            echo "</center>";
            echo "</fieldset>";
            echo "<br>";
                echo "<div class='progress '>";
                        echo "<div class='progress-bar progress-bar-striped active' role='progressbar'
                        aria-valuenow='70' aria-valuemin='0' aria-valuemax='100' style='width:70%'>";
                        echo "Consultar";
                        echo "</div>";
                echo "</div>";
                echo "<br>";
                
            ?>
            <?php 
            $result->close();
            unset($obj);
            unset($connection);
            ?>

        </fieldset>
      </form>
        </div>
    </div>

    <?php
      include("includes/footer-admin.html");
      ?>
    </div>
</body>

</html>

