jQuery(document).ready(function() {
    $('.room').mouseenter(function(){
        var room_name = $(this).attr('room_name');
        $(this).html('<span class="room_name">'+room_name+'</span>');
    });
    
    $('.room').mouseleave(function(){
        $(this).html('');
    });
});