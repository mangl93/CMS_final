<?php 
session_start();
ob_start();

if ($_SESSION['tipo']=='user') {
    session_destroy();
    header ("Location: ../index.php");
} 

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="layoutpractica.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> 
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>  
 
</head>

<body>
    <style>
        body {
          font-family: 'Roboto', sans-serif;
          font-size: 18px;
          color: black;
        }
      </style>
  <div class="row justify-content-between" id="cabecera">
    
    <?php
    include("header-admin.php");
        echo $_SESSION['cod'];
    ?>

    </div>
         
    <div class="container-fluid background">
        <center>

    <div  id="tercero">
    <h3 class='mb-2' style='color:black;'>MENSAJES</h3>
      <div class="row mb-5">
        
      </div>
      <div class="row">
      <div class="col-8">
    <?php 

        $connection = new mysqli("localhost", "tf", "123456", "proyecto");
        $connection->set_charset("utf8");



        if ( isset($_GET['leer'])){
            $mns = $_GET['leer'] ; 
            $query="select Cuerpo,leido,CodMen,asunto ,date_format(hora_envio,'%d %M') as dia from Mensajes 
            where CodMen ='".$mns."'";
            if ($result = $connection->query($query)) {
                while($obj = $result->fetch_object()) {
                    $cod = $obj->CodMen;
                    $campo = $obj->Cuerpo;
                    $asunto = $obj->asunto;
                    $dia = $obj->dia;

                    echo "<div class='card ml-2'  style='color:black;'>";
                    echo "<div class='card-header'>";
                    echo $asunto;
                    echo "</div>";
                    echo "<div class='card-body'>";
                    echo $campo;
                    echo "<br>";
                    echo "</div>";
                    echo "</div>";
                }
            }

        } elseif (isset($_GET['delete'])) {
            $msn = $_GET['delete'];
            $query="delete from Mensajes where CodMen ='".$msn."'";
            echo $query; 
            if ($result = $connection->query($query)) {
                header("location: mensajes-admin.php?mensajes");
            }

        }
        else {
        if ( isset($_GET['mensajes'] )) {
            $query="select leido,CodMen,asunto ,date_format(hora_envio,'%d %M') as dia from Mensajes 
            ;";

        }  
        elseif ( isset($_GET['buzon'] )) {
            $query="select leido,CodMen,asunto ,date_format(hora_envio,'%d %M') as dia from Mensajes 
            where Destinatario = '".$_SESSION['cod']."';";
    
        }
        

        if ($result = $connection->query($query)) {
            while($obj = $result->fetch_object()) {
                $cod = $obj->CodMen;
                $asunto = $obj->asunto;
                $dia = $obj->dia;
                echo "<div class='row m-2'>";
                echo "<div class='col-2'><button class='btn btn-dark'>".$cod."</button></div>";
                echo "<div class='card col-6' style='color:black;'>";
                echo "<a href='mensajes-admin.php?leer=".$cod."'><div class='mt-1 text-uppercase'> ".$asunto.", fecha : ".$dia."</div></a>";
                echo "</div>";
                echo "<a href='mensajes-admin.php?delete=".$cod."'><div class='col-2'><button class='btn'><i class='fa fa-trash'  
                style='color:red;'aria-hidden='true'></i></button></div>";
                echo "</div>";
            }
           
        }
    }
    
    ?>
    </div>
    <div class="col-2">
        <div class="col-2 "><a href="mensajes-admin.php?mensajes"><button class="btn btn-info mb-1">Todos</button></a></div>
        <div class="col-2 "><a href="mensajes-admin.php?buzon"><button class="btn btn-info mb-1">Buzon</button></a></div>
    </div>
    </div>
    </div>
    </div>

 
    <?php
        ob_end_flush();
    ?>


    </body>

</html>