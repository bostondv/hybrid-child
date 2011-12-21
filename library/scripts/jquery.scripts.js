(function($) {

	$(document).ready(function() {

		// Match height of sidebar on load
		matchHeight('.sidebar', $('#content').height());

		// Match height on resize
		$(window).resize(function() {
			matchHeight('.sidebar', $('#content').height());
		});

		// Match height function, only executes if greater than 480px window
		function matchHeight(obj, srcHeight) {
			var windowWidth = $(window).width();
			var objHeight = $(obj).height();
			if (windowWidth >= 480 && objHeight < srcHeight) {
				$(obj).height(srcHeight);
			} else {
				$(obj).removeAttr('style');
			}
		}

		// External links new window
		$("a[href*='http://']:not([href*='"+location.hostname.replace
           ("www.","")+"'])").attr('target','_blank');

	});

})(jQuery);