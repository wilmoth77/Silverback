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
        $(function(){

          if ( $('nav .documentation li:nth-child(1)').hasClass('active') ) {
            $('nav .documentation li:nth-child(2)').addClass('active');
          }
        });

        $(function(){
          var snippets = document.querySelectorAll('.snippet');
          [].forEach.call(snippets, function(snippet) {
            snippet.firstChild.insertAdjacentHTML('beforebegin', '<button class="btn-clip"><img class="clippy" width="13" src="https://clipboardjs.com/assets/images/clippy.svg" alt="Copy to clipboard"></button>');
          });
          var clipboard = new Clipboard('.btn-clip', {
            target: function(trigger) {
              return trigger.nextElementSibling;
            }
          });
          clipboard.on('success', function(e) {
            e.clearSelection();
            console.log(e);

          });

          clipboard.on('error', function(e) {
            console.log(e);
          });
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
