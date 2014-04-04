
jQuery(function($){

	$(' .sprocket-mosaic ul > li').each( function() { $(this).hoverdir(); } );

	$(' .sprocket-mosaic').on('hippo.mosaic.loaded', function(){
		$(' .sprocket-mosaic ul > li').each( function() { $(this).hoverdir(); } );
	})


	$(' .gkGridElement').each( function() { $(this).hoverdir(); } );

	$('#back-to-top').on('click',function (event) {
        event.preventDefault();
        var offsetTop = $("body").offset().top;
        $('html, body').stop().animate({scrollTop: offsetTop}, 1500, 'easeOutCubic');
    });


	$('#back-to-top').removeClass().addClass('animated fadeOutDown back-to-top-hidden');
    $(window).on('scroll', function (e) {
        e.stopPropagation();
        if ($(window).scrollTop() > 700) {
            if( !$('#back-to-top').hasClass('back-to-top-visible') ){
             $('#back-to-top').removeClass().addClass('animated fadeInUp back-to-top-visible'); 
         }
     } else {
        if( !$('#back-to-top').hasClass('back-to-top-hidden') ){
            $('#back-to-top').removeClass().addClass('animated fadeOutDown back-to-top-hidden');
        }
    }

    if ($(window).scrollTop() > 250) {
       if( !$('body').hasClass('make-sticky') ){
        $('body').addClass('make-sticky');
    }
} else {
    $('body').removeClass('make-sticky');
}

});

    var getExtension = function(filename) {
        return filename.split('.').pop().toLowerCase();
    };

    var getBaseName = function(path){
        return path.split(/[\\/]/).pop();
    };

    var isRetinaDisplay = function(){
        var mediaQuery = "(-webkit-min-device-pixel-ratio: 1.5),\
        (min--moz-device-pixel-ratio: 1.5),\
        (-o-min-device-pixel-ratio: 3/2),\
        (min-resolution: 1.5dppx)";

        if (window.devicePixelRatio > 1)
          return true;

      if (window.matchMedia && window.matchMedia(mediaQuery).matches)
          return true;

      return false;
  };

  var getRetinaImage = function(image){

    var extension = getExtension(image);
    return image.substring(0, image.length - 5)+'@2x.'+extension;

};


var hasImage = function(imagePath){


    var http = new XMLHttpRequest;
    http.open('HEAD', imagePath);
    http.onreadystatechange = function() {
        if (http.readyState != 4) {
          return false;
      }

      if (http.status >= 200 && http.status <= 399) {

        var type = http.getResponseHeader('Content-Type');
        if (type == null || !type.match(/^image/i)) {
          return false;
      }

      return true;
  } else {
      return false;
  }
}
http.send();

};




$(".com_k2, .hippo-video-shortcode").fitVids();


$(window).on('load', function(e){

    $('#page-preload-wrapper').fadeOut('slow');
    if( isRetinaDisplay() ){
        $('.custom').each(function(){

            var bgImage = $(this).css('background-image');

            if( bgImage!='none' ){

                var get_retina_image = getRetinaImage(bgImage);

                if( hasImage(get_retina_image) ){
                    $(this).css('background-image', get_retina_image);
                }
            }
        });
    }
});


$(window).on('load scroll', function(e){

    e.stopPropagation();
    $(".play-animation:not('.animated'):in-viewport").each(function(e){
       $(this).addClass('animated');
   });
    $(".hippo-counter:not('.hippo-counter-counted'):in-viewport").each(function(e){
        $(this).addClass('hippo-counter-counted').countTo();
    });
});


    // run js if Chrome is being used
    if(navigator.userAgent.toLowerCase().indexOf('chrome') > -1) {
        // set background-attachment back to the default of 'scroll'
        $('.parralax').css('background-attachment', 'scroll');

        // move the background-position according to the div's y position
        $(window).scroll(function(){

            scrollTop = $(window).scrollTop();
            photoTop = $('.parralax').offset();
            height = $('.parralax').height();

            if( photoTop ){
                photoTop = $('.parralax').offset().top;
                distance = (photoTop - scrollTop);

                //if( (height/2) )

                $('.parralax').css('background-position', 'center ' + (distance*-1) + 'px');
            }
        });
    } 
});