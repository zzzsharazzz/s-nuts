
$(document).ready(function(){

	var rootPath = getContextPath();

	// Get current address href
	function getContextPath() {
		return window.location.pathname.substring(0, window.location.pathname.indexOf("/", 2));
	}
});
