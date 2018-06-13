/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* global google */

// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
};


//menu
$(function() {
      $( 'ul.nav li' ).on( 'click', function() {
            $( this ).parent().find( 'li.active1' ).removeClass( 'active1' );
            $( this ).addClass( 'active1' );
      });
});

