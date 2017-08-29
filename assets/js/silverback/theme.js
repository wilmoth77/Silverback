/**
* Call specific Javascript Components here
*
* @package Silverback
*/

/* ========================================================================
* DOM-based Routing
* Based on http://goo.gl/EUTi53 by Paul Irish
*
* Only fires on body classes that match. If a body class contains a dash,
* replace the dash with an underscore when adding it to the object below.
*
* .noConflict()
* The routing is enclosed within an anonymous function so that you can
* always reference jQuery with $, even when in .noConflict() mode.
*
* ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var slvrbk = {
    // All pages
    common: {
      init: function() {
        // JavaScript to be fired on all pages


        // This will detect and set the height properly when the window resizes
        var callback = function () {
          jQuery('.modal').each(function (idx, item) {
            var modalObj = $(item).find('.modal-content');
            $(modalObj).height('auto');
            if ($(modalObj).height() > ($(window).height() * 0.9)) {
              $(modalObj).height($(window).height() * 0.9);
            }
          });
        };

        // Binding the callback in document.ready is not required, just on window.resize
        $(window).resize(callback);

        /* ========================================================================
        * Enable tooltips and popovers for silverback
        * ======================================================================== */

        $("body").tooltip({
          selector: "[title]",
          container: "body",
          trigger: "hover",
          //placement: "bottom"
        });

        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="popover"]').popover();

        /* ========================================================================
        * On mouseenter of element with class ellipsis, put the content in a title
        * element and enable tooltip
        * ======================================================================== */

        $(document).on('mouseenter', ".ellipsis", function() {
          var $this = $(this);
          if(this.offsetWidth < this.scrollWidth && !$this.attr('title')) {
            $this.tooltip({
              title: $this.text(),
              placement: "top"
            });
            $this.tooltip('show');
          }
        });

        /* ========================================================================
        * Initialize Bootstrap Tooltips and Popovers
        * ======================================================================== */


        $('#myTabs a').click(function (e) {
          e.preventDefault();
          $(this).tab('show');
        });


        $(function(){
          var $rotatePhone = $('#screen-rotation button.screen-rotation-phone');
          var $rotateTablet = $('#screen-rotation button.screen-rotation-tablet');

          $rotatePhone.click(function (e) {
            var $orientationPhone = $('#orientation.phone');
            e.preventDefault();
            if ($($orientationPhone).hasClass("landscape")) {
              $($orientationPhone).removeClass("landscape");
            }  else {
              $($orientationPhone).addClass("landscape");
            }
          });

          $rotateTablet.click(function (e) {
            var $orientationTablet = $('#orientation.tablet');
            e.preventDefault();
            if ($($orientationTablet).hasClass("landscape")) {
              $($orientationTablet).removeClass("landscape");
            }  else {
              $($orientationTablet).addClass("landscape");
            }
          });

        });

        $(function () {
          //add active class to sample app navs
          if ( $('body').hasClass('one-column') ) {
            $('#navbar .navbar-nav:first-child  li:nth-child(1)').addClass('active');
          }
          if ( $('body').hasClass('two-column') ) {
            $('#navbar .navbar-nav:first-child  li:nth-child(2)').addClass('active');
          }
          if ( $('body').hasClass('three-column') ) {
            $('#navbar .navbar-nav:first-child  li:nth-child(3)').addClass('active');
          }

        });


        $(function(){
          $('#silverback-header button.navbar-toggle').on("click", function() {
            if ($("body").hasClass("menu-open")) {
              $("body").removeClass("menu-open");
            }  else {
              $("body").addClass("menu-open");
            }
          });

          //Remove these classes from the wp body classes because they
          //get Bootstrap styles applied
          if ( $('body').hasClass('panel') ) {
            $('body').removeClass('panel');
          }
          if ( $('body').hasClass('modal') ) {
            $('body').removeClass('modal');
          }
          if ( $('body').hasClass('pagination') ) {
            $('body').removeClass('pagination');
          }
          if ( $('body').hasClass('tooltip') ) {
            $('body').removeClass('tooltip');
          }
          if ( $('body').hasClass('popover') ) {
            $('body').removeClass('popover');
          }

        });

        //Stick the right content menu
        $('.sidebar.right').affix({
          offset: {
            top: 100,
          }
        });
        //Add active classes to the right content menu
        $(function() {
          $(".sidebar.right a").on("click", function() {
            $("a.active").removeClass("active");
            $(this).addClass("active");
          });
        });

        $(document).ready(function () {
          var pre = document.getElementsByTagName('pre');
          for (var i = 0; i < pre.length; i++) {
            var isLanguage = pre[i].children[0].className.indexOf('language-');
            if ( isLanguage === 0 ) {
              var button           = document.createElement('button');
              button.className = 'copy-button sb-btn btn btn-copy';
              button.textContent = 'Copy';

              pre[i].appendChild(button);
            }
          }
          var copyCode = new Clipboard('.copy-button', {
            target: function(trigger) {
              return trigger.previousElementSibling;
            }
          });
          copyCode.on('success', function(event) {
            event.clearSelection();
            event.trigger.textContent = 'Copied';
            window.setTimeout(function() {
              event.trigger.textContent = 'Copy';
            }, 2000);
          });//end onSuccess
          copyCode.on('error', function(event) {
            event.trigger.textContent = 'Press "Ctrl + C" to copy';
            window.setTimeout(function() {
              event.trigger.textContent = 'Copy';
            }, 2000);
          });//end onError
        });//end function

        //Change the text on the view code button
        $('.view-code').click(function(){
          var $this = $(this);
          $this.toggleClass('view-code');
          if($this.hasClass('view-code')){
            $this.text('View code');
          } else {
            $this.text('Hide code');
          }
        });
      }
    },
    // Home page
    home: {
      init: function() {
        // JavaScript to be fired on the home page
      }
    },
    // About us page, note the change from about-us to about_us.
    about_us: {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var namespace = slvrbk;
      funcname = (funcname === undefined) ? 'init' : funcname;
      if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      UTIL.fire('common');

      $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
        UTIL.fire(classnm);
      });
    }
  };

  $(document).ready(UTIL.loadEvents);

})
(jQuery); // Fully reference jQuery after this point.
