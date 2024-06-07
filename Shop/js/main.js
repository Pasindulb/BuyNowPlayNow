(function($) {

	"use strict";

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	var carousel = function() {
		$('.featured-carousel').owlCarousel({
	    loop:true,
	    autoplay: true,
	    autoHeight: false,
	    margin:30,
	    animateOut: 'slideOutDown',
    animateIn: 'flipInX',
	    nav:true,
	    dots: true,
	    autoplayHoverPause: false,
	    items: 1,
	    
	    responsive:{
	      0:{
	        items:1
	      },
	      600:{
	        items:1
	      },
	      1000:{
	        items:1
	      }
	    }
		});

	};
	carousel();

})(jQuery);

gsap.registerPlugin(ScrollTrigger);

// need to stop at a section mid-page? See this demo: https://codepen.io/GreenSock/pen/MWGVJYL?editors=0010

// Gsap Code
let currentIndex = -1;
let animating;
let swipePanels = gsap.utils.toArray(".swipe-section .panel");

// set second panel two initial 100%
gsap.set(".x-100", {xPercent: 100});

// set z-index levels for the swipe panels
gsap.set(swipePanels, {
  zIndex: i => i
});

// create an observer and disable it to start
let intentObserver = ScrollTrigger.observe({
  type: "wheel,touch",
  onUp: () => !animating && gotoPanel(currentIndex + 1, true),
  onDown: () => !animating && gotoPanel(currentIndex - 1, false),
  wheelSpeed: -1,
  tolerance: 10,
  preventDefault: true,
  onPress: self => {
    // on touch devices like iOS, if we want to prevent scrolling, we must call preventDefault() on the touchstart (Observer doesn't do that because that would also prevent side-scrolling which is undesirable in most cases)
    ScrollTrigger.isTouch && self.event.preventDefault()
  }
})
intentObserver.disable();

// handle the panel swipe animations
function gotoPanel(index, isScrollingDown) {
  animating = true;
  // return to normal scroll if we're at the end or back up to the start
  if ((index === swipePanels.length && isScrollingDown) || (index === -1 && !isScrollingDown)) {

        let target = index;
        gsap.to(target, {
        // xPercent: isScrollingDown ? -100 : 0,
        duration: 0.00,
        onComplete: () => {
          animating = false;
          isScrollingDown && intentObserver.disable();
        }
    });
    return
  }

//   target the second panel, last panel?
  let target = isScrollingDown ? swipePanels[index]: swipePanels[currentIndex];

  gsap.to(target, {
    xPercent: isScrollingDown ? 0 : 100,
    duration: 0.75,
    onComplete: () => {
      animating = false;
    }
  });
  currentIndex = index;
  console.log(index);

}

// pin swipe section and initiate observer
ScrollTrigger.create({
  trigger: ".swipe-section",
  pin: true,
  start: "top top",
  end: "+=1",
  onEnter: (self) => {
    intentObserver.enable();
    gotoPanel(currentIndex + 1, true);    
  },
  onEnterBack: () => {
    intentObserver.enable();
    gotoPanel(currentIndex - 1, false);
  }
})

$(document).ready(function(){

	$('#itemslider').carousel({ interval: 3000 });
	
	$('.carousel-showmanymoveone .item').each(function(){
	var itemToClone = $(this);
	
	for (var i=1;i<6;i++) {
	itemToClone = itemToClone.next();
	
	if (!itemToClone.length) {
	itemToClone = $(this).siblings(':first');
	}
	
	itemToClone.children(':first-child').clone()
	.addClass("cloneditem-"+(i))
	.appendTo($(this));
	}
	});
	});
	