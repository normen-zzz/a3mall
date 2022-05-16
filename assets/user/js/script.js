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
		var swiper = new Swiper('.mySwiper2', {
			spaceBetween: 10,
			slidesPerView: 3,
			freeMode: true,
			watchSlidesProgress: true,
		});
		var swiper2 = new Swiper('.mySwiper3', {
			spaceBetween: 10,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			thumbs: {
				swiper: swiper,
			},
		});
	} else {
		var swiper = new Swiper('.mySwiper2', {
			spaceBetween: 10,
			slidesPerView: 4,
			freeMode: true,
			watchSlidesProgress: true,
		});
		var swiper2 = new Swiper('.mySwiper3', {
			spaceBetween: 10,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			thumbs: {
				swiper: swiper,
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

var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {});
document.onreadystatechange = function () {
	myModal.show();
};

$(function () {
	$('.progress').each(function () {
		var value = $(this).attr('data-value');
		var left = $(this).find('.progress-left .progress-bar');
		var right = $(this).find('.progress-right .progress-bar');

		if (value > 0) {
			if (value <= 50) {
				right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)');
			} else {
				right.css('transform', 'rotate(180deg)');
				left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)');
			}
		}
	});

	function percentageToDegrees(percentage) {
		return (percentage / 100) * 360;
	}
});
