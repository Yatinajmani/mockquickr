(function($){
	$(function(){
		$('.sidenav').sidenav();
		$('.parallax').parallax();
		$('#carousel3').carousel({
			duration: 600,
			dist: 0,
			padding: 65,
			full_width: false
		});
		$('.side-nav').sidenav();
    }); // end of document ready
	setInterval(function() {
		$('#carousel3').carousel('next');
	}, 3000);

})(jQuery); // end of jQuery name space


