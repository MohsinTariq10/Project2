$( ".login" ).hide();
$(".row-color").on("mouseover", function(){
	$(".login-img").toggleClass("hovered");
	$(".login").toggleClass("hoveredL");
}
).on("mouseout",function(){
	$(".login-img").toggleClass("hovered");
	$(".login").toggleClass("hoveredL");
});


 var $document = $(document);
 var $outerEle = $('#navspan');
 var $Nav = $('#theNav');
 var $navHeight = $Nav.outerHeight() + 20;
 var $element = $("#rowHead").outerHeight() + $navHeight -20;

 var check=0;
$document.scroll(function() {
  if ($document.scrollTop() >= $element) {
		if(check==0){
			$outerEle.append('<div id="new" style="height:' + $navHeight +'px" ></div>')
		    $Nav.addClass("navbar-fixed-top");
		    $Nav.hide();
		    $Nav.fadeIn(600);
		
		    check=1;
		}
	  } else {
		  	if(check==1){
		  	$('#new').remove();
		    $Nav.removeClass("navbar-fixed-top");
		    check=0;
		}
	  }
});
