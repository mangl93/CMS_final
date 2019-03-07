 <?php

                //FETCHING OBJECTS FROM THE RESULT SET
                //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
                
                
            $connection = new mysqli("localhost", "tf", "123456", "proyecto");
            $connection->set_charset("utf8");

            //TESTING IF THE CONNECTION WAS RIGHT
            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }

            //MAKING A SELECT QUERY
            /* Consultas de selección que devuelven un conjunto de resultados */

            $query="select * from Usuarios";
            if ($result = $connection->query($query)) {

                

            ?>

                <!-- PRINT THE TABLE AND THE HEADER -->
                <table style="border:1px solid white">
                <thead >
                <tr>
                    <th>CodUsuario</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Direccion</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                    
                    </tr>


                </thead>


                <?php 
                
                while($obj = $result->fetch_object()) {
                    //PRINTING EACH ROW
                    
                    echo "<tr >";
                    echo  "<td align='center'>
                    ".$obj->CodUsu."
                    </td>";
                    echo "<td>".$obj->Nombre."</td>";
                    echo "<td>".$obj->Apellidos."</td>";
                    echo "<td>".$obj->Direccion."</td>";
                    echo "<td>".$obj->email."</td>";
                    echo "<td><a href='../editarusuarios-admin.php?cod=$obj->CodUsu'>
                    <img src='../../iconos/lapiz-ad.png' height='30px' width='30px'></a></td>";
                    echo "<td><a href='../eliminarusuarios-admin.php?cod=$obj->CodUsu'>
                    <img src='../../iconos/delete-ad.png' height='30px' width='30px'></a></td>";
                    

                    echo "</tr>";
                    
                }echo "</table>";

                //Free the result. Avoid High Memory Usages
                $result->close();
                unset($obj);
                unset($connection);

            } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

?>