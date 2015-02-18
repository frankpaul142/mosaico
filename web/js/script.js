$(function() {
	$('.trigger').click(function() {
		$('.cont-menu-resp').toggle();
        $('#nav').toggleClass('margtop');
        
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


$(function(){
      //Keep track of last scroll
      var lastScroll = 0;
    var cont1height = $('#cont1').height();
      $(window).scroll(function(event){
          //Sets the current scroll position
          var st = $(this).scrollTop();
          //Determines up-or-down scrolling
          if (st > cont1height){
             //Replace this with your function call for downward-scrolling
             
             $("#menu").css("height", "50px"); 
             $('.icon-img').css({'height':'15px','opacity':'0'}) 
             $('.logo').css({'height':'75px'})
          }
          else {
             //Replace this with your function call for upward-scrolling
             
             $("#menu").css("height", "110px");  
             $('.icon-img').css({'height':'69px','opacity':'1'});
             $('.logo').css({'height':'120px'})
          }
          //Updates scroll position
          lastScroll = st;
      });
    });