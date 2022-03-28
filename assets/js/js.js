$(document).ready(function () {

    //on reload not to resubmit form
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }


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

    function removeHeight() {
        if ($(window).width() < 750) {
            $('.contacts').removeClass('height-bg');
            $('.contacts').attr('style', '');
        }
        else {
            $('.contacts').css("height", "calc(100vh - " + height + "px)");
        }
    }

    $(window).resize(function () {
        removeHeight();
    });

    removeHeight();

    //modalBox TERMS

    var modalTerms = $('.terms-bg');
    var btnTerms = $('#terms');
    var closeTerms = $('#closeTerms');

    btnTerms.click(function(){
        modalTerms.css('display','flex');
    });

    closeTerms.click(function(){
        modalTerms.css('display','none');
    });

    $(window).click(function(e) {
        if ($(e.target).is(modalTerms)) {
          modalTerms.css('display','none');
        }
    });

});



