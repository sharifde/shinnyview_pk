// Slider Dynamic data start
for (let i = 1; i <= 7; i++) {
  if (i !== 0 && i !== 64 && i !== 65 && i !== 66 && i !== 67 && i !== 68 && i !== 69 && i !== 70) {
    // let html = '<div class="swiper-slide">';
    // html += "<img class='slider-logos' src=" + $('meta[property="og:image"]').attr('content') + 'public/images/slider-logos/' + i + ".jpeg" + " /></div>";
    // $('#swiper-container .swiper-wrapper').append(html);

    // let html = '<div class="col-md-2 col-sm-3 col-xs-6  swiper-slide"> <div class="dealers b-shadow">';
    // html += "<img class='slider-logos' src=" + $('meta[property="og:image"]').attr('content') + 'public/images/slider-logos/' + i + ".jpeg" + " /></div></div>";
    // $('#swiper-container .swiper-wrapper').append(html);
                // <img src="img/p-dealer.jpeg" alt="dealer-logo">
            //   </div>
            // </div>
  }
}
// Slider dynamic data end
$(document).ready(() => {
  const swiper = new Swiper('#swiper-container', {
    autoplay: {
      delay: 3000,
    },
    breakpoints: {
      1200: {
        slidesPerView: 6,
      },
      768: {
        slidesPerView: 4,
      },
      520: {
        slidesPerView: 3,
      },
      0: {
        slidesPerView: 2,
      }
    },
    navigation: {
      // nextEl: '.swiper-button-next',
      // prevEl: '.swiper-button-prev',
      nextEl: ".left-chb",
      prevEl: ".right-chb",
    },
    scrollbar: false
  });
  const swiperFeatured = new Swiper('#swiper-featured', {
    spaceBetween:30,
    autoplay: {
      delay: 5000,
    },
    navigation: {
      nextEl: ".left-ch",
      prevEl: ".right-ch",
    },
    breakpoints: {
      1600: {
        slidesPerView: 4,
      },
      1200: {
        slidesPerView: 3,
      },
      1028: {
        slidesPerView: 2,
      },
      480: {
        slidesPerView: 1,
      }
    },
    scrollbar: false
  });
  const swiperFeatured2 = new Swiper('#swiper-featured2', {
    spaceBetween:30,
    autoplay: {
      delay: 6000,
    },
    navigation: {
      nextEl: ".left-ch2",
      prevEl: ".right-ch2",
    },
    breakpoints: {
      1600: {
        slidesPerView: 4,
      },
      1200: {
        slidesPerView: 3,
      },
      1028: {
        slidesPerView: 2,
      },
      480: {
        slidesPerView: 1,
      }
    },
    scrollbar: false
  });
  // const swiperCity = new Swiper('#city_slides', {
  //   slidesPerView: 6,
  //   loop: true,
  //   spaceBetween:20,
  //   autoplay: {
  //     delay: 3000,
  //   },
  //   scrollbar: false
  // });
  const swiperTestimonial = new Swiper('#swiper-testimonial', {
    spaceBetween: 20,
    scrollbar: false,
    autoplay: {
      delay: 5000,
    },
    breakpoints: {
      1200: {
        slidesPerView: 3,
      },
      1028: {
        slidesPerView: 2,
      },
      480: {
        slidesPerView: 1,
      }
    },
  });
});