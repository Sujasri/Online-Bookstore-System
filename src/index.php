<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    .form-group   
  </style>
 </head>
<body>



<div class="container-fluid">
  <ul class="nav nav-tabs" id="myTabs">
    <li><a><strong>Online Bookstore System</strong></a> </li>
    <li class="active"><a href="#db_book" data-url="db_book.php">db_book</a></li>
    <li><a href="#db_customer" data-url="db_customer.php">db_customer</a></li>
    <li><a href="#db_employee" data-url="db_employee.php">db_employee</a></li>
    <li><a href="#db_order" data-url="db_order.php">db_order</a></li>
    <li><a href="#db_order_detail" data-url="db_order_detail.php">db_order_detail</a></li>
    <li><a href="#db_shipper" data-url="db_shipper.php">db_shipper</a></li>
    <li><a href="#db_subject" data-url="db_subject.php">db_subject</a></li>
    <li><a href="#db_supplier" data-url="db_supplier.php">db_supplier</a></li>
  </ul>
  
  <div class="tab-content">
    <div class="tab-pane active" id="db_book">This is the home pane...</div>
    <div class="tab-pane" id="db_customer"></div>
    <div class="tab-pane" id="db_employee"></div>
    <div class="tab-pane" id="db_order"></div>
    <div class="tab-pane" id="db_order_detail"></div>
    <div class="tab-pane" id="db_shipper"></div>
    <div class="tab-pane" id="db_subject"></div>
    <div class="tab-pane" id="db_supplier"></div>
  </div>


<script>
	$('#myTabs a').click(function (e) {
	e.preventDefault();
  
	var url = $(this).attr("data-url");
  	var href = this.hash;
  	var pane = $(this);
	
	// ajax load from data-url
	$(href).load(url,function(result){      
	    pane.tab('show');
	});
});

	// load first tab content
	$('#db_book').load($('.active a').attr("data-url"),function(result){
	  $('.active a').tab('show');
	});

</script>
<form action="index.php" method="POST">
  <div class="form-group">
    <input type="text" name="input_text" class="form-control input-lg" id="inputlg">    
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php
 /* connect to database */

$dbhost = "acadmysql.duc.auburn.edu";
$dbuser = "szv0034";
$dbpass = "sujasri";
$dbname = "szv0034db";

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

/* query */
if (isset($_POST["input_text"])) {
  $query = $_POST["input_text"];
}
$query = stripslashes($query);
$if_drop = explode(" ", ltrim($query));
if (strtolower($if_drop[0]) != "drop") {
  $result = mysqli_query($con, $query);  
  if ($result){
    if ($result->num_rows > 0) {
      // output data of each row
      echo "The executed table is :";
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
        foreach ($row as $key => $value) {
          echo "<td> {$value} </td>";
        }       
        echo "</tr>";
        echo "<br>";
      }
      echo "</tbody>";
      echo "</table>";
    } 
    else {
      echo "0 results";
    }
  }
  else {
    echo mysqli_error($con);
  }
}
else {
  echo "Drop cannot be executed";
}

?>

</div>
</body>
</html>