$('.btn-plus, .btn-minus').on('click', function (e) {
  const isNegative = $(e.target).closest('.btn-minus').is('.btn-minus');
  const input = $(e.target).closest('.input-group').find('input');
  if (input.is('input')) {
    input[0][isNegative ? 'stepDown' : 'stepUp']();
  }
});

function myFunction(x) {
  if (x.matches) {
    // If media query matches
    var swiper = new Swiper('.mySwiper', {
      slidesPerView: 1,
      spaceBetween: 30,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  } else {
    var swiper = new Swiper('.mySwiper', {
      slidesPerView: 3,
      spaceBetween: 30,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
  }
}

var x = window.matchMedia('(max-width: 991px)');
myFunction(x); // Call listener function at run time
x.addListener(myFunction); // Attach listener function on state changes

$(window).scroll(function () {
  $('nav, a, span').toggleClass('scrolled', $(this).scrollTop() > 20);
});

window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById('navbar').style.padding = '25px 10px';
  } else {
    document.getElementById('navbar').style.padding = '20px 10px';
  }
}
