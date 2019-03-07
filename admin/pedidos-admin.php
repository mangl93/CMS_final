<?php 
session_start();
if ($_SESSION['tipo']!='root') {
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
          background-color: grey;
          color:black;
        }
      </style>
  <div class="row justify-content-between" id="cabecera">
    <?php
    include("header-admin.php");

    
    ?>

    </div>
         
    <div class="container-fluid background">

    <div class="row justify-content-around" id="tercero">
    <div class="card col-10" style="color:black;">

        <?php
    $connection = new mysqli("localhost", "tf", "123456", "proyecto");
    $connection->set_charset("utf8");

    if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $connection->connect_error);
        exit();
    }


    $query="select a.Nombre as nombreart,a.Marca as marcaart,u.Nombre as nombreusu,
    u.Apellidos as apellidosusu,p.CodPed,p.cantidad from Articulos a join Pedidos p on a.CodArt=p.CodArt 
    join Usuarios u on p.CodUsu=u.CodUsu group by p.CodPed";
    if ($result = $connection->query($query)) {

        

    ?>

        <table style="border:1px solid white">
        <thead >
        <tr align='center'>
            <th>Pedido</th>
            <th>Usuario</th>
            <th>Articulo</th>
            <th>Cantidad</th>
            
            <th></th>
            <th></th>
            
            </tr>


        </thead>
        

    <?php

    
    
    while($obj = $result->fetch_object()) {
        
        echo "<tr >";
        echo  "<td align='center'>
        ".$obj->CodPed."
        </td>";
          echo "<td align='center'>".$obj->nombreusu." ".$obj->apellidosusu."</td>";
          echo "<td align='center'>".$obj->nombreart." ".$obj->marcaart."</td>";
          echo "<td align='center'>".$obj->cantidad."</td>";
          echo "<td><a href='eliminarpedidos-admin.php?cod=$obj->CodPed'>
          <i class='fa fa-trash' style='color:red;' aria-hidden='true'></i></a></td>";
          echo "<td><a href='editarpedidos-admin.php?cod=$obj->CodPed'>
          <i class='fa fa-pencil' style='color:blue;' aria-hidden='true'></i></a></td>";
          

        echo "</tr>";
        
    }echo "</table>";

    $result->close();
    unset($obj);
    unset($connection);

} 

?>
      <div class="card-footer">
      <a href="nuevopedido-admin.php"><div class="btn btn-info" >Nuevo Pedido</div></a>


         
        </div>

 
    </body>

</html>