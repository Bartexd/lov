$(".hamburger").click(function () {
    $(this).toggleClass("active");
    $(".navigation").slideToggle();
});

var men = $("ul li:has(ul)");

men.addClass('hassub');
$("ul li:has(ul) > a").attr("href", "#");

var last = $("");

$("ul > .hassub").on('click',
    function (e) {
        var x;

        if ($(e.target).is('.hassub > a')) {
            x = $($(e.target).parent().parent()).children(".active").children("ul");
            if (x.parent()[0] !== ($(e.target).parent()[0])) {
                x.slideToggle("fast", function () {
                });
                x.parent().toggleClass("active");
            }


            $(e.target).parent().children('ul').slideToggle("normal", function () {
            });
            $(e.target).parent().toggleClass("active");

            e.stopImmediatePropagation();
        }
        if ($(e.target).is('.hassub > a > img.not_mobile') || $(e.target).is('.hassub > a > img.mobile')) {
            x = $($(e.target).parent().parent().parent()).children(".active").children("ul");
            if (x.parent()[0] !== ($(e.target).parent().parent()[0])) {
                x.slideToggle("fast", function () {
                });
                x.parent().toggleClass("active");
            }

            $(e.target).parent().parent().children('ul').slideToggle("normal", function () {
            });
            $(e.target).parent().parent().toggleClass("active");


            e.stopImmediatePropagation();
        }
    });

var hassub = $(".hassub");

hassub.children("a").prepend('<img class="mobile" src="http://iconshow.me/media/images/ui/ios7-icons/png/128/plus-round.png" alt="" />');
hassub.children("a").append('<img class="not_mobile" src="https://d30y9cdsu7xlg0.cloudfront.net/png/10897-200.png" alt="" />');

// //TODO REWRITE TO DOM ELEMENTS JS