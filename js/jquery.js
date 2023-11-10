function checkVisible() {
	var windowHeight = $(window).height();
	var windowBottom = $(window).scrollTop() + windowHeight;

	$(".fade-in-section").each(function() {
		var sectionTop = $(this).offset().top;
		var sectionBottom = sectionTop + $(this).outerHeight();

		if (sectionTop <= windowBottom && sectionBottom >= $(window).scrollTop()) {
			$(this).addClass("is-visible");
		}
	});
}

$(window).on("scroll", function() {
	checkVisible();
});


let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("slider-item");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 3500); 
}