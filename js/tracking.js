if (healthyStudies === undefined) var healthyStudies = {};


healthyStudies.tracking = (function ($) {

    var healthyStudiesTracking = {
        init: function() {
            this.eventTracking();
        },

        eventTracking: function() {

            $('._gt').click(function() {

                var category = $(this).attr('data-category');
                var action = $(this).attr('data-action');
                var label = $(this).attr('data-label');

                healthyStudies.tracking.trackEvent(category, action, label);
            });

            $('.primary-nav .facebook').on('click', function() {
                healthyStudies.tracking.trackEvent("Header", "Facebook", "Header - Facebook");
            });

            $('.nav-extras .call-us').on('click', function() {
                healthyStudies.tracking.trackEvent("Header", "Call", "Header - Call Buttin");
            });

            $('.accordian li').on('click', function() {
                healthyStudies.tracking.trackEvent("FAQ", "More", $(this).find('.accordian-header').text());
            });

            $('.FormButton').on('click', function() {
                healthyStudies.tracking.trackEvent("Contact Us", "Submit", "Contact Us - Submit");
            });

            $('.study-sign-up').on('click', function() {
                healthyStudies.tracking.trackEvent("Current Studies", "Sign Up", $(this).parents('.current-study').find('h2').text() + " Sign Up");
            });

            /* Youtube Tracking */

            var tag = document.createElement('script');
            tag.src = "https://www.youtube.com/iframe_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

            var player = "";

            window.onYouTubeIframeAPIReady = function(event) {

                player = new YT.Player($('.youtube-player iframe').get(0), {
                    events: {
                        'onReady': onPlayerReady,
                        'onStateChange': onPlayerStateChange
                    }
                });

                var pauseFlag = false;

                function onPlayerReady(event) {
                }

                function onPlayerStateChange(event) {
                    // track when user clicks to Play
                    if (event.data == YT.PlayerState.PLAYING) {
                        healthyStudies.tracking.trackEvent('How It Works', 'Video Play', 'Help Others - Play');
                        pauseFlag = true;
                    }
                    // track when user clicks to Pause
                    if (event.data == YT.PlayerState.PAUSED && pauseFlag) {
                        healthyStudies.tracking.trackEvent('How It Works', 'Video Play', 'Help Others - Pause');
                        pauseFlag = false;
                    }
                }

            };
        },

        trackEvent: function(category, action, label) {
            ga('send', 'event', category, action, label);
        }
    };

	return healthyStudiesTracking;

})(jQuery);

$(function () {
	healthyStudies.tracking.init();
});