/**
* Call specific Javascript Components here
*
* @package Silverback
*/

/* ========================================================================
* jQuery Bootstrap Scrolling Tabs
* https://github.com/mikejacobson/jquery-bootstrap-scrolling-tabs
* ======================================================================== */

//Initialize the plugin and hide tabs and tab content until tabs are ready

$(function() {
  $('.nav-tabs')
  .scrollingTabs({
    //Override the left and right arrow content to use MDI icons
    leftArrowContent: [
      '<div class="scrtabs-tab-scroll-arrow-mdi">',
      '  <i class="mdi mdi-chevron-left">',
      '  </i>',
      '</div>'
    ].join(''),
    rightArrowContent: [
      '<div class="scrtabs-tab-scroll-arrow-mdi">',
      '  <i class="mdi mdi-chevron-right">',
      '  </i>',
      '</div>'
    ].join(''),
    //Swipe tab strip on mobile devices
    enableSwiping: true,
    //Add class to arrow when fully scrolled
    disableScrollArrowsOnFullyScrolled: true
  })
  //Display .nav-tabs and .tab-content after component has
  // been loaded and styled
  .on('ready.scrtabs', function() {
    $('.tab-content').show();
  });
});

/* ========================================================================
* Initialize Bootstrap Tooltips and Popovers
* ======================================================================== */

$(function () {
  $('[data-toggle="tooltip"]').tooltip();
  $('[data-toggle="popover"]').popover();
});

/* ========================================================================
* Initialize Tabs
* ======================================================================== */

$('#myTabs a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
});

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
