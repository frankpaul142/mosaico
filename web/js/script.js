$(function() {
	$('.trigger').click(function() {
		$('.cont-menu-resp').toggle();
		$('#nav').toggleClass('margtop');

	});

	/*var $root = $('html, body');
	$('a').click(function() {
	    $root.animate({
	        scrollTop: $($.attr(this, 'href')).offset().top
	    }, {
	        duration: 800,
	        easing: "easeInOutExpo"
	    });
	    return false;
	});*/

	//Keep track of last scroll
	//var lastScroll = 0;
	var cont1height = $('#cont1').height();
	$(window).scroll(function(event) {
		//Sets the current scroll position
		var st = $(this).scrollTop();
		//Determines up-or-down scrolling
		if (st > cont1height) {
			//Replace this with your function call for downward-scrolling

			$("#menu").css("height", "50px");
			$('.icon-img').css({
				'height': '15px',
				'opacity': '0'
			})
			$('.logo').css({
				'height': '75px'
			})
			$('#submenu').css({
				'top': '50px'
			})
		} else {
			//Replace this with your function call for upward-scrolling

			$("#menu").css("height", "110px");
			$('.icon-img').css({
				'height': '69px',
				'opacity': '1'
			});
			$('.logo').css({
				'height': '120px'
			})
			$('#submenu').css({
				'top': '100px'
			})
		}
		//Updates scroll position
		//lastScroll = st;
	});
});

$(function() {
	$('#menu-sombreros').click(function() {
		$('#sub-sombreros').toggle();
        $('#sub-bisuteria').hide();
        $('#sub-pulseras').hide();
        $('#sub-collares').hide();
        $('#sub-figuras').hide();
        $('#sub-bolsos').hide();
		
});
    $('#menu-bisuteria').click(function() {
		$('#sub-sombreros').hide();
        $('#sub-bisuteria').toggle();
        $('#sub-pulseras').hide();
        $('#sub-collares').hide();
        $('#sub-figuras').hide();
        $('#sub-bolsos').hide();
		
});
    $('#menu-pulseras').click(function() {
		$('#sub-sombreros').hide();
        $('#sub-bisuteria').hide();
        $('#sub-pulseras').toggle();
        $('#sub-collares').hide();
        $('#sub-figuras').hide();
        $('#sub-bolsos').hide();
		
});
    $('#menu-collares').click(function() {
		$('#sub-sombreros').hide();
        $('#sub-bisuteria').hide();
        $('#sub-pulseras').hide();
        $('#sub-collares').toggle();
        $('#sub-figuras').hide();
        $('#sub-bolsos').hide();
		
});
    $('#menu-figuras').click(function() {
		$('#sub-sombreros').hide();
        $('#sub-bisuteria').hide();
        $('#sub-pulseras').hide();
        $('#sub-collares').hide();
        $('#sub-figuras').toggle();
        $('#sub-bolsos').hide();
		
});
    $('#menu-bolsos').click(function() {
		$('#sub-sombreros').hide();
        $('#sub-bisuteria').hide();
        $('#sub-pulseras').hide();
        $('#sub-collares').hide();
        $('#sub-figuras').hide();
        $('#sub-bolsos').toggle();
		
});
    $('#menu-sombreros').mouseleave(function() {
        $('#sub-sombreros').hide();
        
    });
    $('#menu-bisuteria').mouseleave(function() {
        $('#sub-bisuteria').hide();
        
    });
    $('#menu-pulseras').mouseleave(function() {
        $('#sub-pulseras').hide();
        
    });
    $('#menu-collares').mouseleave(function() {
        $('#sub-collares').hide();
        
    });
    $('#menu-figuras').mouseleave(function() {
        $('#sub-figuras').hide();
        
    });    
    $('#menu-bolsos').mouseleave(function() {
        $('#sub-bolsos').hide();
        
    });    
    
    
	});

