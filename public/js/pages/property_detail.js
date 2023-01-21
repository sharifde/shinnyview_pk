$(document).ready(()=>{

var swiper = new Swiper(".gallerySwiper", {
    spaceBetween: 10,
    freeMode: true,
    preloadImages: false,
    lazy: true,
    watchSlidesProgress: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        1200: {
          slidesPerView: 8,
        },
        1028: {
          slidesPerView: 7,
        },
        768: {
            slidesPerView: 6,
        },
        480: {
          slidesPerView: 4,
        },
        300: {
            slidesPerView: 3,
        },
        0: {
            slidesPerView: 2,
        }
    },
});
var swiper2 = new Swiper(".gallerySwiper2", {
    spaceBetween: 10,
    preloadImages: false,
    lazy: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    thumbs: {
        swiper: swiper,
    },
});

});

$(window).bind('load resize',function(){
    let dealerSection = $('#right_side_section').height() -  $('#section_dealer').height() - $('#user_property_section').height() -100; 
    $('#section_updates').height(dealerSection);
})