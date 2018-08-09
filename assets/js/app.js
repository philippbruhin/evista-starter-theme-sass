import 'bootstrap'
import 'bootstrap/scss/bootstrap.scss'
import 'font-awesome/scss/font-awesome.scss'

require('slick-carousel/slick/slick.min.js')

window.onload = function() { 
    $( '#preloader' ).fadeOut( 500 );
}


$("document").ready(function() {
    
    $(window).scroll(function () {        
        if ($(window).scrollTop() > 0) {
            $('header').addClass('scrolling'); 
        } else {
            $('header').removeClass('scrolling'); 
        }        
    });
    
    if ($('.image-gallery').length > 0) {
        $('.image-gallery').slick({
            centerMode: true,
            centerPadding: '60px',
            slidesToShow: 3,
            variableWidth: true,
            infinite: true,
            arrows: false
        });
    }
    if ($('.serviceGallery').length > 0) {
        $('.serviceGallery').slick({                        
            slidesToShow: 1,            
            infinite: true,
            arrows: true,
            dots: false
        });
    }
    if ($('.serviceToggle').length > 0) {
        $(window).on('resize', function(){
            if($(window).width()>930) {
                $('.serviceNav').show();
            } else {
                $('.serviceNav').hide();
                $('.serviceToggle').removeClass("active");
            }
        }); 
        $('.serviceToggle').click(function() { 
            $(this).toggleClass("active"); 
            $('.serviceNav').slideToggle(); 
            return false;
        });
    }


    $('.hamburger').click(function() {
        $(this).toggleClass('is-active');
        $('.navbar-header').slideToggle(); 
        return false;
    });



    $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
            $('html, body').animate({
            scrollTop: target.offset().top-100
            }, 1000);
            return false;
        }
        }
    });

});
