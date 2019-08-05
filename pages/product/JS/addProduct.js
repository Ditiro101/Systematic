$("button#addProduct").on('click', event => {
	event.preventDefault();

	let productName = $("#productName").val();
	let productDescription = $("#productDescription").val();
	let productType = $("#productType").val();
	let unitsInCase = $("#unitsInCase").val();
	let casesInPallet = $("#casesInPallet").val();
	let costPrice = $("#costPrice").val();
	let discountPrice = $("#discountPrice").val();
	let sellingPrice = $("#sellingPrice").val();

	console.log("productName = " + productName);
	console.log("productDescription = " + productDescription);
	console.log("productType = " + productType);
	console.log("unitsInCase = " + unitsInCase);
	console.log("casesInPallet = " + casesInPallet);
	console.log("costPrice = " + costPrice);
	console.log("discountPrice = " + discountPrice);
	console.log("sellingPrice = " + sellingPrice);

	$.ajax({
		url: '../PHPcode/addProduct_.php',
		type: 'POST',
		data: { 
			productName_ : productName,
			productDescription_ : productDescription,
			productType_ : productType,
			unitsInCase_ : unitsInCase,
			casesInPallet_ : casesInPallet,
			costPrice_ : costPrice,
			discountPrice_ : discountPrice,
			sellingPrice_ : sellingPrice

		},
		beforeSend: function() {

        	
    	}
	})
	.done(data => {
		let messagesArray = JSON.parse(data);
		console.log(messagesArray);
		ajaxDone = true;
	});	
});

