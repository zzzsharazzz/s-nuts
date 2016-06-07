
$(document).ready(function(){

	// Products selection process
	$(".productinfo").bind("click", function() {
		// get id of selected product
		var id = $(this).attr("name");
		// move to detail page
		window.location = "product-details.html?id=" + id;
	});
});
