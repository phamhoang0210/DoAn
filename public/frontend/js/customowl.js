/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    $('.custom1').owlCarousel({
        animateOut: 'slideOutDown',
        animateIn: 'flipInX',
        items:1,
        margin:0,
        stagePadding:30,
        smartSpeed:350,
        autoplay:true,
        autoplayTimeout:4000,
        autoplayHoverPause:false,
        loop:true
    });
});

$(document).ready(function(){
  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:30,
    nav:true,
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
   });
});
