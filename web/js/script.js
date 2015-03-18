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

	$('.selectQuantity').change(function() {
		window.location = 'site/change-quantity?id=' + $(this).attr('id').substr(2) + '&q=' + $(this).val();
	});

	setInterval(function() {
		remainingTime();
	}, 1000);

	function remainingTime() {
		var now = new Date();
		var id = '';
		$('.rt').each(function() {
			id = $(this).attr('id').substr(14);
			var date_auction_ms = Number($('#cd' + id).text() + 659);
			var timeDiff = new Date(date_auction_ms - now.getTime());
			var seconds = 0;
			var minutes = 0;
			var hours = 0;
			var sec = 0;
			var min = 0;
			seconds = Math.floor(timeDiff / 1000);
			if (seconds > 0) {
				if (seconds > 59) {
					minutes = Math.floor(seconds / 60);
					seconds = seconds % 60;
					if (minutes > 59) {
						hours = Math.floor(minutes / 60);
						minutes = minutes % 60;
					}
				}
				sec = seconds < 10 ? '0' + seconds : seconds;
				min = minutes < 10 ? '0' + minutes : minutes;
			}
			$('#remaining_time' + id).text(hours + ' h : ' + min + ' m : ' + sec + ' s');
		});
	}

	$('.ofertar_puja').click(function () {
		$(this).prop('disabled',true);
		var id=$(this).attr('id').substr(2);
		$('#op'+id).val('OFERTANDO');
		console.log($('#puja'+id).val());
		$.post('site/bid',{productId: id, bid: $('#puja'+id).val()}).success(function (data) {
			console.log(data);
			if(data=='no post'){
				alert('La oferta no puede estar vacía');
			}
			else if(data=='no product' || data=='no auction' || data=='no save'){
				alert('Se produjo un error. Intenta nuevamente.');
			}
			else if(data=='no mayor'){
				alert('La oferta debe ser mayor al valor actual.');
			}
			else{
				$('#pp'+id).text(data);
			}
			$('#op'+id).prop('disabled',false);
			$('#op'+id).val('OFERTAR');
		}).error(function (data) {
			console.log('error');
			$('#op'+id).prop('disabled',false);
			$('#op'+id).val('OFERTAR');
		});
	});

	setInterval(function () {
		auctionValue();
	}, 5000);

	function auctionValue() {
		$('.rt').each(function() {
			id = $(this).attr('id').substr(14);
			$.get('site/auction-value?id='+id).success(function (data) {
				console.log(data);
				if(data.substr(0,2)!='no'){
					var arr=data.split('-');
					$('#pp'+arr[1]).text(arr[0]);
				}
			}).error(function () {
				console.log('error');
			});
		});
	}
});
