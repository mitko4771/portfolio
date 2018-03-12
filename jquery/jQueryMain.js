$(document).ready(() => {

    //  smooth navigation scroll

    $(".menu").on('click', function (event) {

        if (this.hash !== "") {
            event.preventDefault();
            let hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function () {
                window.location.hash = hash;
            });
        }
    });

    //  button 'go down' smooth scroll

    $("#goDownBtn").on('click', function (event) {

            let skillsSection = $('#skills');
            $('html, body').animate({
                scrollTop: $(skillsSection).offset().top
            }, 800, function () {
                window.location.skillsSection = skillsSection;
            });
    });

    // go to top button

    $(window).scroll(function(){
		if ($(this).scrollTop() > 400) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});
    
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
});