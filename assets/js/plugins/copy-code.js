(function($) {
  $.fn.closest_descendent = function(filter) {
    var $found = $(),
    $currentSet = this; // Current place
    while ($currentSet.length) {
      $found = $currentSet.filter(filter);
      if ($found.length) break;  // At least one match: break loop
      // Get all children of the current set
      $currentSet = $currentSet.children();
    }
    return $found.first(); // Return first match of the collection
  }
})(jQuery);

$(function(){
  var pre = document.getElementsByTagName('pre');
  for (var i = 0; i < pre.length; i++) {
    var isLanguage = pre[i].children[0].className.indexOf('language-');
    if ( isLanguage === 0 ) {
      var button = document.createElement('button');
      button.className = 'copy-button';
      button.textContent = 'Copy ';
      pre[i].appendChild(button);
      var footerCopy = $(".copy-button").parents(".panel").closest_descendent('.panel-footer-buttons>div');
      $( button ).appendTo(footerCopy);
      $(".copy-button").addClass( "btn btn-hair" );
    }
  }
  var copyCode = new Clipboard('.copy-button', {
    target: function(trigger) {
      return $(trigger).parents(".panel").closest_descendent('code').get(0);
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
