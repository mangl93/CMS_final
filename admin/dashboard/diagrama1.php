<?php
            /* Include the `fusioncharts.php` file that contains functions  to embed the charts. */

            

            /* The following 4 code lines contain the database connection information. Alternatively, you can move these code lines to a separate file and include the file here. You can also modify this code based on your database connection. */
            
            $connection = new mysqli("localhost", "tf", "123456", "proyecto");
            $connection->set_charset("utf8");
            
            //TESTING IF THE CONNECTION WAS RIGHT
            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }
                // Form the SQL query that returns the top 10 most populous countries
                $query = "select count(*) as total,monthname(fecha) as mes from Reservas GROUP BY month(fecha);";

                // Execute the query, or else return the error message.
                $result = $connection->query($query) or exit("Error code ({$connection->errno}): {$connection->error}");

                // If the query returns a valid response, prepare the JSON string
                if ($result) {
                    // The `$arrData` array holds the chart attributes and data
                    $arrData = array(
                        "chart" => array(
                            "caption" => "RESERVAS[2018-2019]",
                            "showValues" => "0",
                            "theme" => "carbon"
                            )
                        );

                    $arrData["data"] = array();

            // Push the data into the array
                    while($row = mysqli_fetch_array($result)) {
                        array_push($arrData["data"], array(
                            "label" => $row["mes"],
                            "value" => $row["total"]
                            )
                        );
                    }

                    /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

                    $jsonEncodedData = json_encode($arrData);

            /*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

                    $columnChart = new FusionCharts("spline", "myFirstChart" , 400, 330, "chart-1", "json", $jsonEncodedData);

                    // Render the chart
                    $columnChart->render();

                    // Close the database connection
                    $connection->close();
                }
                ?>