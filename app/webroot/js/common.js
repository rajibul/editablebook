/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



$(document).ready(function() {
    //$('#editable_image').editFaceBook();

//    $(".editable_text" ).eip( "http://localhost/editablebook/books/edit", {
//        form_type: "textarea"
//    } );
    $('.editable_text').editable($("#base_url").val()+'/books/edit', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         //indicator : '<img src="img/indicator.gif">',
         tooltip   : 'Click to edit...'
     });
});