
$(window).scroll(function () {
  var sticky = $('.sticky'),
    scroll = $(window).scrollTop();

  // if (scroll >= 200) sticky.addClass('fixed');
  // else sticky.removeClass('fixed');

  var stickyBottom = $('.bottomSticky'),
    scrollBottom = $(window).scrollTop();

  if (scrollBottom > 450) stickyBottom.addClass('bottomFixed');
  else stickyBottom.removeClass('bottomFixed');
});


$(".closeSticky").click(function(){
  // alert("The paragraph was clicked.");
  var stickyBottom = $('.bottomSticky');
  // stickyBottom.removeClass('bottomFixed');
  stickyBottom.addClass('displayNone');
});

// ---- mouseover &&  mouseout   ----- event

$(document).ready(function(){
 
$(".ListItemHover li").mouseover(function () {
  var mystring = "How do I get a long text string";
    mystring = mystring.substring(0, 20); // Display only 10 characters of a long string?
  $(this).css({
    "background-color": "red",
    "transition": "all linear .4s",
    // "margin-left": "-245px"
    // "height" : "55px"
  // }).text(mystring);
  });
});

$(".ListItemHover li").mouseout(function () {
  var mystring = "Previous do I get a long text string";
    mystring = mystring.substring(0, 20);
  $(this).css({
    "background-color": "white",
    "transition": "all linear .4s",
    // "margin-left": "0"
    // "height" : "0"
  });
});


// ------------- Add & Remove active class ------ (click) event

$(".activeClass").click(function () {
  $(".activeClass").removeClass("active");
  // $(".tab").addClass("active"); // instead of this do the below 
  $(this).addClass("active");   
});



});














