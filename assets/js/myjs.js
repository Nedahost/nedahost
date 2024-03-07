
document.addEventListener('DOMContentLoaded', function() {
  const accordionItems = document.querySelectorAll('.accordion-item');

  // Κάνετε το πρώτο accordion-item ανοιχτό
  const firstAccordionItem = accordionItems[0];
  const firstTitle = firstAccordionItem.querySelector('.accordion-title');
  const firstContent = firstAccordionItem.querySelector('.accordion-content');

  firstTitle.classList.add('active');
  firstContent.classList.add('active');

  accordionItems.forEach(item => {
    const title = item.querySelector('.accordion-title');
    const content = item.querySelector('.accordion-content');

    title.addEventListener('click', function() {
      accordionItems.forEach(otherItem => {
        if (otherItem !== item) {
          otherItem.querySelector('.accordion-content').classList.remove('active');
          otherItem.querySelector('.accordion-title').classList.remove('active');
        }
      });
      
      content.classList.toggle('active');
      title.classList.toggle('active');
    });
  });
});



$(document).ready(function() {
$('.readmore a').on('click', function(event) {
event.preventDefault();

// Προσαρμόστε το ύψος που θέλετε να κατεβείτε
var targetOffset = $('.outerservices').offset().top;

// Εκτελέστε το smooth scroll
$('html, body').animate({
  scrollTop: targetOffset
}, 1000); // Χρόνος κύλισης σε milliseconds (εδώ είναι 1 δευτερόλεπτο)

});
});





  document.addEventListener('DOMContentLoaded',function(event){
// array with texts to type in typewriter
var dataText = [ "Web Development.", "Digital Marketing", "S.E.O." ,"Nedahost"];

// type one text in the typwriter
// keeps calling itself until the text is finished
function typeWriter(text, i, fnCallback) {
// chekc if text isn't finished yet
if (i < (text.length)) {
// add next character to h1
document.querySelector(".headtitle").innerHTML = text.substring(0, i+1) +'<span aria-hidden="true"></span>';

// wait for a while and call this function again for next character
setTimeout(function() {
typeWriter(text, i + 1, fnCallback)
}, 100);
}
// text finished, call callback if there is a callback function
else if (typeof fnCallback == 'function') {
// call callback after timeout
setTimeout(fnCallback, 700);
}
}
// start a typewriter animation for a text in the dataText array
function StartTextAnimation(i) {
if (typeof dataText[i] == 'undefined'){
setTimeout(function() {
StartTextAnimation(0);
}, 20000);
}
// check if dataText[i] exists
if (i < dataText[i].length) {
// text exists! start typewriter animation
typeWriter(dataText[i], 0, function(){
// after callback (and whole text has been animated), start next text
StartTextAnimation(i + 1);
});
}
}
// start the text animation
StartTextAnimation(0);
});
