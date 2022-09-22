$(document).ready(function () {
    $('.list-streaming').slick({
        dots: false,
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 3,
        variableWidth: true,
        centerMode: false,
        nextArrow: '<div class="slick-arrow next-arrow"><i class="fa fa-chevron-right"></i></div>',
        prevArrow: '<div class="slick-arrow prev-arrow"><i class="fa fa-chevron-left"></i></div>',
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 580,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
    
        ]
    });
    $('.egg').dblclick(function(){
        
    });
});