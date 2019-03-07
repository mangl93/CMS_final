

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

    <?php if (!isset($_POST["dest"])) : ?>
    

    <form method="post">

    <div class="container-fluid background">

        <div class="row justify-content-around" id="tercero">
            
            <div class="col-11 mb-3">
                <h1 >Nuevo Mensaje</h1>
            </div>
        


            <div class='col-3'>
                
                Destinatario (Nickname) :<br>  <input type="text" name="dest" value="<?php 
                if(isset($_GET['adm'])) {
                    echo "Administrador";
                }
                ?>" required><br>
                <img src='iconos/mensaje.png' width='100px'>
            </div>
            <div class='col-6 mensaje'>
                <div class='card text-white bg-info mb-3' style='max-width: 18rem;'>
                <div class="card-header">
                <p class='card-text'>
                        ASUNTO<input type="text" name="asun" required>
                

                    </p>
                </div>
                <div class='card-body'>
                    <p class='card-text'>
                        MENSAJE<textarea type="text" name="body" required>    </textarea>

                    </p>
                <center><input type="submit" value="Enviar"></center>
                </div>
            </div>                
            </form>
            <?php else:  ?>
      
      <?php 
      $cod=$_SESSION['cod'];
      $dest=$_POST['dest'];
      $asun=$_POST['asun'];
      $body=$_POST['body'];
      
      $connection = new mysqli("localhost", "tf", "123456", "proyecto");
      $connection->set_charset("utf8");

      //TESTING IF THE CONNECTION WAS RIGHTNombre
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }

      $query2="select CodUsu from Usuarios where Nickname='$dest';";
      
      
      if ($result = $connection->query($query2)) {
        while($obj = $result->fetch_object()) {
            $code1=$obj->CodUsu;
            
        }
        
      }

        $query="insert into Mensajes(Destinatario,Remitente,Asunto,Cuerpo) 
        values ('$code1','$cod','$asun','$body');";
        if ($result = $connection->query($query)) {
            echo "<div class='background'>";
            echo "<div class='row justify-content-around' id='tercero'>";
            echo "<div class='col-6'>";
                echo "MENSAJE ENVIADO";
            echo "</div>";
            echo "<div class='col-2'>";
                echo "<button type='button' class='btn btn-PRIMARY lista btn-lg'>
                <a href='mensajes.php'>VOLVER A MIS MENSAJES</a>
                </button>";  
            
            
        } else {
            echo "<div class='background'>";
            echo "<div class='row justify-content-around' id='tercero'>";
            echo "<div class='col-6'>";
                echo "ERROR";
            echo $query;
            echo "</div>";
            echo "<div class='col-2'>";
                echo "<button type='button' class='btn btn-PRIMARY lista btn-lg'>
                <a href='mensajes.php'>VOLVER A MIS MENSAJES</a>
                </button>";  
        }
 

     
       
       ?>

      <?php endif ?>
            

      </div>    </div>
    <?php
      include("includes/footer-admin.html");
      ?>
    </div>
</body>