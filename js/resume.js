$(function() {
	$("li").mouseenter(function(event) {
		$(this).addClass("wrappedElement");
	});
	$("li").mouseleave(function(event) {
		$(this).removeClass("wrappedElement");
	})
})