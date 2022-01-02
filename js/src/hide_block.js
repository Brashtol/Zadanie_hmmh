'use strict';

(function($){
	$(document).ready(function(){
    wp.data.dispatch('core/edit-post').removeEditorPanel('taxonomy-panel-category') ; // category
  });
})(jQuery);
