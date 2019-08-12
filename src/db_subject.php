<!DOCTYPE html>
<html>
<head> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 </head>
<body>
<div class="container-fluid">
<?php

/* connect to database */

$dbhost = "acadmysql.duc.auburn.edu";
$dbuser = "szv0034";
$dbpass = "sujasri";
$dbname = "szv0034db";

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

/* query */

$query = "SELECT * FROM db_subject";
$result = mysqli_query($con, $query);

/* fetch result */

if ($result->num_rows > 0) {
    // output data of each row
    echo '<table class="table table-bordered">';
    echo "<thead>";
    echo "<tr>";
    while($field = $result -> fetch_field()){    
         echo "<th> {$field->name} &nbsp</th>";          
    }
    echo "</thead>";
    echo "</tr>";
    echo "<tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
           /* echo "<td> {$row['ShipperID']} </td>";
            echo "<td> {$row['ShipperName']} </td>";  */ 
            foreach ($row as $key => $value) {
                       echo "<td> {$value} </td>";
                   }       
        echo "</tr>";
        echo "<br>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "0 results";
}



?>


 

</div>
</body>
</html>
