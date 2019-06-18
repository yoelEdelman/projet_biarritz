// initialize slideIndex with 0 as you want to show the first slide first
let slideIndex = 0;


// creating function for showing slides
function showModalSlides(index){
    // lets select all the slides and dots using querySelectorAll method
    let slides = document.querySelectorAll(".slide");
    // let dots = document.querySelectorAll(".dot-navigation");




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
        // hide dots active-dot class
        // dots[i].classList.remove("active-dot");
    }
    // show the slide we want and set the dot class active-dot
    slides[slideIndex].style.display = "block";
    // dots[slideIndex].classList.add("active-dot");

}


// // select the previous arrow element and add a click event using addEventListener method
// document.querySelector("#arrow-prev").addEventListener("click", function(){
//     // decrement slideIndex value to go to previous slide
//     showSlides(--slideIndex);
// });
//
// // select the next arrow element and add a click event using addEventListener method
// document.querySelector("#arrow-next").addEventListener("click", function(){
//     // decrement slideIndex value to go to previous slide
//     showSlides(++slideIndex);
// });
//
// // select all the dots using querySelectorAll and iterate over each one using forEach method
// document.querySelectorAll(".dot-navigation").forEach(function(element){
//     element.addEventListener("click", function(){
//         // make a real array using slice method from array proptotype followed by call method
//         let dots = Array.prototype.slice.call(this.parentElement.children);
//         // make a dot index letiable of the array we have created above
//         let dotIndex = dots.indexOf(element);
//
//         // save slideIndex value to dot index
//         showSlides(slideIndex = dotIndex);
//     });
// });

// lets set our slide automatic using setInterval method



//
// setInterval(function(){
//     showSlides(++slideIndex);
// }, 5000);