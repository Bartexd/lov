// var now = 0;
// var slider = $(".slider");
// var imgCount = $(".slider > div div").length - 1;
// var imgSize = slider.width();
// var interval = 5000;
//
// $(".slider > div").css("width", imgSize + "px");
//
// function gInit() {
//     now += 1;
//
//     if (now > imgCount) {
//         now = 0;
//     }
//
//     slider.animate({scrollLeft: imgSize * now}, 500);
//     console.log("now: " + now + "  scroll: " + imgSize*now);
// }
//
// var init = setInterval(gInit, interval);
//
// slider.mouseover(function () {
//     clearInterval(init);
// });
// slider.mouseout(function () {
//     init = setInterval(gInit, interval);
// });