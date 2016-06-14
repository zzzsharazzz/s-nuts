
$(document).ready(function(){

	// active the Products menu
	$(".mainmenu").find("a").removeClass("active");
	$(".mainmenu").find("a").eq(0).addClass("active");

	var categoryName = $('h2#category_name').text().trim();

	var listCatName = $('div.left-sidebar').find('h4.panel-title').find('a');
	listCatName.removeClass('active');

	$.each(listCatName, function (k, anchor) {
		if($(anchor).text().trim() == categoryName) {
			$(anchor).addClass('active');
		}
	});

});
