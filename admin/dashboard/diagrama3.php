<?php
            $connection = new mysqli("localhost", "tf", "123456", "proyecto");
            $connection->set_charset("utf8");
            
            //TESTING IF THE CONNECTION WAS RIGHT
            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }
            $query = "select Nombre,Apellidos,count(CodPed) total from Pedidos p join Usuarios u on p.CodUsu=u.CodUsu group by u.CodUsu;";

            // Execute the query, or else return the error message.
            $result = $connection->query($query) or exit("Error code ({$connection->errno}): {$connection->error}");

            // If the query returns a valid response, prepare the JSON string
            if ($result) {
                // The `$arrData` array holds the chart attributes and data
                $arrData2 = array(
                    "chart" => array(
                        "caption" => "PEDIDOS[2018-2019]",
                        "showValues" => "0",
                        "theme" => "candy"
                        )
                    );

                $arrData2["data"] = array();

        // Push the data into the array
                while($row = mysqli_fetch_array($result)) {
                    array_push($arrData2["data"], array(
                        "label" => $row["Nombre"]." ".$row["Apellidos"],
                        "value" => $row["total"]
                        )
                    );
                }

                /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

                $jsonEncodedData = json_encode($arrData2);

        /*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

                $columnChart = new FusionCharts("pie2d", "myFirstChart2" , 520, 530, "chart-3", "json", $jsonEncodedData);

                // Render the chart
                $columnChart->render();

                // Close the database connection
                $connection->close();
            }
            ?>