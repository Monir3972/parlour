<?php 
	include('../db.php');
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$emp_id = $_POST['fetch_edit_id'];
	    $edit_parlour_name =  $_POST['edit_parlour_name'];
	    $edit_net_sales =  $_POST['edit_net_sales'];
	    $edit_vat =  $_POST['edit_vat'];
	    $edit_gross_sales =  $_POST['edit_gross_sales'];
	    $edit_received_date =  $_POST['edit_received_date'];
	    $sql = "UPDATE `sales_records` SET `parlar_id`='$edit_parlour_name',`net_sales`='$edit_net_sales',`vat`='$edit_vat', `gross`='$edit_gross_sales', `vat`='$edit_vat', `received_date`='$edit_received_date'  WHERE id = '$emp_id'";
	    $stmt = $con->prepare($sql);
		 // execute the query
		$stmt->execute();
	   echo $stmt->rowCount() . " records UPDATED successfully";
}


?>