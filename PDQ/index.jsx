import React from 'react';
import ReactDOM from 'react-dom';
import {Label, Well, Image} from 'react-bootstrap';

var wrap          = document.querySelector('.wrap');
var wrapH         = wrap.getBoundingClientRect();
var bannerHeight  = wrapH.top;

$(window).scroll(function(){
  
    if ($(window).scrollTop() >= bannerHeight) {
       $('header').addClass('fixed-header');
       $('.content').addClass('content-buffer');
    }
    else {
       $('header').removeClass('fixed-header');
        $('.content').removeClass('content-buffer');
    }
});


// Hide Header on on scroll down
var didScroll;
var headerFixed;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $('header').outerHeight();

$(window).scroll(function(event){
    didScroll = true;
});

$(window).scroll(function(){
    var summ = bannerHeight + 40;
    if ($(window).scrollTop() >= summ) {
      headerFixed = true;
    }
    else {
      headerFixed = false;
    }
});


setInterval(function() {
  if (didScroll && headerFixed) {
      hasScrolled();
      didScroll = false;
  }
}, 250);


function hasScrolled() {
    var st = $(this).scrollTop();
    
    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
        return;
    
    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
        $('header').removeClass('nav-down').addClass('nav-up');
    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
            $('header').removeClass('nav-up').addClass('nav-down');
        }
    }
    
    lastScrollTop = st;
}