<!doctype html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="layoutpractica.css">
  <!-- Bootstrap CSS -->
  <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
    <style>
        body {
          font-family: 'Staatliches', serif;
          font-size: 20px;
          background-color: grey;
        }
      </style>

 
  <div class="row justify-content-between" id="cabecera">
    
    <?php
    include("includes/header.html");
    session_start();
    ?>
    
    </div>

    <div class="container-fluid background">
    <div class="row justify-content-around" id="tercero">
        <div >
        <form action="reservar.php" method="post">
          <div>
          <center><span><h3>HACER RESERVA</h3></span>
          
         
          <span>Fecha : </span><input type="date" name="fecha1" required><br>
          <span>Hora : </span><input type="time" name="hora1" required><br></center>
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
          <button class="button" type="submit" name="img" value="3"  >
            <h4>TENIS</h4>  
            <img  src="iconos/tenis.png" width="100">
        </button>
        <button class="button" type="submit" name="img" value="2" >
            <h4>FÚTBOL</h4>  
            <img src="iconos/futbol.png" alt="SomeAlternateText" width="100">
        </button>
        <button class="button" type="submit" name="img" value="6" >
            <h4>PADEL</h4>    
            <img src="iconos/padel.png" alt="SomeAlternateText" width="97">
        </button>
        <button class="button" type="submit" name="img" value="6" >
            <h4>BASKET</h4>    
            <img src="iconos/baloncesto.png" alt="SomeAlternateText" width="97">
        </button>
        <button class="button" type="submit" name="img" value="2" >
            <h4>FÚTBOL SALA</h4>  
            <img src="iconos/futbol.png" alt="SomeAlternateText" width="100">
        </button>
        </div>
        <br>
        <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar"
            aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" style="width:35%">
                Consultar
            </div>
        </div>
        
      </form>
        </div>
    </div>
    </div>
    <?php
      include("includes/footer.html");
      ?>
</body>

</html>
