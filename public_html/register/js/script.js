$(function() {
	$("a#schedule").click(
		function() {
			$("div#schedule").toggle('slow', function() {});
			return false;
		}
	);
});