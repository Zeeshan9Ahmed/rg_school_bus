

 //Add Class Sticky On Scroll
 $(window).on('scroll', function (event) {
  var scroll = $(window).scrollTop();
  if (scroll < 20) {
    $(".dt").removeClass("sticky");
    } 
    else {
        $(".dt").addClass("sticky");
    }
});


// ONLOAD ANIMATION START
$(window).on('load', function () {
  $(".loader").fadeOut("slow");
});    
// ONLOAD ANIMATION END









// digital clock jqurey

function showclock() {
  let today = new Date();
  let hours = today.getHours();
  let mins = today.getMinutes();
  let seconds = today.getSeconds();
  const addZero = num => {
    if(num < 10) { return '0' + num };
    return num;
  }
  $('#hour').text(addZero(hours));
  $('#min').text(addZero(mins));
  $('#second').text(addZero(seconds));
}
setInterval(showclock, 1000);




