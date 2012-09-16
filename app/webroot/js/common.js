/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



$(document).ready(function() {
    $("#frmsignup").submit(function() {
        //alert('Handler for .submit() called.');
        
        var err = 0;
        var err_msg = '';
        var elem = "<span class='signup_error'>" + err_msg + "</span>";
        
        if($.trim($("#UserPassword").val()) == ''){
            err = 1;
            err_msg = 'Password can not blank'
            $("#UserPassword").after("<span class='signup_error'>" + err_msg + "</span>");
        }
        if($.trim($("#UserEmail").val()) == ''){
            err = 1;
            err_msg = 'Email can not blank'
            $("#UserEmail").after("<span class='signup_error'>" + err_msg + "</span>");
        }
        
        if($.trim($("#UserUsername").val()) == ''){
            err = 1;
            err_msg = 'Username can not blank'
            $("#UserUsername").after("<span class='signup_error'>" + err_msg + "</span>");
        }
//        else if($.trim($("#UserUsername").val()) != ''){            
//            var username = $.trim($("#UserUsername").val());
//            //alert($("#base_url").val()+'/users/check_username/' + username);
//            $.ajax({
//                url: $("#base_url").val()+'/users/check_username/' + username,
//                async: false,
//                success: function(data) {
//                    alert('hi');
//                    if(data == 'yes'){
//                        err = 1;
//                        err_msg = 'Username already exists. Please try another'
//                        $("#UserUsername").after("<span class='signup_error'>" + err_msg + "</span>");
//                    }                
//                }
//            });
//        }
        
        
        if(err == 1){
            return false;
        }
        return true;
    });
    
    //$("#editable_image").editFaceBook();

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
     
     $("#editable_image").mouseover(function(){
         $("#btn_img_edit").show();
     });
     
     
//     $("#btn_img_edit").click(function(){
//        //alert('inside');
//        var myUpload = $("#btn_img_edit").upload({
//            name: 'file',
//            action: '',
//            enctype: 'multipart/form-data',
//            params: {},
//            autoSubmit: true,
//            onSubmit: function() {},
//            onComplete: function() {},
//            onSelect: function() {}
//        });
//    });
    
//    $("#editable_image").mouseout(function(){
//        $("#btn_img_edit").hide();
//    });
//    $("#btn_img_edit").mouseover(function(){
//        $("#btn_img_edit").show();
//    });
    
    $("input[name=img_edit]").upload({
        name: 'file',
        method: 'post',
        action: $("#base_url").val()+'/books/edit_image/',
        enctype: 'multipart/form-data',
        params: {id:$("input[name=img_edit]").attr('id')},
        autoSubmit: false,
        onSubmit: function() {},
        onSelect: function() {},
        onComplete: function(data) {
          var mArray = data.split('#_#');
          alert(mArray[0]);
          if(mArray[1]){
              $("#editable_image").attr('src',mArray[1]);
          }
        }
    });
     
});