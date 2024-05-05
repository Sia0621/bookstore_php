 var price=document.getElementsByClassName('cart_price');
 var qty=document.getElementsByClassName('cart_qty');

 function buttonClick(){
      for (var i = 0; i < price.length; i++) {
          console.log(price[i])
          console.log(qty[i])
      }
 }


 let currentSlide = 0;
//create two objects: slides
const slides = document.querySelectorAll(".slide")
console.log(slides);

//init() is a named function
//function() is an anonymous (self-invoking) funtion (function without name)
//alternatively you can use arrow funtion to make the code lighter
function init(n) {
  slides.forEach(function (slide, index) {
          slide.style.display = "none"; //Element will not be displayed
      });
  slides[n].style.display = "block"; //Element is rendered as a block-level element
}

//The DOMContentLoaded fires when the DOM content is loaded, 
//without waiting for images and stylesheets to finish loading.
document.addEventListener("DOMContentLoaded", init(currentSlide))

function next() {
  if(currentSlide >= slides.length - 1){
      currentSlide = 0;
  }else{
      currentSlide++;
  }
  //alternatively you can use conditional (ternary) operator
  //currentSlide >= slides.length - 1 ? currentSlide = 0 : currentSlide++;
  init(currentSlide);
}

function prev() {
  if(currentSlide <= 0){
      currentSlide = slides.length - 1;
  }else{
      currentSlide--;
  }
  //alternatively you can use conditional (ternary) operator
  //currentSlide <= 0 ? currentSlide = slides.length - 1 : currentSlide--;
  init(currentSlide);
}

//click event. When you click the slides move 
document.querySelector(".next").addEventListener('click', next)

document.querySelector(".prev").addEventListener('click', prev)

//Timing Events. The setInterval() method repeats a given function at every given time-interval.
setInterval(next, 5000);

dots.forEach(function (dot, i) {
        dot.addEventListener("click", function () {
            console.log(currentSlide);
            init(i);
            currentSlide = i;
        });
    })


