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

        $(function () {
          $('[data-toggle="tooltip"]').tooltip();
          $('[data-toggle="popover"]').popover();
          $('#myTabs a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
          });
        });

        $(function(){
          if ( $('nav .documentation > li:nth-child(1)').hasClass('active') ) {
            $('nav .documentation > li:nth-child(2)').addClass('active');
          }
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

        //Nav-tabs dropdown
        //https://bootsnipp.com/snippets/featured/nav-tabs-dropdown
        $('.nav-tabs-dropdown').each(function(i, elm) {
          $(elm).text($(elm).next('ul').find('li.active a').text());
        });
        $('.nav-tabs-dropdown').on('click', function(e) {
          e.preventDefault();
          $(e.target).toggleClass('open').next('ul').slideToggle();
        });
        $('#nav-tabs-wrapper a[data-toggle="tab"]').on('click', function(e) {
          e.preventDefault();
          $(e.target).closest('ul').hide().prev('a').removeClass('open').text($(this).text());
        });

        $(function(){
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
