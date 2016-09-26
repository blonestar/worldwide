if (wwctrials === undefined) var wwctrials = {};

wwctrials.main = (function ($) {
    var isEditMode = $('body').is('.EditMode');
    var isDesignMode = $('body').is('.DesignMode');

    var wwctrialsMain = {
        init: function () {
            this.externalLinks();
            this.heroArrow();
            this.mobileNav();
            this.clickFirstLink();
            this.parallax();
            this.homeTherapeuticAreas();
            this.scrollable();
            this.tabSelector();
            this.regionalMessage();
            this.videoModal();
            this.librarySignupModal();
            this.collapsibleBox();
            this.searchToggle();
            this.imageSlider();
            this.contactUs();
            this.methodsSearch();
        },

        externalLinks: function() {
            $('a[href^="http"]').each(function() {
                if (this.href.indexOf(location.host) == -1) {
                    $(this).attr('target', '_blank');
                }
            });
        },

        collapsibleBox: function () {
            var $collapsibleBoxes = $('.collapsible-box-webpart');
            if ($collapsibleBoxes.length > 0) {
                if (!isEditMode && !isDesignMode) {
                    $collapsibleBoxes.find('.collapsible-heading').on('click', function() {
                        var $heading = $(this);
                        $heading.toggleClass('active');
                        $heading.next('.collapsible-content').slideToggle();
                    });
                } else {
                    var $heading = $collapsibleBoxes.find('.collapsible-heading');
                    $heading.addClass('active');
                    $heading.next('.collapsible-content').show();
                }
            }
        },

        searchToggle: function () {
        	if ($('.header-search').length > 0) {
        		$('.search-toggle').on('click', function () {

        			var $this = $(this);
			        var $searchBox = $('.header-search');
			        if ($this.hasClass('active')) {

				        $this.removeClass('active');
				        $searchBox.fadeOut();

			        } else {
			        	$this.addClass('active');
			        	$searchBox.fadeIn();
			        }

        		});

        		$('.search-close').on('click', function () {

        			var $searchBox = $('.header-search');
			        var $searchToggle = $('.search-toggle');
        			$searchToggle.removeClass('active');
        			$searchBox.fadeOut();

        		});

        	}
        },

        heroArrow: function () {
            var $hero = $('.hero-image-webpart, .hero-video-webpart');
            var $arrow = $hero.find('.down-arrow');
            $arrow.on('click', function () {
                $('html, body').animate({
                    scrollTop: $hero.offset().top + $hero.height()
                }, 500);
            });
        },

        parallax: function() {
			console.log('paralax activated');
            if (wwctrialsMain.isMobile.any()) {
                $('.hero-image-webpart').each(function (i, e) {
                    $(this).find('.img-bg').css("background-position", "50% 0");
                    $(this).find('.img-bg').css("background-attachment", "scroll");
                });
                return;
            }

            var heroWebParts = [];

            var calculateOffsets = function () {
                heroWebParts = [];

                $('.hero-image-webpart').each(function(i, e) {
                    if (i > 0) {
                        $(this).find('.img-bg').css("background-position", "50% 0");
                        $(this).find('.img-bg').css("background-attachment", "scroll");
                    } else {
                        heroWebParts.push({ startingPos: $(e).offset().top, elem: $(e) });
                    }
                });
            };

            calculateOffsets();

            $(window).on('resize', function() {
                calculateOffsets();
                $(window).trigger('scroll');
            });

            $(window).on('scroll', function () {
                $(heroWebParts).each(function(i, e) {
                  
                    var $scrollTop = e.startingPos - $(window).scrollTop();

                    if ($scrollTop < 0) {
                        e.elem.find('.img-bg').css("background-position", "50% " + ($scrollTop / 2) + "px");
                    } else {
                        e.elem.find('.img-bg').css("background-position", "50% " + ($scrollTop) + "px");
                    }
                });
            });

            $(window).trigger('scroll');
        },

        mobileNav: function () {
            var $navIcon = $('.nav-icon');
            var $mobileNav = $('.mobile-nav');

            if ($mobileNav.is(":visible")) {
                // Show WCT Nav
                $navIcon.on('click', function() {
                    if ($(this).is('.open')) {
                        $mobileNav.removeClass('open');
                    } else {
                        $mobileNav.addClass('open');
                    }
                });

                var $rootNav = $mobileNav.find('.root-nav');
                var $subNavs = $mobileNav.find('.sub-nav');

                $subNavs.each(function() {
                    var $subNav = $(this);
                    var $link = $subNav.siblings('a');

                    $link.data('subnav', $subNav);
                    $link.addClass('has-children');
                    $subNav.remove().appendTo($mobileNav);
                });

                $(window).on('load', function() {
                    var rootScroll = new IScroll($rootNav.get(0), { click: true });

                    $subNavs.each(function() {
                        var navScroll = new IScroll(this, {
                            click: true
                        });
                    });
                });

                $mobileNav.on('click', 'a', function (event) {
                    var $link = $(this);
                    var $subNav = $link.data('subnav');

                    if ($subNav != undefined) {
                        event.preventDefault();
                        $subNav.addClass('open');
                    } else {
                        $mobileNav.removeClass('open');
                        $subNavs.removeCLass('open');
                    }
                });

                $mobileNav.on('click', '.back', function(event) {
                    var $back = $(this);
                    $back.closest('.sub-nav').removeClass('open');
                });

            } else {
                // Show Healthy Studies Nav

                $navIcon.on('click', function () {
                    var $primaryNav = $('.primary-nav');

                    if ($(this).is('.open')) {
                        $primaryNav.removeClass('open');
                        $navIcon.removeClass('open');
                    } else {
                        $primaryNav.addClass('open');
                        $navIcon.addClass('open');
                    }
                });
            }

        },

        clickFirstLink: function () {
            if (!isEditMode) {
                $('.click-first-link').on('click', function() {
                    var url = $(this).find('a[href]').attr('href');
                    if (url != undefined && url != '') {
                        window.location = url;
                    }
                });
            }
        },

        homeTherapeuticAreas: function() {
            var $iconsWrapper = $('.home-therapeutic-icons-wrapper');
            var $icons = $('.home-therapeutic-icon');
            var iconCount = Math.max($icons.length, 1);

            $iconsWrapper.on('click', '.next, .previous', function(event) {
                var $target = $(event.target);
                var oldIndex = $icons.index($icons.filter('.active').get(0));
                var newIndex;

                if ($target.is('.next')) {
                    newIndex = (oldIndex + 1) % iconCount;
                } else {
                    newIndex = oldIndex == 0 ? iconCount - 1 : oldIndex - 1;
                }

                $icons.eq(oldIndex).removeClass('active');
                $icons.eq(newIndex).addClass('active');
            });
        },

        scrollable: function () {
            $(window).load(function() {
                var $wrappers = $('.scroll-wrapper');

                $wrappers.each(function (index, wrapper) {
                    var $wrapper = $(wrapper);
                    var $scroller = $wrapper.find('.scroller');

                    if ($scroller.length == 1) {
                        $wrapper.height($scroller.height());

                        var myScroll = new IScroll(wrapper, {
                            eventPassthrough: true,
                            scrollX: true,
                            scrollY: false
                        });
                    }
                });
            });
        },

        tabSelector: function() {
            var $tabWrappers = $('.tabs');

            $tabWrappers.on('click', '.tab', function(event) {
                var $tab = $(this);
                var $tabWrapper = $tab.closest('.tabs');
                var $tabs = $tabWrapper.find('.tab');

                if ($tabs.length > 1 && $tabs.filter(':visible').length == 1) {
                    event.preventDefault();
                    $tabWrapper.addClass('overlay');
                } else if ($tabWrapper.is('.overlay') && $tab.is('.selected')) {
                    event.preventDefault();
                    $tabWrapper.removeClass('overlay');
                }
            });
        },

        regionalMessage: function () {
            var $regionalMessage = $('.regional-message-webpart');
            $regionalMessage.find('.close-btn').on('click', function() {
                $regionalMessage.addClass('hide');
                wwctrialsMain.setCookie('rgnmsg', '1', 365);
            });
        },

        videoModal: function () {
            var $modal = $('.video-modal');
            var $iframe = $modal.find('.video-iframe');
            var $title = $modal.find('.modal-title');
            $modal.on('show.bs.modal', function(event) {
                var $link = $(event.relatedTarget);
                var title = $link.data('title');
                $title.text(title);
                var url = wwctrialsMain.convertToYouTubeEmbedUrl($link.attr('href'));
                $iframe.attr('src', url);
            });

            $modal.on('hide.bs.modal', function() {
                $iframe.attr('src', '');
            });
        },

        librarySignupModal: function () {
            var $modal = $('.library-signup-modal');
            var $signupSuccess = $modal.find('.feature-signup-success a');
            if ($modal.length > 0) {
                var $featuredResources = $('.library-featured a, .featured-resource a');
                $featuredResources.on('click', function (event) {
                    var $link = $(this);
                    $signupSuccess.attr('href', $link.attr('href'));
                    var libSignup = wwctrialsMain.getCookie('libsignup');
                    if (libSignup != '1') {
                        event.preventDefault();
                        $modal.modal('show');
                    }
                });

                //$modal.find('.feature-signup-success a').on('click', function() {
                //    $modal.modal('hide');
                //});
            }
        },

        imageSlider: function () {
            $('.image-slider-webpart').each(function() {
                var $slider = $(this);
                $slider.slick({
                    arrows: true,
                    dots: true,
                    autoplay: true,
                    autoplaySpeed: 12000,
                    slide: '.image-slide',
                    prevArrow: '.prev-slide',
                    nextArrow: '.next-slide'
                });
            });
        },

        contactUs: function () {
            var $contactUsWebpart = $('.contact-us-webpart');
            var $currentDetail = null;
            if ($contactUsWebpart.length > 0) {
                var $contactOptions = $contactUsWebpart.find('.contact-options');
                $contactOptions.on('change', function() {
                    var $detail = $contactUsWebpart.find('.' + this.value);
                    if ($detail.length > 0) {
                        if ($currentDetail != null) {
                            $currentDetail.hide();
                        }
                        $detail.show();
                        $currentDetail = $detail;
                    }
                });
            }
        },

        methodsSearch: function () {
            var $methodsSearchWebpart = $('.methods-search-webpart');
            var $textbox = $methodsSearchWebpart.find('.textbox');
            var $button = $methodsSearchWebpart.find('input[type=submit]');
            $textbox.on('keypress', function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    $button.click();
                    return false;
                }
            });
        },

        convertToYouTubeEmbedUrl: function(url) {
            var youtubeCodeRegex = /v=([^&]+)/;
            var match = youtubeCodeRegex.exec(url);
            if (match.length > 1) {
                return "https://www.youtube.com/embed/" + match[1] + "?autoplay=1&autohide=0";
            }
            return "";
        },

        getCookie: function (name) {
            var cookieName = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1);
                if (c.indexOf(cookieName) == 0) return c.substring(cookieName.length, c.length);
            }
            return "";
        },

        setCookie: function(name, value, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays*24*60*60*1000));
            var expires = "expires="+d.toUTCString();
            document.cookie = name + "=" + value + "; " + expires;
        },

        isMobile: {
            android: function () {
                return navigator.userAgent.match(/Android/i) ? true : false;
            },
            blackBerry: function () {
                return navigator.userAgent.match(/BlackBerry/i) ? true : false;
            },
            iOS: function () {
                return navigator.userAgent.match(/iPhone|iPad|iPod/i) ? true : false;
            },
            iOS7: function () {

                if (!this.iOS()) {
                    return false;
                }

                var iosV = this.iOSVersion();
                return iosV[0] > 6 && iosV[0] < 8;
            },
            windows: function () {
                return navigator.userAgent.match(/IEMobile/i) ? true : false;
            },
            any: function () {
                return (this.android() || this.blackBerry() || this.iOS() || this.windows());
            },
            iOSVersion: function () {
                if (this.iOS()) {
                    var v = (navigator.appVersion).match(/OS (\d+)_(\d+)_?(\d+)?/);
                    return [parseInt(v[1], 10), parseInt(v[2], 10), parseInt(v[3] || 0, 10)];
                }

                return [];
            }
        },
    };

    return wwctrialsMain;

})(jQuery);

jQuery(function () {
    wwctrials.main.init();
});