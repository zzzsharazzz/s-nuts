
$(document).ready(function(){

	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});

	// Country list combobox item selection process
	$(".countryListItem").bind("click", function(e, isTriggerClick) {
		e.preventDefault();
		// change combobox text to selected text
		$(".countryList").html($(this).text() + " <span class='caret'></span>");
		// reset visibility to all items
		$(".countryListItem").removeClass("display-none");
		// hide selected item from list
		$(this).addClass("display-none");
		// set the currency list to the appropriated selected value
		if (typeof isTriggerClick == "undefined") {
			$(".currencyListItem[name^='" + $(this).attr("name") + "']").trigger("click", [true]);
		}
	});

	// Currency list combobox item selection process
	$(".currencyListItem").bind("click", function(e, isTriggerClick) {
		e.preventDefault();
		// change combobox text to selected text
		$(".currencyList").html($(this).text() + " <span class='caret'></span>");
		// reset visibility to all items
		$(".currencyListItem").removeClass("display-none");
		// hide selected item form list
		$(this).addClass("display-none");
		// set the country list to the appropriated selected value
		if (typeof isTriggerClick == "undefined") {
			$(".countryListItem[name^='" + $(this).attr("name") + "']").trigger("click", [true]);
		}
	});
});
