//STICKY MENU 

// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};
// Get the navbar
var navbar = document.querySelector(".navbar");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
	if (window.pageYOffset >= 20) {
		navbar.classList.add("sticky")
	} else {
		navbar.classList.remove("sticky");
	}
}

//SLICK SCROLL SLIDER 

$(document).ready(function () {
	$('.news-slider').slick({
		dots: false,
		arrows: false,
		autoplay: true,
		slidesToShow: 1,
		slidesToScroll: 1
	  });
});

// MOBILE MENU LOGIC

$(document).ready(function(){
	$(".burger-mobile").click(function () {
		$('.collapse').toggleClass('show');
		$('.el__nav-bar').toggleClass('show');
		$(".burger-mobile").toggleClass('open');
	});
});

