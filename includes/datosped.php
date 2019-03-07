<?php 

                        $connection = new mysqli("localhost", "tf", "123456", "proyecto");
                        $connection->set_charset("utf8");
 
                        if ($connection->connect_errno) {
                            printf("Connection failed: %s\n", $connection->connect_error);
                            exit();
                        }
                        
                      
                        $query="select p.CodPed,p.cantidad,a.Nombre,a.Marca,a.Precio 
                        from Pedidos p join Articulos a on p.CodArt=a.CodArt
                        where CodUsu=".$_SESSION['cod'];
                        if ($result = $connection->query($query)) {
                            

                            while($obj = $result->fetch_object()) {
                            

                                echo "<ul>";
                                echo "<li>Producto : ".$obj->Nombre." (".$obj->cantidad.")</li>";
                                echo "<li>Precio total : ".$obj->Precio*$obj->cantidad." €</li>";
                                
                                
                        
                                echo "</ul>";
                                echo "<hr>";

                            }
                        
                            
                            $result->close();
                            unset($obj);
                            unset($connection);
                        
                        } 
                        
                        ?>