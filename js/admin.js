$(document).ready(function(){
	$("a.mobile").click(function(){
		$(".sidebar").slideToggle('fast');
	});
	window.onresize = function(event){
		if($(window).width() > 480){
			$(".sidebar").show();
		}
	};
	$('#nav li').first().addClass("active").find('ul').show();
	var i=0;
	$('#nav > li > a').click(function(){
		if ($(this).attr('class') != 'active'){
			if (i==0) {
				$('#nav li ul').slideUp();
				i=i+1;
			}else{
				$(this).next().slideToggle();
				i=i-1;
			}
			$('#nav li a').removeClass('active');
			$(this).addClass('active');
		}else{}
	});
});
function openNav(){
	document.getElementById("mysidebar").style.width = "25%";
	document.getElementById("mycontent").style.marginLeft = "25%";
	document.getElementById("open").style.display= "none";
}
function closeNav(){
	document.getElementById("mysidebar").style.width = "0";
	document.getElementById("mycontent").style.marginLeft = "0";
	document.getElementById("open").style.display = "block";
}