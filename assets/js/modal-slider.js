// initialize slideIndex with 0 as you want to show the first slide first
let slideIndex = 0;

// creating function for showing slides
function showModalSlides(index){
    // lets select all the slides and dots using querySelectorAll method
    let slides = document.querySelectorAll(".slide");

    // if slide index value is greater than length of slides then jump to 1st slide
    if (index >= slides.length){
        slideIndex = 0;
        // if we want to jump at the last of the slide in case the user is at the first one
    } else if (index < 0) {
        slideIndex = slides.length - 1;
    } else{
        slideIndex = slideIndex;
    }

    // before showing slides we must hide all the slides and remove active-dots class using for loop
    for (let i = 0; i < slides.length; i++){
        // hide slide elements
        slides[i].style.display = "none";
    }
    // show the slide we want and set the dot class active-dot
    slides[slideIndex].style.display = "block";
}
