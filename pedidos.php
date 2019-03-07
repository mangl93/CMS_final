

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
          color: black;
        }
      </style>
    
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
        



    <?php
//CREATING THE CONNECTION
$connection = new mysqli("localhost", "tf", "123456", "proyecto");
$connection->set_charset("utf8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}

//MAKING A SELECT QUERY
/* Consultas de selección que devuelven un conjunto de resultados */

  $query="select p.CodUsu,p.CodPed,p.CodArt,p.cantidad,a.file,a.Nombre,a.Marca,a.Precio from Pedidos p 
  join Articulos a on p.CodArt=a.CodArt where p.CodUsu=".$_SESSION['cod'];
if ($result = $connection->query($query)) {

    

?>

    
    
<div class='row justify-content-center ped' >
<?php

    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
    
  
    while($obj = $result->fetch_object()) {
        $id=$obj->CodPed;
        $total=$obj->cantidad*$obj->Precio;
        //PRINTING EACH ROW
        
    

     
        echo "<style>";
        echo ".card {
            margin:5px;
        }";
        echo "</style>";

        echo "<div class='card card1'>";
        echo "<div class='card-header'>";
        echo "<h3>PEDIDO Nº ".$obj->CodPed.":</h3>";
        echo "</div>";
        echo "<div class='card-body'>";
        echo "<ul>";
        echo "<li>Articulo : ".$obj->Nombre."</li>"; 
        echo "<li>Marca : ".$obj->Marca."</li>";
        echo "<li>Cantidad : ".$obj->cantidad." / Precio : ".$obj->Precio." €</li>";
        echo "<li>Precio total del pedido : ".$total." €</li>";
        echo "</ul>";
        echo "<br>";
        echo "<center><img src='$obj->file' width='120px'></center>";
        echo "<div class='card-footer'>";
        echo "<a href='modificarpedidos.php?cod=$id'>
          <button class='btn btn-info mt-1' style='float:left'>Editar</button></a>

          <a href='eliminarpedido.php?cod=$id'>
          <button class='btn btn-danger mt-1' style='float:right'>Cancelar pedido</button></a>
          ";
          echo "<br>";
          echo "</div>";
        echo "</div>";
        echo "</div>";
        
     
        
    }

    //Free the result. Avoid High Memory Usages
    $result->close();
    unset($obj);
    unset($connection);

} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

?>


</div>

</div>


    <?php
      include("includes/footer-admin.html");
      ?>
    </div>
</body>

</html>