let navbar = document.querySelector('.header .header-2 .navbar');
let userBox = document.querySelector('.header .header-2 .user-box');
let menuBtn = document.querySelector('#menu-btn');
let userBtn = document.querySelector('#user-btn');
let stickyHeader = document.querySelector('.header .header-2');

if (userBtn && userBox && navbar) {
   userBtn.onclick = () => {
      userBox.classList.toggle('active');
      navbar.classList.remove('active');
   };
}

if (menuBtn && navbar && userBox) {
   menuBtn.onclick = () => {
      navbar.classList.toggle('active');
      userBox.classList.remove('active');
   };
}

window.onscroll = () => {
   if (userBox) userBox.classList.remove('active');
   if (navbar) navbar.classList.remove('active');

   if (stickyHeader) {
      if (window.scrollY > 60) {
         stickyHeader.classList.add('active');
      } else {
         stickyHeader.classList.remove('active');
      }
   }
};

document.querySelectorAll('.hero-carousel').forEach((carousel) => {
   const slides = carousel.querySelectorAll('.hero-slide');
   const dotsWrap = carousel.querySelector('.hero-dots');
   const prevBtn = carousel.querySelector('.hero-control.prev');
   const nextBtn = carousel.querySelector('.hero-control.next');

   if (!slides.length || !dotsWrap) return;

   let current = 0;
   let timer;

   slides.forEach((_, index) => {
      const dot = document.createElement('button');
      dot.type = 'button';
      dot.setAttribute('aria-label', `Chuyển tới banner ${index + 1}`);
      dot.addEventListener('click', () => {
         showSlide(index);
         restart();
      });
      dotsWrap.appendChild(dot);
   });

   const dots = dotsWrap.querySelectorAll('button');

   const showSlide = (index) => {
      current = (index + slides.length) % slides.length;

      slides.forEach((slide, slideIndex) => {
         slide.classList.toggle('active', slideIndex === current);
      });

      dots.forEach((dot, dotIndex) => {
         dot.classList.toggle('active', dotIndex === current);
      });
   };

   const next = () => showSlide(current + 1);
   const prev = () => showSlide(current - 1);

   const restart = () => {
      clearInterval(timer);
      timer = setInterval(next, 5000);
   };

   if (nextBtn) nextBtn.addEventListener('click', () => {
      next();
      restart();
   });

   if (prevBtn) prevBtn.addEventListener('click', () => {
      prev();
      restart();
   });

   carousel.addEventListener('mouseenter', () => clearInterval(timer));
   carousel.addEventListener('mouseleave', restart);

   showSlide(0);
   restart();
});
