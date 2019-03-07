
<?php
    $connection = new mysqli("localhost", "tf", "123456", "proyecto");
    $connection->set_charset("utf8");

    if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $connection->connect_error);
        exit();
    }
   $query="select count(CodMen) as total from Mensajes where Destinatario='".$_SESSION['cod']."' and leido='0';";

    
    if ($result = $connection->query($query)) {

        while($obj = $result->fetch_object()) {
        $mensajes=$obj->total;}}

    ?>