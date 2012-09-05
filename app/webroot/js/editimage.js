/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$.fn.editFaceBook = function(options) {
    var opts = jQuery.extend({}, jQuery.fn.editFaceBook.defaults, options);
    return this.each(function() {
        //here is the div/image as 1 element
        $currentdivorimage = jQuery(this);
        $currentdivorimage.width(opts.width);
        $currentdivorimage.css('position', 'relative');
        $divouter = $('<div></div>').appendTo($currentdivorimage);
        $divouter.bind('mouseout', opts.hideedit);
        $divouter.bind('mouseover', opts.showedit);
        var $link = $('<a></a>').appendTo($divouter)
        .attr('href', opts.linkurl);
        $('<img/>').addClass('profileimage')
        .width(opts.width)
        .height(opts.height)
        .attr('src', opts.imgurl)
        .appendTo($link);
     
        var $secondlink = $('<a class="edit_profilepicture hidden" title="Change Picture" href="#">Change Picture</a>')
        .insertAfter($link)
        .bind('mouseover', opts.showeditpencil)
        .bind('mouseout', opts.hideeditpencil)
        .attr('href', opts.linkediturl)
        .bind('click', opts.editlinkclick)
        ;
           
            
     
        $('<span></span').appendTo($secondlink)
        .addClass('edit_profilepicture_icon')
        .html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
            
    //<span class="edit_profilepicture_icon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
    });
};
     
jQuery.fn.editFaceBook.defaults = {
    linkurl: 'www.dummy.com',
    linkediturl : '/edit.aspx',
    width: 250,
    height: 327,
    imgurl: 'images/upload/noAvatarPicL.jpg',
    editlinkclick:function(){
    },
    showedit: function() {
        $currentelement = jQuery(this);
        $currentelement.find('.edit_profilepicture').removeClass('hidden');
    },
    hideedit: function() {
        $currentelement = jQuery(this);
        $currentelement.find('.edit_profilepicture').addClass('hidden');
    },
    showeditpencil: function() {
        $currentelement = jQuery(this);
        $currentelement.find('.edit_profilepicture_icon').css('background-position', 'right bottom').css('border', '0px')
    },
    hideeditpencil: function() {
        $currentelement = jQuery(this);
        $currentelement.find('.edit_profilepicture_icon').css('background-position', 'right top');
    }
};
