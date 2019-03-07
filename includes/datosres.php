<?php 
                    
                    $connection = new mysqli("localhost", "tf", "123456", "proyecto");
                    $connection->set_charset("utf8");
                    
                    if ($connection->connect_errno) {
                        printf("Connection failed: %s\n", $connection->connect_error);
                        exit();
                    }

                      $query="select CodRes,fecha,hora,CodPis from Reservas 
                      where CodUsu=".$_SESSION['cod']." order by fecha DESC LIMIT 3;";
                    if ($result = $connection->query($query)) {
                
                        
                        while($obj = $result->fetch_object()) {

                              echo "<ul>";
                              echo "<li>Codigo de Reserva : ".$obj->CodRes."</li>";
                              echo "<li>fecha : ".$obj->fecha."</li>";
                              echo "<li>hora : ".$obj->hora."</li>";
                              echo "<li>Codigo de Pista : ".$obj->CodPis."</li>";
                              
                              
                    
                            echo "</ul>";
                            echo "<hr>"; 
                        }
                    
                    
                        $result->close();
                        unset($obj);
                        unset($connection);
                    
                    } 
                    
                    ?>