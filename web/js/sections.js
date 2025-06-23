document.addEventListener('DOMContentLoaded', () => {
  const carousel_scroll = document.getElementById('carousel_scroll');
  const slide_scrolls = document.querySelectorAll('.slide_scroll');
  const totalSlides = slide_scrolls.length;

  if (!carousel_scroll || totalSlides === 0) {
    console.warn('carousel_scroll or slide_scroll not found');
    return;
  }

  let currentSlide = 0;
  let slideWidth = window.innerWidth;
  let accumulatedDelta = 0;
  let isThrottled = false;
  let allowVerticalAfterLastSlide = false;

  const scrollToSlide = (index) => {
    const target = Math.min(Math.max(index, 0), totalSlides - 1);
    carousel_scroll.scrollTo({
      left: target * slideWidth,
      behavior: 'smooth',
    });
    currentSlide = target;
    console.log(`scrollToSlide(${target})`);
  };

  const isCarouselPartiallyVisible = () => {
    const rect = carousel_scroll.getBoundingClientRect();
    return rect.top <= window.innerHeight && rect.bottom >= 0;
  };

  const isLastSlideFullyVisible = () => {
    const lastSlide = slide_scrolls[totalSlides - 1];
    const rect = lastSlide.getBoundingClientRect();
    return rect.left >= 0 && rect.right <= window.innerWidth;
  };

  window.addEventListener('wheel', (e) => {
    if (!isCarouselPartiallyVisible()) return;

    // Always block vertical scroll unless we’re truly ready to release it
    const onLastSlide = currentSlide === totalSlides - 1;
    const lastFullyVisible = isLastSlideFullyVisible();

    if (!(onLastSlide && lastFullyVisible && allowVerticalAfterLastSlide)) {
      e.preventDefault(); // Block vertical scroll
    }

    if (!isThrottled) {
      accumulatedDelta += e.deltaY;

      while (Math.abs(accumulatedDelta) >= 100) {
        if (accumulatedDelta > 0) {
          // Scroll down
          if (currentSlide < totalSlides - 1) {
            scrollToSlide(currentSlide + 1);
          } else if (lastFullyVisible && allowVerticalAfterLastSlide) {
            // Let scroll fall through
          } else {
            // Just unlock for the *next* scroll
            allowVerticalAfterLastSlide = true;
          }
          accumulatedDelta -= 100;
        } else {
          // Scroll up
          if (currentSlide > 0) {
            scrollToSlide(currentSlide - 1);
            allowVerticalAfterLastSlide = false;
          } else {
            // Already at top, allow up scroll
          }
          accumulatedDelta += 100;
        }

        isThrottled = true;
        setTimeout(() => { isThrottled = false }, 600);
      }
    }
  }, { passive: false });

  // Touch swipe support
  let touchStartX = 0;
  let touchEndX = 0;
  let touchMoving = false;

  carousel_scroll.addEventListener('touchstart', (e) => {
    if (e.touches.length === 1) {
      touchStartX = e.touches[0].clientX;
      touchMoving = true;
    }
  });

  carousel_scroll.addEventListener('touchmove', (e) => {
    if (!touchMoving) return;
    touchEndX = e.touches[0].clientX;
  });

  carousel_scroll.addEventListener('touchend', () => {
    if (!touchMoving) return;
    touchMoving = false;

    const deltaX = touchStartX - touchEndX;
    if (deltaX > 50 && currentSlide < totalSlides - 1) {
      scrollToSlide(currentSlide + 1);
    } else if (deltaX < -50 && currentSlide > 0) {
      scrollToSlide(currentSlide - 1);
      allowVerticalAfterLastSlide = false;
    }
  });

  window.addEventListener('resize', () => {
    slideWidth = window.innerWidth;
    scrollToSlide(currentSlide);
  });

  scrollToSlide(0);
});

