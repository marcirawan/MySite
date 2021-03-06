/*!
 * FlatPress Extras
 */

jQuery(function(){
	jQuery("a[rel=popover]")
	.popover()
	.click(function(e) {
		e.preventDefault()
	});

	jQuery("a[rel=tooltip]").tooltip();

	// Custom selects
	//jQuery("select").dropkick();

	// Todo list
    //jQuery(".todo li").click(function() {
     //   jQuery(this).toggleClass("todo-done");
    //});
   

    // Init tags input
    jQuery("#tagsinput").tagsInput();

    // Init jQuery UI slider
    jQuery("#slider").slider({
        min: 1,
        max: 5,
        value: 2,
        orientation: "horizontal",
        range: "min",
    });

    // JS input/textarea placeholder
    jQuery("input, textarea").placeholder();

    // Make pagination demo work
    jQuery(".pagination a").click(function() {
        if (!jQuery(this).parent().hasClass("previous") && !jQuery(this).parent().hasClass("next")) {
            jQuery(this).parent().siblings("li").removeClass("active");
            jQuery(this).parent().addClass("active");
        }
    });

    jQuery(".btn-group a").click(function() {
        jQuery(this).siblings().removeClass("active");
        jQuery(this).addClass("active");
    });

});


jQuery.noConflict()(function($){
// cache container
var $container = $('#portfolio-list');
// initialize isotope
$container.imagesLoaded( function(){
	$container.isotope({
		itemSelector : '.block',
		layoutMode : 'fitRows'
	});
});

// filter items when filter link is clicked
$('#portfolio-filter a').click(function(){
  var selector = $(this).attr('data-filter');
  $container.isotope({ filter: selector });
  $('.disabled').removeClass('disabled');
  $(this).addClass('disabled');
  return false;
});
});