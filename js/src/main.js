'use strict';

(function($){
	$(document).ready(function(){
    const filterizr = new Filterizr('.case-studies__inner .row', {
      gridItemsSelector: '.case-study',
    });

    $('.case-studies__filters button').click(function(){
      $('.case-studies__filters button').removeClass('active');
      $(this).addClass('active');
    });
  });
})(jQuery);
