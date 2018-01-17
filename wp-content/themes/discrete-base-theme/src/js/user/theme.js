/* eslint-disable no-alert, no-console, no-undef  */
// function rotateIcons() {
// 	var id = setInterval(frame, 5);
// 	var elem = document.getElementsByClassName("site-header__religious-symbols--rotate");
// 	var pos = 0;
// 	var r = 65;
// 	var xcenter = 90;
// 	var ycenter = 75;
// 	function frame() {
// 		for (i = 0; i < elem.length; i++) {
// 			elem[i].style.top = Math.floor(ycenter + (r * Math.sin(pos - (i * Math.PI / 3) - (Math.PI / 2)))) + 'px';
// 			elem[i].style.left = Math.floor(xcenter + (r * Math.cos(pos - (i * Math.PI / 3) + (Math.PI / 2)))) + 'px';
// 		}
// 		if (pos >= - 2 * Math.PI) {
// 			pos = pos - 0.003;
// 		} else {
// 			pos = 0;
// 		}
// 	}
// 	$(".site-header__religious-symbols--rotate").hover(function() {
// 		clearInterval(id);
// 	});
// 	$(".site-header__religious-symbols--rotate").mouseleave(function() {
// 		id = setInterval(frame, 5);
// 	});
// }

	// $(".site-header__religious-symbols").css({ transform: 'rotate(120deg)' });
	// $(".site-header__religious-symbols--rotate").css({ transform: 'rotate(-120deg)' });

jQuery('.site-header__religious-symbols--rotate').each(function(){
    var $img = jQuery(this);
    var imgID = $img.attr('id');
    var imgClass = $img.attr('class');
    var imgURL = $img.attr('src');

    jQuery.get(imgURL, function(data) {
        // Get the SVG tag, ignore the rest
        var $svg = jQuery(data).find('svg');

        // Add replaced image's ID to the new SVG
        if(typeof imgID !== 'undefined') {
            $svg = $svg.attr('id', imgID);
        }
        // Add replaced image's classes to the new SVG
        if(typeof imgClass !== 'undefined') {
            $svg = $svg.attr('class', imgClass+' replaced-svg');
        }

        // Remove any invalid XML tags as per http://validator.w3.org
        $svg = $svg.removeAttr('xmlns:a');

        // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
        if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
            $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
        }

        // Replace image with new SVG
        $img.replaceWith($svg);

    }, 'xml');

});
