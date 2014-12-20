$( ".login" ).hide();
$(".row-color").on("mouseover", function(){
	$(".login-img").toggleClass("hovered");
	$(".login").toggleClass("hoveredL");
}
).on("mouseout",function(){
	$(".login-img").toggleClass("hovered");
	$(".login").toggleClass("hoveredL");
});