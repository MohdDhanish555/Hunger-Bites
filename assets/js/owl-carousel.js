$(".trend-cards").owlCarousel({
    loop: true,
    autoplay: TextTrackCueList,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    dots: false,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },
        750:{
            items:2,
        },
        1000:{
            items:3,
        },
        1200: {
            items:4,
        }
    }
});