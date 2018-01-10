function empty(e) {
    switch (e) {
        case "":
        case 0:
        case "0":
        case null:
        case false:
        case typeof this == "undefined":
            return true;
        default:
            return false;
    }
}
function createCookie(name, value, days) {
    var expires;
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        expires = "; expires="+date.toGMTString();
    }
    else {
        expires = "";
    }
    document.cookie = name+"="+value+expires+"; path=/";
}

// Read cookie
function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ') {
            c = c.substring(1,c.length);
        }
        if (c.indexOf(nameEQ) === 0) {
            return c.substring(nameEQ.length,c.length);
        }
    }
    return null;
}

// Erase cookie
function eraseCookie(name) {
    createCookie(name,"",-2);
}

var x = readCookie("font-size");
if (empty(x)) x = 0;
createCookie("font-size", x, 366);

$("*").css("font-size", 100+(x * 1) + "%");

$("#font-plus").on("click", function(){
    var fs = $("*").css("font-size");
    x++;
    if (x <= 3) {
        if (x === 0) $("*").css("font-size", "100%");
        else $("*").css("font-size", 100+(x) + "%");
    }else x--;
    createCookie("font-size", x, 366)
});
$("#font-minus").on("click", function(){
    var fs = $("*").css("font-size");
    x--;
    if (x >= -3) {
        if (x === 0) $("*").css("font-size", "100%");
        else $("*").css("font-size", 100+(x) + "%");
    }else x++
    createCookie("font-size", x, 366)
});