//adding classes for main ul
//$('.top_menu').addClass('nav');
//$('.top_menu').addClass('navbar-nav');
//$('.top_menu').addClass('navbar-right');
$('.top_menu li').addClass('navbar-right');
//adding classes to li that has submenu
$('.top_menu .sub-menu').parent().addClass('dropdown');
$('.sub-menu').prev().attr('data-toggle','dropdown');
//$('.top_menu li a:not(.sub-menu li a)').addClass('rem14');
$('.top_menu .sub-menu').prev().append('&nbsp;<span class="caret"></span>');
//adding class to sub ul
$('.top_menu .sub-menu').addClass('dropdown-menu');
/*adding list-unstyled*/
$('.ftt ul').addClass("list-unstyled");
/*adding classes to single page*/
$('.single-para img').addClass("img-responsive");
$('.wp-caption').removeAttr('style');
//adding classes to link page
$('.links ol li a').addClass('title2');
$('.links ul li').addClass('para1');
/*small_slidshow*/
	 var window_width;
	 var outer;
	 var child_width;
	 var a=1;
$(document).ready(function(){
	function gallery(){
		//belongs to report
		if($(window).width()<441 ){
		$('.r-img').removeClass('col-xs-3');
		$('.r-img').addClass('col-xs-4');
		}else{
		$('.r-img').removeClass('col-xs-4');
		$('.r-img').addClass('col-xs-3');
		}
		//belongs to gallery
		mmm=$('.slide img').height();
		ccc=(mmm/2)-9.5;
		$('.right-b,.left-b').css({height:''+mmm+'px',padding:''+ccc+'px 0 0 3px'});
					window_width=$(window).width();
					if(window_width>=1200 ){
					 	outer=$(".outer").width();
	 				 	child_width=outer/4;
	 					$('.slide').css({width:child_width+'px'});
					}
					 else if(window_width<1200 && window_width>991 ){
					 	outer=$(".outer").width();
	 				 	child_width=outer/4;
	 					$('.slide').css({width:child_width+'px'});
					}
				 else if(window_width<992 && window_width>770 ){
					 	outer=$(".outer").width();
	 				 	child_width=outer/4;
	 					$('.slide').css({width:child_width+'px'});
					}
				else if(window_width<771 && window_width>663 ){
					 	outer=$(".outer").width();
	 				 	child_width=outer/4;
	 					$('.slide').css({width:child_width+'px'});
					}
				else if(window_width>570 && window_width<664 ){
						outer=$(".outer").width();
	 				 	child_width=outer/3;
	 					$('.slide').css({width:child_width+'px'});
					}
			else if(window_width<575 && window_width>475  ){
						outer=$(".outer").width();
	 				 	child_width=outer/2;
	 					$('.slide').css({width:child_width+'px'});
					}
					else if(window_width<=475){
						outer=$(".outer").width();
	 				 	child_width=outer/1;
	 					$('.slide').css({width:child_width+'px'});
					}
		 }
		 setInterval(function(){
			 gallery();
			 },100);
			$(".left-b").click(function(){
				find_inner=$(this).parent().find('.inner');
	 			var nchild=find_inner.children().length;
	 			var b=nchild;
	 			
				if(a<=nchild && b >=1){
					find_inner=$(this).parent().find('.inner');
					first_child=$(this).parent().find('.inner div:first-child');
					find_inner.animate({marginLeft:'-'+child_width+'px'},function(){
					first_child.appendTo(find_inner);
					find_inner.css({marginLeft:'0px'});
					});
					a++;
					b--;
					}
				});
			$(".right-b").click(function(){
				find_inner=$(this).parent().find('.inner')
	 			var nchild=find_inner.children().length;
	 			var b=nchild;
						if(a>1 && b<=nchild){
						find_inner=$(this).parent().find('.inner');
						last_child=$(this).parent().find('.inner div:last-child');
								find_inner.css({marginLeft:'-'+child_width+'px'});
								last_child.prependTo(find_inner);
								find_inner.animate({marginLeft:'0px'});
								a--;
								b++;
							}
						});
		/*caricator*/
		/*-----------------------------*/
		setInterval(function(){
			 car();
			 },100);
		var ot,ss;
		function car(){
			ot=$('.ot').width();
			ss=$('.s').css({width:''+ot+'px'});
			
			}
		 var a3=1;
			$(".lft").click(function(){
				find_inr=$(this).parent().find('.inr')
	 			cr=find_inr.children().length;
	 			b3=cr;
				if(a3<=cr && b3 >=1){
				first_child=$(this).parent().find('.inr div:first-child');
					find_inr.animate({marginLeft:'-'+ot+'px'},function(){
						first_child.appendTo(find_inr);
						find_inr.css({marginLeft:'0px'});
						});
						a3++;
						b3--;
							}
					
				});
		
			$(".rht").click(function(){
				find_inr=$(this).parent().find('.inr')
	 			cr=find_inr.children().length;
	 			b3=cr;
						if(a3>1 && b3<=cr){
						last_child=$(this).parent().find('.inr div:last-child');
								find_inr.css({marginLeft:'-'+ot+'px'});
								last_child.prependTo(find_inr);
								find_inr.animate({marginLeft:'0px'});
								a3--;
								b3++;
						}
								
						});
		//----------belongs to reports-----------
		var n;
		var d;
	$('.reports li:first-child a').css({'background-color':'#000','color':'#FFF','border-left':'1px solid #FFF'});
		$('.reports li a').click(function(){
			n=$(this).attr('num');
			$('.reports li a').css({'background-color':'#FFF','color':'#2a6496','border-left':'1px solid #000'});
			$(this).css({'background-color':'#000','color':'#FFF','border-left':'1px solid #FFF'});
			$(".reprot").fadeOut(900,'linear').delay(600);
			$("[data="+n+"]").fadeIn(900,'linear');
					
			});
//---make the menu fixed when scrolling---
 $(window).scroll(function () { 
    console.log($(window).scrollTop());
    
    if ($(window).scrollTop() > 168)
		{
      		$('.navbar').addClass('navbar-fixed-top');
      		
    	}
    if($(window).scrollTop() < 169) 
		{
      		$('.navbar').removeClass('navbar-fixed-top');
      		
    	}
	if(!($("#st-container").hasClass("st-menu-open"))){
		$("#st-container").removeClass("st-effect-9");
		}
  });
/*--------for right sidebar----------*/
	 	var cont;
		setInterval(function(){
			 	panel();
			 	},100);
	function panel(){
	//belongs to menu
		if($('#header-navbar').hasClass('navbar-fixed-top')){
			$(".navbar-nav.navbar-right:last-child").css({marginRight:'0px'});
			}
		else{
			$(".navbar-nav.navbar-right:last-child").css({marginRight:'-15px'});
		}
		
				cont=$('.bg').height()-$(".hdr").height();
					$('#st-container').css({minHeight:''+cont+'px'})
					$('#main_content').css({minHeight:''+cont+'px'})
					$('.st-pusher').css({minHeight:''+$('.bg').height()+'px'})
				}//panel
				
	//for mobile
	$('aside').hammer().on("dragleft", function(event) {
					$('.st-effect-9').removeClass('st-menu-open');
				});
				
	     });//document ready
		 //Add hover event to menu instead of click event
		 jQuery('ul.nav li.dropdown').hover(function() {
				if($(window).width()>992){
					jQuery(this).find('.dropdown-menu').css({display:'block'});}
				else{
						jQuery(this).find('.dropdown-menu').removeAttr('style');
					}
				},function() {
					if($(window).width()>992){
						jQuery(this).find('.dropdown-menu').css({display:'none'});}
					else{
						jQuery(this).find('.dropdown-menu').removeAttr('style');
						}
				});
				
		
				 

	