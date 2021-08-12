$(document).ready(function(){
	$('.submit-message').hide();
	$('#index-submit').click(function(){
		$('.submit-message').show();
	});

});


$(document).ready(function() {
  var sticky_1_Top = $('.sticky-1').offset().top;
  var sticky_2_Top = $('.sticky-2').offset().top;

  $(window).scroll(function() {
    var windowTop = $(window).scrollTop()+ $(window).scrollTop()/7;

    if (sticky_1_Top < windowTop) {
      $('.sticky-1').css({'position':'fixed', 'z-index':'9','background-color':'#a19abd', 'padding-right':'100px'});
    } else {
      $('.sticky-1').css({'position':'relative', 'z-index':'1', 'background-color':'transparent', 'padding-right':'0px'});
    }

    if (sticky_2_Top < windowTop) {
      $('.sticky-2').css({'position':'fixed', 'z-index':'9','background-color':'#a19abd', 'padding-right':'50px'});
      $('.sticky-1').css({'position':'relative', 'z-index':'1'});
    } else {
      $('.sticky-2').css({'position':'relative', 'z-index':'1', 'background-color':'transparent', 'padding-right':'0px'});

    }
  });
});
