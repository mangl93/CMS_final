

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
          font-family: 'Concert One', cursive;
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
        <?php  //CREATING THE CONNECTION

                $connection = new mysqli("localhost", "tf", "123456", "proyecto");
                $connection->set_charset("utf8");

                //TESTING IF THE CONNECTION WAS RIGHT
                if ($connection->connect_errno) {
                    printf("Connection failed: %s\n", $connection->connect_error);
                    exit();
                }

            ?>




            <?php if (!isset($_POST["sel"])) : ?>
            <?php

                //MAKING A SELECT QUERY
                /* Consultas de selección que devuelven un conjunto de resultados */
            
                $query="select * from Mensajes where CodMen=".$_GET['cod'];
                if ($result = $connection->query($query)) {
                    while($obj = $result->fetch_object()) {
                    
                    $cm=$obj->CodMen;
                    
                    }
                }

            ?>

            <form method="post">


                <center>
                <legend>ELIMINAR MENSAJE  : </legend>
            
                ¿ESTÁ SEGURO DE QUE QUIERE ELIMINAR EL MENSAJE? : 
                <style>
                select {
                    border:0px;
                   
                }   
                </style>
                <select name="sel">
                    <option>si</option>
                    <option>no</option>
                </select>
                <br><br>
                <p><input type="submit" value="Enviar"></p></center>

            
            </form>

            <!-- DATA IN $_POST['mail']. Coming from a form submit -->
            <?php else:  ?>

            <?php 

            

            $connection = new mysqli("localhost", "tf", "123456", "proyecto");
            $connection->set_charset("utf8");

            //TESTING IF THE CONNECTION WAS RIGHTNombre
            if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
            }

            if ($_POST['sel']=='si') {

            $query="Delete from Mensajes where CodMen='".$_GET['cod']."';";

            if ($result = $connection->query($query)) {

            echo "<h2>MENSAJE ELIMINADO</h2>";
            echo "</br>";
            echo "<button type='button' class='btn btn-PRIMARY lista btn-lg'>
                <a href='mensajes.php'>VOLVER A MIS MENSAJES</a>
            </button>";    

            }

            } else {
                echo "<button type='button' class='btn btn-PRIMARY lista btn-lg'>
                <a href='mensajes.php'>VOLVER A MIS MENSAJES</a>
            </button>";  
            }

            ?>

            <?php endif ?>
            
        </div> 


    <?php
      include("includes/footer-admin.html");
      ?>

</body>

</html>
