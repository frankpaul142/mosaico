$(function() {
	$('.trigger').click(function() {
		$('.cont-menu-resp').toggle();
	});

	var $root = $('html, body');
	$('a').click(function() {
		$root.animate({
			scrollTop: $($.attr(this, 'href')).offset().top
		}, {
			duration: 800,
			easing: "easeInOutExpo"
		});
		return false;
	});
});
