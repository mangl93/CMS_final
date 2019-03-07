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
    
    $query="select count(CodMen) as total from Mensajes;";
    if ($result = $connection->query($query)) {

        while($obj = $result->fetch_object()) {
        $mensajes=$obj->total;}}

    ?>