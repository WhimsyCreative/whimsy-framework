// Initialize Whimsy Responsive Nav

jQuery(document).ready(function($){

	jQuery('.whimsy-nav').slimmenu(
	{
	    resizeWidth: '768',
	    collapserTitle: '',
	    animSpeed: 'fast',
	    easingEffect: 'easeInSine',
	    indentChildren: false,
	    childrenIndenter: '&nbsp;',
        initiallyVisible: true
	});
});
