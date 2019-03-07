

    <!doctype html>
    <html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="index.css">
  <link rel="shortcut icon" href="iconos/logo.png" />
  <!-- Bootstrap CSS -->
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
    
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            font-size: 25px;
            background-color: black;
        }
      </style>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <div class="container-fluid">
  <?php
    session_start();
    ?>
      <div class="row justify-content-between header">
        <div class="col-5 ml-4">
            <div class="row">
            <div class="col-6 icono">
              <img src="iconos/logo.png" width="100px">
            </div>
            
        </div>
        </div>
        
   
        <div class="col-md-4 col-sm-6 mt-3 botones">
            <!-- Trigger the modal with a button -->
                <button type="button" class="btn  btn-outline-warning btn-md" id="login" data-toggle="modal" data-target="#myModal">INGRESAR</button>
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header" >
                        <img src="iconos/reloj.png" width="45px">  
                        <h4 class="modal-title">INGRESO</h4>
                    </div>
                    <div class="modal-body" style="color:black;">
                        <div class="login1">
                        <?php if (!isset($_POST["mail"])) : ?>
                    <form method="post">
                    
                        
                        
                        <input type="email" name="mail" placeholder="Email *" required><br>
                        <input type="password" name="pass" placeholder="Password *" required><br>
                        <p><input class="sub" type="submit" value="Send"></p>
        
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
                                    $_SESSION['cod']=$id;
                                    $_SESSION['tipo']=$tipo;
                                    }
                                    
                                    if ($passwd==md5($_POST['pass'])) {
                                        header("Location: principal.php");
                                        
                                        
                                        if ($tipo=='root') {
                                            header("Location: ./admin/dashboard/dashboard.php");
                                        }
                                    } else {
                                        echo $passwd;
                                        echo "<br>";
                                        echo md5($_POST['pass']);
                                        
                                        
                                    }
                                    

                                } }
                                
                                
                            ?>

                            <?php endif ?>


                        </div>
                        <div class="login2">
                            <img src="iconos/login2.png" width="100px">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div>
               
                <button type="button" class="btn-warning" data-toggle="modal" data-target="#myModal1">REGISTRARSE</button>
                <!-- Modal -->
                <div id="myModal1" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header" style="color:black;">
                        <img src="iconos/reloj.png" width="45px">  
                        <h4 class="modal-title">REGISTRO</h4>
                    </div>
                    <div class="modal-body" style="color:black;">
                      
                  <?php if (!isset($_POST["mail"])) : ?>
                    <form method="post">
                      <div id="prueba" >
                        CREAR CUENTA:<br>
                        
                        <input type="text" name="Nombre" placeholder="Nombre *" required><br>
                        <input type="text" name="Apellidos" placeholder="Apellidos usuario *" required><br>
                        <input type="text" name="Direccion" placeholder="Direccion usuario *" required><br>
                        <input type="password" name="pass" placeholder="Contraseña (5 digitos)*" required><br>
                        <input type="password" name="pass1" placeholder="Repita Contraseña *" required><br>
                        <input type="email" name="mail" placeholder="Email *" required><br>
                        <input type="text" name="Nickname" placeholder="Nickname *" required><br>
                       <p> <input type="submit" class="sub" value="Send"></p>
                      </div>
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

                    if ( $_POST['pass'] == $_POST['pass1']) {
                      $query="INSERT INTO Usuarios(Nombre,Apellidos,Direccion,pass,email,Nickname,tipo) values 
                    ('".$_POST['Nombre']."','".$_POST['Apellidos']."'
                    ,'".$_POST['Direccion']."',md5('".$_POST['pass']."'),'".$_POST['mail']."','".$_POST['Nickname']."','user');";
                    
                    
                    if ($result = $connection->query($query)) {
                        $last_id = $connection->insert_id;
                        $_SESSION['cod']=$last_id;
                        $_SESSION['tipo']='user';
                        header("Location: principal.php");
                        
                        
                    } else {
                        echo "Ha habido algun error";
                        echo $query;
                    } 
                    }else {

                      echo "LAS CONTRASEÑAS NO COINCIDEN";
                    } 
                    
                     
                        
                        
                    ?>

                  <?php endif ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div>

                
    </div>
                </div>  
                <hr>
                <div class="row">
	<div class="col-sm-12 col-md-6 col-lg-6  py-0 pl-3 pr-1 featcard">
	   <div id="featured" class="carousel slide carousel-fade" data-ride="carousel">
 		 <div class="carousel-inner">
            <div class="carousel-item active">			  
                <div class="card bg-dark text-white">
		        <img class="card-img img-fluid"  src="fotos/tenis2.jpeg" alt="">
		        <div class="card-img-overlay d-flex linkfeat">
		          <a class="align-self-end">
		        	<span class="badge">Pistas de tenis</span> 
		           
		          </a>
		        </div>
		      </div>
	  		</div>
	  	<div class="carousel-item">			  
              <div class="card bg-dark text-white">
		        <img class="card-img img-fluid" src="fotos/fsala2.jpeg" alt="">
		        <div class="card-img-overlay d-flex linkfeat">
		          <a class="align-self-end">
		        	<span class="badge">Pistas de futbol sala</span> 
		           
		          </a>
		        </div>
		      </div>
	  		</div>
	  	<div class="carousel-item">			  
              <div class="card bg-dark text-white">
		        <img class="card-img img-fluid" src="fotos/tenis3.jpeg" alt="">
		        <div class="card-img-overlay d-flex linkfeat">
		          <a class="align-self-end">
		        	<span class="badge">Pistas de padel</span> 
		            
		        </div>
		      </div>
	  		</div>
	  	
	  	<div class="carousel-item">			  
              <div class="card bg-dark text-white">
		        <img class="card-img img-fluid" src="fotos/baloncesto.jpg" alt="">
		        <div class="card-img-overlay d-flex linkfeat">
		          <a class="align-self-end">
		        	<span class="badge">Pistas de baloncesto</span> 
		            
		        </div>
		      </div>
	  		</div>
	  	  </div>
	  </div>
	</div>
	<div class="col-6 py-0 px-1 d-none d-lg-block">
		<div class="row">
			<div class="col-6 pb-2 mg-1	">
				<div class="card bg-dark text-white">
		        <img class="card-img img-fluid" src="fotos/fsala.jpg" alt="">
		        <div class="card-img-overlay d-flex">
		          <a class="align-self-end">
		        	<span class="badge">F.Sala</span> 
		          </a>
		        </div>
		      	</div>
			</div>
						<div class="col-6 pb-2 mg-2	">
				<div class="card bg-dark text-white">
		        <img class="card-img img-fluid"  src="fotos/baloncesto.jpg" alt="">
		        <div class="card-img-overlay d-flex">
		          <a class="align-self-end">
		        	<span class="badge">Baloncesto</span> 
		          </a>
		        </div>
		      	</div>
			</div>
						<div class="col-6 pb-2 mg-3	">
				<div class="card bg-dark text-white">
		        <img class="card-img img-fluid"  src="fotos/padel.jpg" alt="">
		        <div class="card-img-overlay d-flex">
		          <a class="align-self-end">
		        	<span class="badge">Padel</span> 
		          </a>
		        </div>
		      	</div>
			</div>
						<div class="col-6 pb-2 mg-4	">
				<div class="card bg-dark text-white">
		        <img class="card-img img-fluid" src="fotos/descarga.jpeg"  alt="">
		        <div class="card-img-overlay d-flex">
		          <a class="align-self-end">
		        	<span class="badge">Tenis</span> 
		           
		          </a>
		        </div>
		      	</div>
			</div>
					</div>
    </div>
                </div>
                
                <div class="row justify-content-center precio">
                <div class="col-md-4">
                <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col"></th>
                            <th scope="col">Precio</th>
                            <th scope="col">Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                     $connection = new mysqli("localhost", "tf", "123456", "proyecto");
                     $connection->set_charset("utf8");
 
 
 
                     if ($connection->connect_errno) {
                     printf("Connection failed: %s\n", $connection->connect_error);
                     exit();
                     }
                     $query = "select * from Pistas";
                     if ($result = $connection->query($query)) {
                        while($obj = $result->fetch_object()) {
                            $tipo = $obj->tipo;
                            $precio = $obj->Precio;
                            $descripcion = $obj->Descripcion;

                            
                            echo "<tr>
                            <th scope = 'row'>".$tipo."
                            <td>".$precio."</td>
                            <td>".$descripcion."</td>
                            </tr>";
                            

                        }
                     }

                ?>
                            
                        </tbody>
                        </table>
                    </div>
                    <div class="col-md-4 col-sm-9 info">
                        
                    <div class="letras">
                       
                        
                        <div class="jumbotron"> 
                            <h1 class="display-5">PRECIOS</h1>
                            
                        </div>
                        <hr class="my-4">
                        <p>Software de deportes gratuito para ayuntamientos, clubes y gimnasios.</p>
                    </div>
                    </div>
                </div>
                


                    <div class="row justify-content-between footer">
                      <div class="col-md-4">
                      
                      </div>
                    </div>
                    
                </div>
                

                
      
            
        <div>
        <script src="header.js">
        //FEATURED HOVER
       
        
        </script>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </div>
    
    </body>
    </html>