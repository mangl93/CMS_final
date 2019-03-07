<!doctype html>
<html lang="en">

<head>
<link rel="stylesheet" type="text/css" href="index.css">

  <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
  

  <title>Hello, world!</title>
</head>


<body>
<style>
         input {
          font-family: 'Staatliches', serif;
          font-size: 20px;
        
        }
        
      </style>

            <?php if (!isset($_POST["mail"])) : ?>
              <form method="post">
             
                  
                  
                  <input type="email" name="mail" placeholder="email *" required><br>
                  <input type="password" name="pass" placeholder="password *" required><br>
                  <p><input style="margin-top:10px"type="submit" value="Send"></p>
  
              </form>

            <!-- DATA IN $_POST['mail']. Coming from a form submit -->
            <?php else: ?>

              <?php

      
              $connection = new mysqli("localhost", "tf", "123456", "proyecto");
              $connection->set_charset("utf8");



              if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
              }


              $query="SELECT CodUsu,pass,tipo from Usuarios where email like '%".$_POST["mail"]."'";

                
              if ($result = $connection->query($query)) {

                  if ($result->num_rows==0) {
                      echo "ERROR";
                      
                  } else { 
                      while($obj = $result->fetch_object()) {
                      $passwd=$obj->pass;
                      $id=$obj->CodUsu;
                      $tipo=$obj->tipo;
                      session_start();
                      $_SESSION['cod']=$id;
                      $_SESSION['tipo']=$tipo;
                    }
                      if ($passwd==$_POST['pass']) {
                          echo "DATOS CORRECTOS<br>";
                          echo "<img src='iconos/success.png'>";
                          echo "<a href='principal.php'>Ir al inicio.</a>";
                          echo "<h3>CODIGO DE SESION : ".$_SESSION['cod']."</h3>";
                          if ($tipo=='root') {
                            header("Location: ./admin/principal-admin.php");
                          }
                      } else {
                        echo $passwd;
                        echo "<br>";
                        echo $tipo;
                      }
                    

                  } }
                  
                  
              ?>

            <?php endif ?>
            <div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      </div>
    </div>
    </body>
    </html>