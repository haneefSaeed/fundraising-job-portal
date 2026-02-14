import "./bootstrap";

import Alpine from "alpinejs";

// resources/js/app.js
import Swiper, { Navigation, Pagination, Autoplay } from "swiper";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

import anime from 'animejs/lib/anime.es.js';


Swiper.use([Navigation, Pagination, Autoplay]);
document.addEventListener('DOMContentLoaded', () => {
  new Swiper('.mySwiper', {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    autoplay: {
      delay: 3000,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
});



window.animateProgressBars = function() {
    document.querySelectorAll('.progress-bar').forEach(el => {
        const percent = el.dataset.percent;
        anime({
            targets: el,
            width: percent + '%',
            easing: 'easeOutCubic',
            duration: 2000,
        });
    });
};


window.Alpine = Alpine;

Alpine.start();
