/*Main menu*/
$(document).ready(function(){
     $("#main_menu ul.menu ul").addClass('round_down') ;
});


//tabber
$(function(){
	$('div#tabber div#tabber_switcher a')
	.click(function(){
		tabbox = 'div#tabber'; 
		tabs = 'div.tabber_tab'; 
		actclass = 'active'; 
		speed = 500; 
		thisLink = $(this);
		if($(this.hash).css('display')=='none'){
			thisLink.parent().parent().find('a').removeClass(actclass);
			thisLink
			.addClass(actclass)
			.parents(tabbox)
			.find(tabs).hide().end()
			.find(this.hash).animate({opacity:'show'},speed);
		}
		return false;
	});
});

$(function(){
	$('div#tabber1 div#tabber_switcher a')
	.click(function(){
		tabbox = 'div#tabber1'; 
		tabs = 'div.tabber_tab'; 
		actclass = 'active'; 
		speed = 500; 
		thisLink = $(this);
		if($(this.hash).css('display')=='none'){
			thisLink.parent().parent().find('a').removeClass(actclass);
			thisLink
			.addClass(actclass)
			.parents(tabbox)
			.find(tabs).hide().end()
			.find(this.hash).animate({opacity:'show'},speed);
		}
		return false;
	});
});




//latest uc
$(document).ready(function(){
	$('div.uc_latest_tab_swicher span a,div.uc_popular_tab_swicher span a,div.new_user_tab_swicher span a,div.uc_random_tab_swicher span a,div.mod_userfiles_tab_swicher span a')
	.click(function(){
		tabbox = '.uc_latest_list,.uc_popular_list,.new_user_list,.uc_random_list,.mod_userfiles_list'; 
		tabs = '.uc_latest_tab,.uc_popular_tab,.new_user_tab,.uc_random_tab,.mod_userfiles_tab'; 
		actclass = 'active'; 
		speed = 500; 
		thisLink = $(this);
		if($(this.hash).css('display')=='none'){
			thisLink.parent().parent().find('a').removeClass();
			thisLink
			.addClass(actclass)
			.parents(tabbox)
			.find(tabs).hide().end()
			.find(this.hash).animate({opacity:'show'},speed);
		}
		return false;
	});
});



//colapced blocks
 jQuery.cookie = function (key, value, options) {
        if (arguments.length > 1 && (value === null || typeof value !== "object")) {
            options = jQuery.extend({}, options);
            if (value === null) {
                options.expires = -1;
            }
            if (typeof options.expires === 'number') {
                var days = options.expires, t = options.expires = new Date();
                t.setDate(t.getDate() + days);
            }
            return (document.cookie = [
                encodeURIComponent(key), '=',
                options.raw ? String(value) : encodeURIComponent(String(value)),
                options.expires ? '; expires=' + options.expires.toUTCString() : '',
                options.path ? '; path=' + options.path : '',
                options.domain ? '; domain=' + options.domain : '',
                options.secure ? '; secure' : ''
            ].join(''));
        }
        options = value || {};
        var result, decode = options.raw ? function (s) { return s; } : decodeURIComponent;
        return (result = new RegExp('(?:^|; )' + encodeURIComponent(key) + '=([^;]*)').exec(document.cookie)) ? decode(result[1]) : null;
    };


    $(document).ready(function(){
        $(".usr_wall_header").addClass("active");
        var l = $('.usr_wall_header').length;
        var blocks = $("div.toogled");
        for (c=0;c<=l;c++){
            var cvalue = $.cookie('blocks' + c);
            if ( cvalue == 'closed' + c ) {
                $(blocks).eq(c).css({display:"none"});
                $(blocks).eq(c).prev().removeClass('active').addClass('inactive');
            };
        };
        $(".usr_wall_header.active").toggle(
            function () {
                var num = $("div.usr_wall_header").index(this);
                var cookieName = 'blocks' + num;
                var cookieValue = 'closed' + num;
                $(this).next("div.toogled").slideUp(300);
                $(this).removeClass('active');
				$(this).addClass("inactive");
                $.cookie(cookieName, cookieValue, { path: '/', expires: 10 }); 
            },
            function () {
                var num = $("div.usr_wall_header").index(this);
                var cookieName = 'blocks' + num;
                $(this).next("div.toogled").slideDown(300);
                $(this).addClass("active");
				$(this).removeClass('inactive');				
                $.cookie(cookieName, null, { path: '/', expires: 10 });
            }
        );

        $(".usr_wall_header.inactive").toggle(
            function () {
                var num = $("div.usr_wall_header").index(this);
                var cookieName = 'blocks' + num;
                $(this).next("div.toogled").slideDown(300);
                $(this).addClass("active");
                $(this).removeClass('inactive');       
                $.cookie(cookieName, null, { path: '/', expires: 10 });
            },
            function () {
                var num = $(".usr_wall_header").index(this);
                var cookieName = 'blocks' + num;
                var cookieValue = 'closed' + num;
                $(this).next("div.toogled").slideUp(300);
                $(this).removeClass('active');
				$(this).addClass("inactive");
                $.cookie(cookieName, cookieValue, { path: '/', expires: 10 }); 
            }
        );

    });

	
//cart_buttons
$(document).ready(function() {
	var opacity = 0.7, endopacity = 1.0, duration = 250;
    $('div#cart_buttons div#cart_buttons1 a:first').addClass('button1').css('opacity', '0.7');
	$('div#cart_buttons div#cart_buttons1 a:last').addClass('button2').css('opacity', '0.7');
    $('div#cart_buttons2 a:first').addClass('button1').css('opacity', '0.7');
    $('div#cart_buttons div#cart_buttons2 a:last').addClass('button2').css('opacity', '0.7');      
	$('div#cart_buttons a,div#cart_buttons2 a').hover(function() {
		$(this).fadeTo(duration,endopacity);
		}, function() {
		$(this).fadeTo(duration,opacity);
		}
	);
});






