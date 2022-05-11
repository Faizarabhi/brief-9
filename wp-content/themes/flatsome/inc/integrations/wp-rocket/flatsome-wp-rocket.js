Flatsome.behavior('wp-rocket-lazy-load-packery', {
  attach: function (context) {
       jQuery('.has-packery .lazy-load', context).waypoint(function (direction) {
          var $element = jQuery(this.element);
          $element.imagesLoaded( function() {
              jQuery('.has-packery').packery('layout');
          });
      }, { offset: '90%' });
  }
});
