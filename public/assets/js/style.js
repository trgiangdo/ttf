$(document).ready(function(){
    $(".schools").slick({
        dots: true,
        infinite: true,
        centerMode: true,
        slidesToShow: 5,
        slidesToScroll: 3
    });

    $('.menu-bars').click(function(){
        var z = $('.header-cover-1 ul');
        console.log(z);
        $('.header-cover-1 ul').toggleClass('open-mobile-menu')
    })
});


$(window).resize(function(){
    var width = $(window).width();
    if (width > 768){
        $(".collapse").collapse('show');
    }
    else{
        $(".collapse").collapse('hide');
    }
});

