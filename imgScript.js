// slideShow();

// slideShow = () => {
//     var i;
//     var slides = document.getElementsByClassName('slides');
//     if(i=0, i < slides.length, i++) {
//         slides[i].style.display = 'none';
//     }
//     else if(i=0, i > slides.length, i++) {
//         i = 1;
//     }
//     slides[i-1].style.display = 'block';
//     setTimeout(slideShow,2000);
// }

//OR 
var slideIndex = 0;
showslides();
function showslides() {
    var i;
    var slides = document.getElementsByClassName('slides');
    for(i=0; i < slides.length; i++) {
        slides[1].style.display = 'none';
    }
    slideIndex ++;
    if(slideIndex > slides.length) {
        slideIndex = 1;
    };
    slides[slideIndex -1].style.display = 'block'
    setTimeout(showslides, 2000);
}