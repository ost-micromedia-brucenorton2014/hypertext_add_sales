$( document ).ready(function() {
    //console.log( "sales.js ready!" );
    $.getJSON("sales_query.php", function( jsonData ) {
			//console.log(jsonData);
	jsonData.forEach( function(i) { 
		$("#catalogue").append('<div class="col-sm-4">\
			<h3>'+i[1]+'</h3>\
			<img src="images/'+i[3]+'" alt="" class="img-responsive">\
			<p><strong>$'+i[2]+' </strong> '+i[4]+'</p>\
			<button type="button" class="btn btn-info btn-lg addToCart" data-itemid="'+i[0]+'"  data-pricepaid="'+i[2]+'"">add to cart</button>\
		</div>');
	});

});


  //open the modal with the added hidden form element "itemID"
  //storing the itemID could also (and perhaps more efficiently) be stored in localStorage()
	$( "#catalogue" ).on( "click", ".addToCart", function( event ) {
    event.preventDefault();
    //console.log("you clicked addToCart: " + $(this).data("itemid"));
    thisItemID = $(this).data("itemid");
    thisPricePaid = $(this).data("pricepaid");
    $('#modal-hidden').html('<input type="hidden" name="itemID" value="'+thisItemID+'">\
    				<input type="hidden" name="pricePaid" value="'+thisPricePaid+'">');
		$('#addCustomer').modal();

  });

	//insert the customer info into the customer table
  $( "#buyItems" ).on( "submit", function( event ) {
    event.preventDefault();
    console.log("you clicked Checkout");

    //create a name, variable array with the form data
    var formData = $('#buyItems').serializeArray();
    
    $.getJSON("sales_insert.php", formData, function(insertData) {
      console.log("customer inserted: " + insertData[0]);
      if(insertData[0][0] == "success"){
	      //this should be done with jsonX
	      $(".modal-content").html('<form action="" id="paymentInfo">\
      <div class="modal-header">\
        <button type="button" class="close" data-dismiss="modal">&times;</button>\
        <h4 class="modal-title">Payment</h4>\
      </div>\
\
      <div class="modal-body">\
         <h2>'+insertData[0][0]+'</h2>\
          <p>Normally customers would fill in their payment info, then we would get confirmation back along with necessary info.</p>\
      		<section id="modal-hidden">\
      			<input type="hidden" name="itemID" value="'+insertData[0][3]+'" />\
	        	<input type="hidden" name="customerID" value="'+insertData[0][2]+'" />\
	        	<input type="hidden" name="pricePaid" value="'+insertData[0][4]+'" />\
        	</section>\
      </div>\
      <div class="modal-footer">\
        <button type="submit" class="btn btn-primary">Pay Now</button>\
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>\
      </div>\
      </form>');
	   	}else{
	   		$(".modal-body").html('<h2>'+insertData[0][0]+'</h2>');
	   		$(".modal-body").append(insertData[0][1]);
	   	}
    });
  });

  //insert the customer info into the customer table
  $( document ).on( "submit", "#paymentInfo", function( event ) {
    event.preventDefault();
    

    //create a name, variable array with the form data
    var formData = $('#paymentInfo').serializeArray();
    console.log("you clicked Pay Now: " + formData);
    $.getJSON("sales_add.php", formData, function(insertData) {
      console.log("sales added: " + insertData[0]);
      if(insertData[0][0] == "success"){
	      //this should be done with jsonX
	      $(".modal-content").html('<div class="modal-header">\
        <button type="button" class="close" data-dismiss="modal">&times;</button>\
        <h4 class="modal-title">Thanks</h4>\
      </div>\
\
      <div class="modal-body">\
         <h2>'+insertData[0][0]+'</h2>\
          <p>You will receive confirmation of your purchase by email shortly, along with pertinent details.</p>\
      </div>\
      <div class="modal-footer">\
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>\
      </div>');
	   	}else{
	   		$(".modal-body").html('<h2>'+insertData[0][0]+'</h2>');
	   		$(".modal-body").append(insertData[0][1]);
	   	}
    });
  });




});



