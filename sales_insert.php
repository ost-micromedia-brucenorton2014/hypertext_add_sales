<?php
	require_once  '_includes/connect.php';
	//echo("sales_insert.php");

	//get JSON info
	//$jsonData = json_decode(file_get_contents('php://input'));
	//echo($jsonData);
	$name = $_REQUEST["name"];
	$email = $_REQUEST["email"];
	$itemID = $_REQUEST["itemID"];
	$pricePaid = $_REQUEST["pricePaid"];
	//define table
	//echo("sales_insert.php: $name, $email, $itemID")
	
		$tbl = "customers";//change to your table i.e. John_app
		$insertArray = [];
	//write query
		$query = "INSERT INTO $tbl (name, email) VALUES (?,?)";
	//prepare statement, execute, store_result
		if($insertStmt = $mysqli->prepare($query)){
			$insertStmt->bind_param("ss", $name, $email);
			$insertStmt->execute();
			$insertStmt->insert_id;
			$insertRows = $insertStmt->affected_rows;
			
		}else{
			//echo("<br>Oops there was an error: $insertStmt->error");
			//echo("<br>$mysqli->error");
			$insertArray[] = ["error", $insertStmt->error, $mysqli->error];
		}
		//if the info got inserted
		if($insertRows > 0){
			$insertArray[] = ["success", $insertStmt->affected_rows, $insertStmt->insert_id, $itemID, $pricePaid];
		}else{
			$insertArray[] = ["error", "Sorry, there was a problem saving your info."];
		}
		echo(json_encode($insertArray));
		$insertStmt->close();
		$mysqli->close();
		

?>