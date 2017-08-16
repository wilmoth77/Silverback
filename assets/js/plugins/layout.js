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
