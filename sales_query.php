<?php
	require_once  '_includes/connect.php';
	
	//define table
		$tbl = "items";//change to your table i.e. John_app
		$tbl2 = "photos";
	//write query
		$query = "SELECT $tbl.itemID, $tbl.title, $tbl.description, $tbl.price, $tbl2.src FROM $tbl, $tbl2 WHERE $tbl.itemID = $tbl2.itemID";
	//prepare statement, execute, store_result
		if($displayStmt = $mysqli->prepare($query)){
			$displayStmt->execute();
			$displayStmt->store_result();
			$numrows = $displayStmt-> num_rows;
			//echo("<br>results: $numrows");
		}
	//bind results
		$displayStmt->bind_result($IDResult, $titleResult, $descriptionResult, $priceResult, $srcResult);
	
    $itemsArray = [];
    //fetch results
		while($displayStmt->fetch()){

      $itemsArray[] = [$IDResult, $titleResult, $priceResult, $srcResult, $descriptionResult];

		}
    echo(json_encode($itemsArray));
	?>
