$(document).ready(function() {
	$(function(){
        $('.pb_pause').hide();
        var nplayed=true;
        var showed=true;
        $('.header_burger').click(function(){
            
        });
        $('.slide_left').click(function(){
            var clist_lcord=$('.card_list').position().left;
            if(clist_lcord!=0){$('.card_list').css({"left":clist_lcord+350});}
        });
        $('.slide_right').click(function(){
            var clist_width=$('.card_list').width();
            var clist_lcord=$('.card_list').position().left;
            var getdata=$('.getdata').attr("data-count");
            var limit = getdata*400;
            if(clist_width<limit){
            $('.card_list').css({"left":clist_lcord-350});}
        });
        $('.player_button_icon, .player_button_icon_pause').click(function(){
            if(nplayed){
                $('.pb_play').hide(300);
                $('.pb_pause').show(300);
                nplayed=false;
            }
            else{
                $('.pb_pause').hide(300);
                $('.pb_play').show(300);
                nplayed=true;
            }
        });
        $('.card_list_card').click(function(){
            var getsonger=$(this).attr("data-tracksonger");
            var getsong=$(this).attr("data-tracksong");
            var getbg=$(this).attr("data-trackbg");
            var getlink=$(this).attr("data-tracklink");
            $('#songer').html(getsonger);
            $("#song").html(getsong);
            $('#get_flink').attr("data-finallink",getlink);
        });
        $('.list_stripe_1').click(function(){
            $('#list').toggleClass('clicked');
            $('#blur').toggleClass('showed');
        });
        $('#blur').click(function(){
            $(this).removeClass('showed');
            $('#list').removeClass('clicked');
            $('body').removeClass('slided');
        });
    });
});