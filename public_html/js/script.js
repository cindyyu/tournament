$(function(){
	$.stellar({
		horizontalScrolling: false,
		verticalOffset: 300
	});
	$('a.faq').click(
		function() {
			$(this).next('div').toggle(200, function() {});
			return false;
		}
	);
});
