if (healthyStudies === undefined) var healthyStudies = {};

healthyStudies.main = (function ($) {

    var healthyStudiesMain = {
        init: function() {
            this.heroArrow();
            this.accordian();
            this.joinAStudyForm();
            this.initializeChosen();
            this.currentStudy();         
			this.smsModal();
        },
							
		smsModal: function() {          
			var iframe = '<iframe src="http://mystudyinfo.com/client/healthystudies/iframe.cfm" height="500" width="320"  allowtransparency="yes" frameborder="0" scrolling="no"></iframe>';  
			
			var container = $('.join-sms .iframe-container');	 
			
			$('.join-sms').on('hide.bs.modal', function () {
			    container.find('iframe').remove();
			});
			
			$('.join-sms').on('shown.bs.modal', function () {
			    container.html(iframe);
			});
		},
		
        heroArrow: function() {

            var $hero = $('.hero-image-webpart');
            var $arrow = $('.hero-image-webpart .down-arrow');
            $arrow.on('click', function() {
                $('html, body').animate({
                    scrollTop: $hero.offset().top + $hero.height()
                }, 500);
            });

        },

        accordian: function () {
            var $accordian = $('ul.accordian li');
            var $accordianContent = $('div.accordian-content');
            var $icons = $accordian.find('.icon');
            $accordian.on('click', function () {
                var $this = $(this);
                var $icon = $this.find('.icon');
                if ($this.hasClass('active')) {
                    $this.removeClass('active');
                    $icon.removeClass('icon-minus').addClass('icon-plus');
                    $accordianContent.slideUp();
                } else {
                    $accordian.removeClass('active');
                    $accordianContent.slideUp();
                    $icons.not($icon).removeClass('icon-minus').addClass('icon-plus');
                    $this.addClass('active');
                    $icon.removeClass('icon-plus').addClass('icon-minus');
                    $this.find($accordianContent).slideDown();
                }
            });
        },

        joinAStudyForm: function () {
            var $measurementRadioButton = $('.measurement-radio-list input[type=radio]'),
                measurementType = "Standard";

            var $height = $('.user-measurements input[name*="txtHeight"]'), //in cm or in
                $weight = $('.user-measurements input[name*="txtWeight"]');

            $measurementRadioButton.on('change', function () {
                var $measurementCheckedRadioInput = $('.measurement-radio-list input[type=radio]:checked');
                measurementType = $measurementCheckedRadioInput.val();

                $height.val("");
                $weight.val("");
                $('input[name*="txtBmi"]').val("");

                if (measurementType == "Standard") {
                    $('span.measurement.height').text("(in)");
                    $('span.measurement.weight').text("(lbs)");
                } else {
                    $('span.measurement.height').text("(cm)");
                    $('span.measurement.weight').text("(kg)");
                }
                
            });

            $('.user-measurements input[type="text"]').on('keyup', function() {
			    healthyStudiesMain.updateBmi(measurementType == 'Standard');
            });

        },

        updateBmi: function (isStandard) {

            var height = $('.user-measurements input[name*="txtHeight"]').val().replace(/\D/g, ''), //in cm or in
                weight = $('.user-measurements input[name*="txtWeight"]').val().replace(/\D/g, ''), //in kg or lbs
                $bmi = $('input[name*="txtBmi"]'),
                bmiTotal = 0;
                
            if (height != "" && weight != "" && height > 0 && weight > 0) {

                if (isStandard) {
                    bmiTotal = (weight * 703) / Math.pow(height, 2);
                } else {
                    bmiTotal = (weight) / Math.pow(height*.01, 2); //.01 converts cm to meters
                }
                if ( bmiTotal > 0) {
                    $bmi.val(Math.round(10 * bmiTotal) / 10);
                }
            }
        },

        initializeChosen: function () {
            $('.hs-form select').chosen({
                disable_search: true,
                width: "100%"
            });

        },
        currentStudy: function() {
            $('.study-info').each(function (i, e) {

                var textRightContainer = $(e).find('.text-right'),
                    trHeight = textRightContainer.height();
                if ($(this).height() >= trHeight) return;

                textRightContainer.css({ 'height': '58px', 'overflow': 'hidden' });
                $moreLInk = $('<a />').attr('href', "#").css({ display: "block", clear: "both", position:'absolute',bottom:'0',right:'0' }).html('More');

                
                $(this).append($moreLInk);

                $moreLInk.on('click', function (eve) {
                    eve.preventDefault();

                    var studyInfo = $(this).parents('.study-info'),
                        textRight = studyInfo.find('.text-right');

                    if (!$(this).hasClass('open')) {
                        studyInfo.css('height', (trHeight + 85) + 'px');
                        textRight.removeAttr('style');
                        $(this).text('Close');
                        $(this).addClass('open');
                    } else {
                        studyInfo.removeAttr('style');
                        textRight.css({ 'height': '58px', 'overflow': 'hidden' });
                        $(this).text('More');
                        $(this).removeClass('open');
                    }
                });

            });
        }
    };

    return healthyStudiesMain;

})(jQuery);

$(function () {
    healthyStudies.main.init();
});