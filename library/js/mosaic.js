// Initialize Whimsy Mosaic

jQuery(document).ready(function($){
    
    var $container = $("#mosaic");
    
    // initialize Masonry after all images have loaded  
    $container.imagesLoaded( function() {
        
        $container.masonry({
            
            itemSelector: ".brick",
            gutter:30,
            percentPosition: true,
            transitionDuration: '0.1s',
            columnWidth: '.brick'
        });
        
    });
    
});