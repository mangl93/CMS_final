

    <!doctype html>


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="index.css">
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
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <div class="container">
    
  <div class="row justify-content-between" id="cabecera">
    
    <?php
    include("../includes/header.html");
    ?>
    
    </div>
      

    <div class="background">
    <div class="row justify-content-center" id="tercero">
        <div class="col-md-6">
            <h1>Mis Mensajes</h1>

        </div>
        <div class="col-md-2 funciones">
            <button class="btn-info" href="nuevo.php">Escribir un mensaje</button>
            <button class="btn-info" >Mensajes enviados</button>
            <button class="btn-info" >Mensajes importantes</button>
        </div>
    </div>

    <?php
      include("../includes/footer.html");
      ?>
    </div>
</body>

</html>
