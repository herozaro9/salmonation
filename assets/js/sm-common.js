/**
*****************************************************************
* PROJECT : NC-Attract Coming-Soon Page
* AUTHOR : NCodeArt
*****************************************************************
*/

/**
*****************************************************************
* This file is licensed to NCodeArt. 
* it's not allowed to copy or reuse it Copyright NCodeArt 2015
*****************************************************************
*/

var nc = {};
var package_ver = 'v0.2';

/*----------  VALIDATION  ----------*/
nc.elcheck = function(el) {
	'use strict';
	if ($(el).length > 0) {
		return true;
	} else {
		return false;
	};
}

/*----------  MEDIAQUARY  ----------*/
$.mediaquery({
	minWidth     : [ 200, 480, 600, 768, 992, 1200 ],
	maxWidth     : [ 1199, 991, 767, 599, 479 ],
	minHeight    : [ 400, 800 ],
	maxHeight    : [ 800, 400 ]
});

/*----------  EQUAL HEIGHT  ----------*/
nc.eqh = function(parentObj, childObj, a) {
	'use strict';
	if (nc.elcheck(parentObj)) {
		$(parentObj).each(function(index, el) {
			if (a == "destroy") {
				$(this).equalize("destroy");
			} else {
				$(this).equalize({
					target: $(childObj)
				});
			};	
		});
	};
}

/*----------  ANIMATION OUT  ----------*/
nc.animationOut = function(obj) {
	$(obj+" .animated").each(function() {
		$(this).removeClass($(this).attr("data-animOut"));
		$(this).removeClass($(this).attr("data-animIn"));
		$(this).addClass($(this).attr("data-animOut"));
	});
}

/*----------  ANIMATION IN  ----------*/
nc.animationIn = function(obj){
	$(obj+" .animated").each(function() {
		$(this).removeClass($(this).attr("data-animOut"));
		$(this).removeClass($(this).attr("data-animIn"));
		$(this).addClass($(this).attr("data-animIn"));
	});
}

/*----------  SCROLL  ----------*/
nc.scrollBar = function() {
	$(".scroll-bar").mCustomScrollbar({
	    axis:"y"
	});
}

;(function(){
	'use strict';

	$(window).load(function(){

		/*----------  PAGE-LOADER  ----------*/
		if (nc.elcheck(".page-loader-wrapper")) {
			$(".page-loader-wrapper").fadeOut(800);	
		}

	});

	jQuery(document).ready(function($) {

		$('html').before('<!-- '+package_ver+' -->');

		/*----------  VIDEO-BACKGROUND  ----------*/
		if (nc.elcheck(".videobg")) {
			$(".videobg").each(function(index, el) {
				nc.videoBg(el);
			});
		};

		/*----------  SOCIAL-ICON  ----------*/
		if (nc.elcheck("#ss_menu")) {
			nc.socialButton();
		};

		/*----------  SCROLL  ----------*/
		if (nc.elcheck(".scroll-bar")) {
			nc.scrollBar();
		};

		/*----------  RESPONSIVE  ----------*/
		$.mediaquery("bind", "mq-key", "(min-width: 992px)", {
			enter: function() {
				nc.eqh(".eqh", ".eqh > div", "");
			},
			leave: function() {
				nc.eqh(".eqh", ".eqh > div", "destroy");
			}
		});

		$.mediaquery("bind", "mq-key", "(min-width: 200px) and (max-width: 767px)", {
			enter: function() {
				
			},
			leave: function() {
			
			}
		});

	});
})();

$(document).on('click', '.go-to-div[href^="#"]', function (e) {
  // target element id
  var id = $(this).attr('href');

  // target element
  var $id = $(id);
  if ($id.length === 0) {
    return;
  }

  // prevent standard hash navigation (avoid blinking in IE)
  e.preventDefault();

  // top position relative to the document
  var pos = $id.offset().top;

  // animated top scrolling
  $('body, html').animate({
    scrollTop: pos
  });
  $(this).addClass('active');
});

function copyToClipboard() {
  var text = "#";
  navigator.clipboard.writeText(text).then(function() {
      iziToast.success({timeout: 5000, icon: 'fas fa-check', title: 'Success', message: 'Copy Contract Address Successfully!'});
  }, function(err) {
      iziToast.error({timeout: 5000, icon: 'fas fa-times', title: 'Failed', message: 'Copy Contract Address Successfully!'});
  });
}

iziToast.settings({
    timeout: 3000, // default timeout
    resetOnHover: true,
    // icon: '', // icon class
    transitionIn: 'flipInX',
    transitionOut: 'flipOutX',
    position: 'bottomCenter',
    onOpen: function () {
        console.log('callback abriu!');
    },
    onClose: function () {
        console.log("callback fechou!");
     }
});

// Set the date we're counting down to
// var countDownDate = new Date("Dec 13, 2021 02:00:00").getTime();

// var x = setInterval(function () {

// 	var now = new Date().getTime();

// 	var distance = countDownDate - now;

// 	var days = Math.floor(distance / (1000 * 60 * 60 * 24));
// 	var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
// 	var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
// 	var seconds = Math.floor((distance % (1000 * 60)) / 1000);

// 	document.querySelector("#d").innerHTML = days;
// 	document.querySelector("#h").innerHTML = hours;
// 	document.querySelector("#m").innerHTML = minutes;
// 	document.querySelector("#s").innerHTML = seconds;

// 	if (distance < 0) {
// 		clearInterval(x);
// 		document.querySelector("#d").innerHTML = "0";
// 		document.querySelector("#h").innerHTML = "0";
// 		document.querySelector("#m").innerHTML = "0";
// 		document.querySelector("#s").innerHTML = "0";
// 	}
// }, 1000);
// 
$('.owl-carousel').owlCarousel({
  loop: true,
  margin: 10,
  nav: false,
  navText: [
  "<i class='fa fa-caret-left'></i>",
  "<i class='fa fa-caret-right'></i>"
  ],
  autoplay: true,
  autoplayHoverPause: true,
  pagination: false,
  dots: false,
  responsive: {
    600: {
      items: 1
    },
    700: {
      items: 3
    },
    1000: {
      items: 4
    },
    1200: {
      items: 5
    }
  }
})