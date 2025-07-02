// Mouse wheel scrolling for Bootstrap carousel
document.addEventListener('DOMContentLoaded', function() {
    console.log('🚀 Carousel wheel script loaded');
    
    const carousel = document.getElementById('carouselActionsFade');
    
    if (!carousel) {
        console.warn('❌ Carousel with ID "carouselActionsFade" not found');
        return;
    }
    
    console.log('✅ Carousel found:', carousel);

    // Initialize Bootstrap carousel if not already initialized
    let bootstrapCarousel;
    try {
        bootstrapCarousel = new bootstrap.Carousel(carousel, { 
            interval: false, // Disable auto-sliding
            wrap: false       // Disable wrapping
        });
        console.log('✅ Bootstrap carousel initialized');
    } catch (e) {
        // Carousel might already be initialized
        bootstrapCarousel = bootstrap.Carousel.getInstance(carousel);
        console.log('✅ Bootstrap carousel already initialized:', bootstrapCarousel);
    }

    if (!bootstrapCarousel) {
        console.warn('❌ Failed to initialize Bootstrap carousel');
        return;
    }

    let isScrolling = false;
    let currentIndex = 0;
    const totalSlides = carousel.querySelectorAll('.carousel-item').length;
    let scrollThreshold = 50; // Minimum scroll amount to trigger slide change
    let accumulatedDelta = 0;
    let isCarouselActive = false; // Track if carousel is active and blocking scroll
    let shouldNudgePage = false;
    let lastSlideNudged = false;

    console.log('📊 Carousel stats:', {
        totalSlides: totalSlides,
        scrollThreshold: scrollThreshold
    });

    // Function to check if carousel is 100% visible
    function isCarouselFullyVisible() {
        const carouselRect = carousel.getBoundingClientRect();
        const tolerance = 10;
        const isVisible = carouselRect.top >= -tolerance &&
                          carouselRect.bottom <= window.innerHeight + tolerance &&
                          carouselRect.left >= 0 &&
                          carouselRect.right <= window.innerWidth;
        console.log('👁️ Carousel visibility check:', {
            top: carouselRect.top,
            bottom: carouselRect.bottom,
            left: carouselRect.left,
            right: carouselRect.right,
            windowHeight: window.innerHeight,
            windowWidth: window.innerWidth,
            tolerance: tolerance,
            isFullyVisible: isVisible
        });
        return isVisible;
    }

    // Function to block/unblock page scrolling
    function setPageScrollBlock(block) {
        console.log('🔒 Setting page scroll block:', block);
        
        if (block) {
            const currentScrollY = window.scrollY;
            document.body.style.overflow = 'hidden';
            document.body.style.position = 'fixed';
            document.body.style.width = '100%';
            document.body.style.top = `-${currentScrollY}px`;
            
            console.log('🚫 Page scroll blocked:', {
                overflow: document.body.style.overflow,
                position: document.body.style.position,
                width: document.body.style.width,
                top: document.body.style.top,
                originalScrollY: currentScrollY
            });
        } else {
            const scrollY = document.body.style.top;
            document.body.style.overflow = '';
            document.body.style.position = '';
            document.body.style.width = '';
            document.body.style.top = '';
            
            const restoreScrollY = parseInt(scrollY || '0') * -1;
            window.scrollTo(0, restoreScrollY);
            
            console.log('✅ Page scroll unblocked:', {
                overflow: document.body.style.overflow,
                position: document.body.style.position,
                width: document.body.style.width,
                top: document.body.style.top,
                restoreScrollY: restoreScrollY
            });
        }
    }

    // Track current slide index
    carousel.addEventListener('slid.bs.carousel', function(event) {
        currentIndex = event.to;
        console.log('🔄 Carousel slide changed:', {
            from: event.from,
            to: event.to,
            currentIndex: currentIndex
        });
        // Unblock scroll if on first or last slide
        if (currentIndex === 0 || currentIndex === totalSlides - 1) {
            if (isCarouselActive) {
                console.log('🏁 Unblocking scroll on first/last slide (via arrow/indicator/keyboard)');
                isCarouselActive = false;
                setPageScrollBlock(false);
            }
            // Set nudge flag if on last slide
            if (currentIndex === totalSlides - 1) {
                shouldNudgePage = true;
                // If not already nudged, nudge immediately (for click/arrow/indicator)
                if (!lastSlideNudged) {
                    window.scrollBy({ top: 1, behavior: 'auto' });
                    lastSlideNudged = true;
                    console.log('⬇️ Nudged page by 1px on last slide (immediate from click/arrow/indicator)');
                }
                console.log('🟢 Will nudge page on next wheel event');
            } else {
                lastSlideNudged = false; // Reset when leaving last slide
            }
        } else {
            lastSlideNudged = false; // Reset when not on last slide
        }
    });

    // Mouse wheel event handler
    window.addEventListener('wheel', function(event) {
        const isFullyVisible = isCarouselFullyVisible();
        
        console.log('🖱️ Wheel event:', {
            deltaY: event.deltaY,
            isFullyVisible: isFullyVisible,
            isCarouselActive: isCarouselActive,
            isScrolling: isScrolling,
            currentIndex: currentIndex
        });

        // Block page scroll when carousel is fully visible
        if (isFullyVisible && !isCarouselActive) {
            console.log('🎯 Activating carousel scroll blocking');
            isCarouselActive = true;
            setPageScrollBlock(true);
        } else if (!isFullyVisible && isCarouselActive) {
            console.log('🔓 Deactivating carousel scroll blocking');
            isCarouselActive = false;
            setPageScrollBlock(false);
        }

        if (!isFullyVisible || isScrolling) {
            console.log('⏭️ Skipping carousel interaction:', {
                reason: !isFullyVisible ? 'not fully visible' : 'already scrolling'
            });
            return;
        }

        // Prevent default scroll behavior when carousel is fully in view
        event.preventDefault();
        console.log('🚫 Prevented default wheel behavior');

        accumulatedDelta += event.deltaY;
        console.log('📈 Accumulated delta:', accumulatedDelta);

        // Trigger slide change when threshold is reached
        if (Math.abs(accumulatedDelta) >= scrollThreshold) {
            console.log('🎯 Threshold reached, changing slide');
            
            if (accumulatedDelta > 0) {
                // Scrolling down - go to next slide
                if (currentIndex < totalSlides - 1) {
                    console.log('⬇️ Going to next slide');
                    bootstrapCarousel.next();
                } else {
                    // On last slide, unblock scroll and allow normal page scrolling
                    console.log('🏁 Last slide reached, unblocking scroll');
                    isCarouselActive = false;
                    setPageScrollBlock(false);
                    return;
                }
            } else {
                // Scrolling up - go to previous slide
                if (currentIndex > 0) {
                    console.log('⬆️ Going to previous slide');
                    bootstrapCarousel.prev();
                } else {
                    // On first slide, unblock scroll and allow normal page scrolling
                    console.log('🏁 First slide reached, unblocking scroll');
                    isCarouselActive = false;
                    setPageScrollBlock(false);
                    return;
                }
            }

            // Reset accumulated delta and set scrolling flag
            accumulatedDelta = 0;
            isScrolling = true;
            
            console.log('⏱️ Setting scroll cooldown');
            
            // Prevent rapid scrolling
            setTimeout(() => {
                isScrolling = false;
                console.log('✅ Scroll cooldown finished');
            }, 800); // Adjust timing as needed
        }

        // If on last slide and should nudge page, scroll page by 1px and reset flag
        if (currentIndex === totalSlides - 1 && shouldNudgePage && !lastSlideNudged) {
            window.scrollBy({ top: 1, behavior: 'auto' });
            shouldNudgePage = false;
            lastSlideNudged = true;
            console.log('⬇️ Nudged page by 1px on last slide (from wheel)');
            return;
        }
    }, { passive: false });

    // Touch/swipe support for mobile devices
    let touchStartY = 0;
    let touchEndY = 0;
    let touchStartTime = 0;

    carousel.addEventListener('touchstart', function(e) {
        if (e.touches.length === 1) {
            touchStartY = e.touches[0].clientY;
            touchStartTime = Date.now();
            console.log('📱 Touch start:', { touchStartY, touchStartTime });
        }
    }, { passive: true });

    carousel.addEventListener('touchmove', function(e) {
        if (e.touches.length === 1) {
            touchEndY = e.touches[0].clientY;
        }
    }, { passive: true });

    carousel.addEventListener('touchend', function(e) {
        if (!touchStartY || !touchEndY) return;

        const deltaY = touchStartY - touchEndY;
        const deltaTime = Date.now() - touchStartTime;
        const minSwipeDistance = 50;
        const maxSwipeTime = 300;

        console.log('📱 Touch end:', {
            deltaY, deltaTime, minSwipeDistance, maxSwipeTime,
            isValidSwipe: Math.abs(deltaY) > minSwipeDistance && deltaTime < maxSwipeTime
        });

        // Check if it's a valid swipe gesture
        if (Math.abs(deltaY) > minSwipeDistance && deltaTime < maxSwipeTime) {
            if (deltaY > 0 && currentIndex < totalSlides - 1) {
                // Swipe up - next slide
                console.log('📱 Swipe up - next slide');
                bootstrapCarousel.next();
            } else if (deltaY < 0 && currentIndex > 0) {
                // Swipe down - previous slide
                console.log('📱 Swipe down - previous slide');
                bootstrapCarousel.prev();
            }
        }

        // Reset touch values
        touchStartY = 0;
        touchEndY = 0;
        touchStartTime = 0;
    }, { passive: true });

    // Keyboard support (arrow keys)
    document.addEventListener('keydown', function(event) {
        // Check if carousel is 100% visible in viewport
        const isFullyVisible = isCarouselFullyVisible();

        if (!isFullyVisible) return;

        console.log('⌨️ Keyboard event:', { key: event.key, isFullyVisible });

        switch(event.key) {
            case 'ArrowDown':
            case 'ArrowRight':
                event.preventDefault();
                if (currentIndex < totalSlides - 1) {
                    console.log('⌨️ Arrow key - next slide');
                    bootstrapCarousel.next();
                }
                break;
            case 'ArrowUp':
            case 'ArrowLeft':
                event.preventDefault();
                if (currentIndex > 0) {
                    console.log('⌨️ Arrow key - previous slide');
                    bootstrapCarousel.prev();
                }
                break;
        }
    });

    // Optional: Add visual feedback for scroll direction
    carousel.style.cursor = 'grab';
    
    carousel.addEventListener('mousedown', function() {
        carousel.style.cursor = 'grabbing';
    });
    
    carousel.addEventListener('mouseup', function() {
        carousel.style.cursor = 'grab';
    });
    
    carousel.addEventListener('mouseleave', function() {
        carousel.style.cursor = 'grab';
    });

    // Clean up scroll blocking when page is unloaded
    window.addEventListener('beforeunload', function() {
        if (isCarouselActive) {
            console.log('🧹 Cleaning up scroll blocking on page unload');
            setPageScrollBlock(false);
        }
    });

    // Handle window resize to recheck carousel visibility
    window.addEventListener('resize', function() {
        console.log('📏 Window resized');
        const isFullyVisible = isCarouselFullyVisible();
        if (!isFullyVisible && isCarouselActive) {
            console.log('🔓 Window resize - deactivating carousel scroll blocking');
            isCarouselActive = false;
            setPageScrollBlock(false);
        }
    });

    console.log('🎉 Carousel wheel script setup complete');
});