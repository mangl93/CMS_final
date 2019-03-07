

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
        <div >
        <form action="disponibilidad.php" method="post">
          <div>
          <center><span><h3 class="mb-3">CONSULTAR DISPONIBILIDAD<br>(HORAS EXACTAS)</h3></span>
          
         
          <span>Fecha : </span><input class="mb-3" type="date" name="fecha1" required><br>
          <span>Hora : </span><input type="time" min="10:00" max="21:00" name="hora1" required><br></center>
          <br>
      </div>
          <div>
          <style>
       .button {
        -webkit-transition-duration: 0.4s; 
        transition-duration: 0.4s;
        cursor:pointer;
        
      }

      .button:hover {
        background-color: grey; 
        color: white;
        border: 2px solid white;
      }
      </style>


        <?php 
            $connection = new mysqli("localhost", "tf", "123456", "proyecto");
            $connection->set_charset("utf8");

            //TESTING IF THE CONNECTION WAS RIGHT
            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }

            $query="select * from Pistas";
                if ($result = $connection->query($query)) {
                    while($obj = $result->fetch_object()) {
                        echo "<button class='button ml-3 mr-3' type='submit' name='img' value='".$obj->CodPis."'  >";
                            echo "<h4>".$obj->tipo."</h4>";
                            echo "<img src='$obj->file' height='100px'>";
                        echo "</button>";
                    
                    }
                }

                
            

        
        ?>
         
  
            </div>
      </form>
      <br>
      <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar"
            aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" style="width:35%">
                Consultar
            </div>
        </div>
        </div>
        
    </div>
    <?php
      include("includes/footer-admin.html");
      ?>
        </div>

</body>

</html>

  </div>
  