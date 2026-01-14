document.addEventListener('DOMContentLoaded', function() {
    // Get all slides
    const slides = document.querySelectorAll('.slide');
    const audio = document.getElementById('background-audio');
    const soundToggle = document.querySelector('.sound-toggle');
    
    let currentSlide = 0;
    let loopCount = 0;
    const maxLoops = 1; // Loop once after initial play
    
    // Show first slide immediately
    slides[0].classList.add('active');
    
    // Function to show next slide
    function nextSlide() {
        // Hide current slide
        slides[currentSlide].classList.remove('active');
        
        // Move to next slide or reset to first slide
        currentSlide = (currentSlide + 1) % slides.length;
        
        // Show new current slide
        slides[currentSlide].classList.add('active');
        
        // Check if we've completed a full cycle
        if (currentSlide === 0) {
            loopCount++;
            
            // If we've reached max loops, stop the animation
            if (loopCount >= maxLoops) {
                // Keep showing the last slide (slide 3)
                setTimeout(() => {
                    slides[0].classList.remove('active');
                    slides[2].classList.add('active');
                }, 100);
                
                return;
            }
        }
        
        // Schedule next slide change
        setTimeout(nextSlide, 3000); // 3 seconds per slide
    }
    
    // Start the slideshow after a short delay
    setTimeout(nextSlide, 3000);
    
    // Sound toggle functionality
    soundToggle.addEventListener('click', function() {
        if (audio.muted) {
            audio.muted = false;
            soundToggle.textContent = '🔊';
            audio.play();
        } else {
            audio.muted = true;
            soundToggle.textContent = '🔇';
        }
    });
    
    // CTA button click handler
    const ctaButton = document.querySelector('.cta-button');
    ctaButton.addEventListener('click', function() {
        // Use ExitApi.exit() for Google Ads tracking
        ExitApi.exit();
    });
});