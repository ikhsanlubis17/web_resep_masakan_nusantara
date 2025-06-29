<script>
    // Debug script untuk star rating
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM loaded, initializing star rating...');
        
        // Check if elements exist
        const starRatings = document.querySelectorAll('.star-rating');
        const ratingInput = document.getElementById('ratingInput');
        
        console.log('Found star ratings:', starRatings.length);
        console.log('Found rating input:', ratingInput ? 'Yes' : 'No');
        
        if (starRatings.length > 0) {
            starRatings.forEach((rating, index) => {
                console.log(`Star rating ${index}:`, rating);
                const stars = rating.querySelectorAll('.star-input');
                console.log(`Stars in rating ${index}:`, stars.length);
                
                stars.forEach((star, starIndex) => {
                    star.addEventListener('click', function() {
                        console.log(`Star ${starIndex + 1} clicked!`);
                    });
                });
            });
        }
        
        // Test click handler
        setTimeout(() => {
            const firstStar = document.querySelector('.star-input');
            if (firstStar) {
                console.log('First star element:', firstStar);
                console.log('First star computed style:', window.getComputedStyle(firstStar));
            }
        }, 1000);
    });
    </script>
    