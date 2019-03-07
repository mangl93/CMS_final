
            <?php 
                    
              $connection = new mysqli("localhost", "tf", "123456", "proyecto");
              $connection->set_charset("utf8");
 
              if ($connection->connect_errno) {
                  printf("Connection failed: %s\n", $connection->connect_error);
                  exit();
              }
            
                $query="select * from Usuarios where CodUsu=".$_SESSION['cod'];
              if ($result = $connection->query($query)) {
              
         
                  while($obj = $result->fetch_object()) {

               
                        echo "<ul>";
                        echo "<li>Codigo Usuario : ".$obj->CodUsu."</li>";
                        echo "<li>Nombre : ".$obj->Nombre."</li>";
                        echo "<li>Apellidos : ".$obj->Apellidos."</li>";
                        echo "<li>Nickname : ".$obj->Nickname."</li>";
                        echo "<li>Direccion : ".$obj->Direccion."</li>";
                        echo "<li>Email : ".$obj->email."</li>";
                        echo "</ul>";
                        echo "<hr>"; 
                      echo "</div>";


                      
                  }
              
                  $result->close();
                  unset($obj);
                  unset($connection);
              
              } 
              
              ?>