/**
 * Primiyam Blog - Main JavaScript
 * 
 * @package Primiyam_Blog
 */

(function($) {
    'use strict';

    // Document ready
    $(document).ready(function() {
        
        // Mobile menu toggle
        initMobileMenu();
        
        // Smooth scroll for anchor links
        initSmoothScroll();
        
        // Back to top button
        initBackToTop();
        
        // Search toggle
        initSearchToggle();
        
        // Lazy load images
        initLazyLoad();
        
        // External links
        initExternalLinks();
        
        // Responsive tables
        initResponsiveTables();
        
        // Comment form validation
        initCommentValidation();
    });

    /**
     * Mobile Menu
     */
    function initMobileMenu() {
        // Toggle menu on button click
        $(document).on('click', '.mobile-menu-toggle', function() {
            $(this).toggleClass('active');
            $('.main-navigation .primary-menu').toggleClass('active').slideToggle(300);
            $('body').toggleClass('menu-open');
        });

        // Handle submenu toggles on mobile
        $('.main-navigation .menu-item-has-children > a').on('click', function(e) {
            if ($(window).width() < 968) {
                e.preventDefault();
                $(this).next('ul').slideToggle(200);
                $(this).parent().toggleClass('open');
            }
        });

        // Reset menu on window resize
        var resizeTimer;
        $(window).on('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                if ($(window).width() > 968) {
                    $('.main-navigation .primary-menu').removeAttr('style').removeClass('active');
                    $('.mobile-menu-toggle').removeClass('active');
                    $('body').removeClass('menu-open');
                    $('.menu-item-has-children').removeClass('open');
                    $('.main-navigation ul ul').removeAttr('style');
                }
            }, 250);
        });
        
        // Close menu on click outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.main-navigation').length && $(window).width() < 968) {
                $('.main-navigation .primary-menu').removeClass('active').slideUp(300);
                $('.mobile-menu-toggle').removeClass('active');
                $('body').removeClass('menu-open');
            }
        });
    }

    /**
     * Smooth Scroll
     */
    function initSmoothScroll() {
        $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').on('click', function(e) {
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && 
                location.hostname === this.hostname) {
                
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                
                if (target.length) {
                    e.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top - 100
                    }, 800);
                }
            }
        });
    }

    /**
     * Back to Top Button
     */
    function initBackToTop() {
        // Add back to top button
        if (!$('.back-to-top').length) {
            $('body').append(
                '<button class="back-to-top" aria-label="Back to Top">' +
                '<svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16">' +
                '<path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>' +
                '</svg>' +
                '</button>'
            );
        }

        // Show/hide on scroll
        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 300) {
                $('.back-to-top').addClass('show');
            } else {
                $('.back-to-top').removeClass('show');
            }
        });

        // Scroll to top on click
        $(document).on('click', '.back-to-top', function() {
            $('html, body').animate({ scrollTop: 0 }, 600);
        });
    }

    /**
     * Search Toggle
     */
    function initSearchToggle() {
        // Toggle search on button click
        $(document).on('click', '.search-toggle', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $('.header-search').toggleClass('active');
            if ($('.header-search').hasClass('active')) {
                $('.header-search .search-field').focus();
            }
        });

        // Close search on outside click
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.header-search-wrapper').length) {
                $('.header-search').removeClass('active');
            }
        });
        
        // Close on escape key
        $(document).on('keyup', function(e) {
            if (e.key === 'Escape' || e.keyCode === 27) {
                $('.header-search').removeClass('active');
            }
        });
    }

    /**
     * Lazy Load Images
     */
    function initLazyLoad() {
        if ('IntersectionObserver' in window) {
            var imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var image = entry.target;
                        if (image.dataset.src) {
                            image.src = image.dataset.src;
                            image.classList.add('loaded');
                            imageObserver.unobserve(image);
                        }
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(function(img) {
                imageObserver.observe(img);
            });
        }
    }

    /**
     * External Links
     */
    function initExternalLinks() {
        $('a').each(function() {
            var href = $(this).attr('href');
            if (href && href.indexOf(window.location.hostname) === -1 && href.indexOf('http') === 0) {
                $(this).attr('target', '_blank').attr('rel', 'noopener noreferrer');
            }
        });
    }

    /**
     * Responsive Tables
     */
    function initResponsiveTables() {
        $('.entry-content table').each(function() {
            if (!$(this).parent('.table-wrapper').length) {
                $(this).wrap('<div class="table-wrapper"></div>');
            }
        });
    }

    /**
     * Comment Form Validation
     */
    function initCommentValidation() {
        $('#commentform').on('submit', function(e) {
            var hasError = false;
            var errorMessage = '';

            // Check comment field
            var comment = $('#comment').val().trim();
            if (comment === '') {
                hasError = true;
                errorMessage += 'Please enter your comment.\n';
            }

            // Check name field
            var author = $('#author').val().trim();
            if (author === '') {
                hasError = true;
                errorMessage += 'Please enter your name.\n';
            }

            // Check email field
            var email = $('#email').val().trim();
            if (email === '') {
                hasError = true;
                errorMessage += 'Please enter your email.\n';
            } else if (!isValidEmail(email)) {
                hasError = true;
                errorMessage += 'Please enter a valid email address.\n';
            }

            if (hasError) {
                e.preventDefault();
                alert(errorMessage);
                return false;
            }
        });
    }

    /**
     * Email validation helper
     */
    function isValidEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    /**
     * Sticky header on scroll
     */
    var lastScrollTop = 0;
    $(window).on('scroll', function() {
        var st = $(this).scrollTop();
        
        if (st > 100) {
            $('.site-header').addClass('scrolled');
        } else {
            $('.site-header').removeClass('scrolled');
        }
        
        lastScrollTop = st;
    });

    /**
     * Article card animations
     */
    if ('IntersectionObserver' in window) {
        var cardObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                    cardObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelectorAll('.article-card').forEach(function(card) {
            cardObserver.observe(card);
        });
    }

    /**
     * Widget functionality
     */
    $('.widget_categories select, .widget_archive select').on('change', function() {
        var url = $(this).val();
        if (url) {
            window.location.href = url;
        }
    });

    /**
     * Reading progress bar
     */
    if ($('.single-post').length) {
        $('body').append('<div class="reading-progress"><div class="reading-progress-bar"></div></div>');
        
        $(window).on('scroll', function() {
            var winHeight = $(window).height();
            var docHeight = $(document).height();
            var scrollTop = $(window).scrollTop();
            var trackLength = docHeight - winHeight;
            var pctScrolled = Math.floor(scrollTop / trackLength * 100);
            
            $('.reading-progress-bar').css('width', pctScrolled + '%');
        });
    }

})(jQuery);
