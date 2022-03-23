$(document).ready(function () {
    // var btn = $('#menu-phone');
    var open = $('#open');
    var close = $('#close');
    var menu = $('#menu-wrap');

    open.click(function () {
        open.css('display', 'none');
        close.css('display', 'block');
        close.css('visibility', 'visible');
        $('#menu-wrap li').css('display', 'none');
        $(menu).slideDown({
            complete: function () {
                $(menu).css('display', 'flex');
                $('#menu-wrap li').css('display', 'flex');
                $('#menu-wrap li').css('transition-delay', '1s');
            }
        });

    });

    function menuClick() {
        close.css('display', 'none');
        $(menu).slideUp({
            complete: function () {
                menu.css('display', 'none');
            }
        });
        open.css('display', 'block');
    }

    $('#menu-wrap li').click(menuClick);

    close.click(menuClick);


    // FOOTER AT BOTTOM
    const header = document.getElementById("nav").offsetHeight;
    const footer = document.getElementById("footer").offsetHeight;
    const height = header + footer;
    var container = $(".inner-container");
    container.css("min-height", "calc(100vh - " + height + "px)");

    var heightbg = $(".height-bg");
    heightbg.css("height", "calc(100vh - " + height + "px)");

    //DISPLAY DROPDOWN MENU
    var dropdownMenu = $(".dropdown-menu");
    var dropdownElements = $(".dropdown-elements");

    dropdownMenu.hover(function () {
        dropdownElements.slideDown(300).css("display", "flex");
    }, function () {
        dropdownElements.slideUp(100);
    });

});



