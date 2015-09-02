$(function() {
    // Get the major DOM elements
    var testimonialContainer = $('#testimonials');
    var testimonials = testimonialContainer.find('.media');
    var buttonContainer = testimonialContainer.find('#testimonialButtons .inner');

    // Create button links for each testimonial slide dynamically
    loadWidgetLinks(testimonials);

    // Get each button link that was created above
    var buttons = buttonContainer.find('.dot-link');

    // Time settings
    var fadeTime = 400;
    var delayTime = 5000;

    // Start the interval
    var loopIndex = 0;
    var testimonialLoop = setInterval(loopTestimonials, delayTime);

    // Listen for a button click which will indicate we need to clear the interval
    buttons.click(addButtonListener);

    /**
     * Show the testimonial at the current loop index
     */
    function loopTestimonials() {
        $(buttons[loopIndex]).removeClass('active');

        if (loopIndex === testimonials.length - 1) {
            $(testimonials[loopIndex]).hide(0);
            loopIndex = 0;
            $(testimonials[loopIndex]).fadeIn(fadeTime);

        } else {
            $(testimonials[loopIndex++]).hide(0);
            $(testimonials[loopIndex]).fadeIn(fadeTime);
        }
        $(buttons[loopIndex]).addClass('active');
    }

    /**
     * Listen for a button click, which indicates which testimonial slide to go
     * to manually.
     *
     * If a button is clicked, the corresponding slide is shown and the interval
     * is cleared. The values are then reset and the interval is added again.
     */
    function addButtonListener() {
        var reference = $(this).data('reference');

        clearInterval(testimonialLoop);
        testimonialLoop = false;

        testimonials.each(function() {
            $(this).hide(0);
        });
        buttons.each(function() {
            $(this).removeClass('active');
        });

        testimonials.each(function(i) {
            if (i === reference) {
                $(this).fadeIn(fadeTime);
                $(buttons[i]).addClass('active');
            }
        });

        setTimeout(function() {
            if (testimonialLoop) {
                clearInterval(testimonialLoop);
            }
            loopIndex = reference;
            testimonialLoop = setInterval(loopTestimonials, delayTime);
        }, delayTime);
    }

    /**
     * Create button links to correspond to each testimonial slide
     */
    function loadWidgetLinks() {
        var elem;

        for (var i = 0; i < testimonials.length; i++) {
            if (i === 0) {
                elem = '<span class="dot-link active" data-reference="' + i + '"></span>';
            } else {
                elem = '<span class="dot-link" data-reference="' + i + '"></span>';
            }

            buttonContainer.append(elem);
            $(testimonials[i]).attr('data-index', i);
        }
    }
});
