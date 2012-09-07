/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



$(document).ready(function() {
    //$('#editable_image').editFaceBook();

//    $(".editable_text" ).eip($("#base_url").val()+'/books/edit', {
//        form_type: "textarea"
//    } );
    $('.editable_text').editable($("#base_url").val()+'/books/edit', {
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         tooltip   : 'Click to edit...',
         cssclass  : 'inherited'
     });
     
     $(".publish").click(function() {
         //alert(this.id);
         $.ajax({
            url: $("#base_url").val()+'/books/pdf/' + this.id,
            success: function(data) {
                $('.result').html(data);
                alert(data);
            }
        });
     });
});