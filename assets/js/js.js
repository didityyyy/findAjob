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

    //modalBox TERMS and confirmation

    var modalTerms = $('.terms-bg');
    var btnTerms = $('#terms');
    var btnDeleteProfile = $('#btn-delete-profile');
    var btnCancel = $('#btn-cancel');
    var closeTerms = $('#closeTerms');

    btnTerms.click(function () {
        modalTerms.css('display', 'flex');
    });

    btnDeleteProfile.click(function () {
        modalTerms.css('display', 'flex');
    });

    closeTerms.click(function () {
        modalTerms.css('display', 'none');
    });

    btnCancel.click(function () {
        modalTerms.css('display', 'none');
    });

    $(window).click(function (e) {
        if ($(e.target).is(modalTerms)) {
            modalTerms.css('display', 'none');
        }
    });

    //Scroll to sections smoothly
    $(document).on('click', 'a[href^="#"]', function (e) {
        var id = $(this).attr('href');
        var $id = $(id);
        if ($id.length === 0) {
            return;
        }
        e.preventDefault();
        var pos = $id.offset().top;
        $('body, html').animate({ scrollTop: pos }, 1000);
    });

    //delete HR
    $(".removeHR").click(function () {
        var id = $(this).parents("tr").attr("id");
        if (confirm('Акаунтът ще бъде изтрит!')) {
            $.ajax({
                url: '/DR/src/controllers/admin/HRsController.php',
                type: 'GET',
                data: {
                    id: id
                }
            });
        }
    });

    //icon submit form
    $('#icon-submit').click(function () {
        $('#searchform').submit();
    });



    $('#searchJob').click(() => {
        window.history.replaceState(null, null, '/DR/view/front/profileUser/jobs.php');
    })

    //delete profile confirmation
    var btnDelete = $('#btn-delete');
    btnDelete.click(() => {
        //e.preventDefault();
        $.ajax({
            type: "POST",
            url: '/DR/src/controllers/front/profileUser/deleteProfileController.php',
            data: { deleteProfile : this.value} ,
            success: function () {
                alert('sss');
               
            }
        });
    });
});



