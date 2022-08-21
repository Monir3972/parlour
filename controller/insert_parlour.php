<?php 
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		include('../db.php');
	    $parlour_name =  $_POST['parlour_name'];
	    $date =  $_POST['date'];
	    $net_sales =  $_POST['net_sales'];
	    $vat =  $_POST['vat'];
	    $gross_sales =  $_POST['gross_sales'];
	    $received_date =  $_POST['received_date'];

	    $sql = "INSERT INTO `sales_records`(`parlar_id`, `date_of_sales`, `net_sales`, `vat`, `gross`, `received_date`) VALUES ('$parlour_name','$date','$net_sales','$vat', '$gross_sales','$received_date')";
	    $stmt = $con->prepare($sql);
		 // execute the query
		$stmt->execute();
	    echo $stmt->rowCount() . "Records UPDATED successfully";
}
?>