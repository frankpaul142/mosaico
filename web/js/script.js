$(function() {
	$('.trigger').click(function() {
		$('.cont-menu-resp').toggle();
		$('#nav').toggleClass('margtop');

	});

	cambioMenu();
	var cont1height = $('#cont1').height() - 33;
	$(window).scroll(function(event) {
		cambioMenu();
	});

	$(".menu-movil").click(function() {
		var $this = $(this);
		$('.submenu-movil').each(function(index) {
			if ($(this).attr('id').substr(2) != $this.attr('id').substr(2)) {
				$(this).hide();
			}
		});
		$('#sm' + $this.attr('id').substr(2)).toggle();
	});

	$('.submenu-movil').click(function() {
		$('.cont-menu-resp').hide();
		$('#nav').removeClass('margtop');
	});

	$(document).mousedown(function(e) {
		var menu = $('.cont-menu-resp');
		var trigger = $('.trigger');
		if (!menu.is(e.target) && !trigger.is(e.target) && menu.has(e.target).length === 0) {
			$('.cont-menu-resp').hide();
			$('#nav').removeClass('margtop');
		}
	});

	function cambioMenu() {
		var st = $(this).scrollTop();
		if (st > cont1height) {
			$("#menu").css("height", "50px");
			$('.icon-img').css({
				'height': '15px',
				'opacity': '0'
			});
			$('.logo').css({
				'height': '75px'
			});
			$('#submenu').css({
				'top': '50px'
			});
		} else {
			$("#menu").css("height", "110px");
			$('.icon-img').css({
				'height': '69px',
				'opacity': '1'
			});
			$('.logo').css({
				'height': '120px'
			});
			$('#submenu').css({
				'top': '100px'
			});
		}
	}
});
