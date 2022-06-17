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

    const mediaQuery = window.matchMedia('(max-width: 750px)')
    if (mediaQuery.matches) {
        // Menu
        $('#removeClass').removeClass('dropdown-elements');
        dropdownMenu.css('flex-direction', 'column');
        dropdownMenu.css('align-items', 'center');
        $('#removeClass').css('flex-direction', 'column');
        $('#removeClassHR').removeClass('flex-start-xx');
        $('#buttonsCandidateHR').removeClass();
        $('#buttonsCandidateHR').addClass('flex-y');
        $('#buttonsCandidateHR input').css('width', '100%');


    }

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
    var btnDelete2 = $('#btn-delete2');
    function delProfile() {
        var pass = $('#pass-check').val();
        $.ajax({
            type: "POST",
            url: '/DR/src/controllers/front/profileUser/deleteProfileController.php',
            data: { deleteProfile: true, passCheck: pass },
            success: function (data) {
                if (data != "success") {
                    $('#error-message').css('display', 'block');
                    $('#error-message').html(data);
                } else {
                    modalTerms.css('display', 'none');
                    window.location.href = "/DR/view/front/login.php";
                }
            }
        });
    }
    btnDelete.click(() => {
        delProfile();
    });
    btnDelete2.click(() => {
        delProfile();
    });

    $('#searchcompany').on('keyup', function () {
        $.ajax({
            method: "POST",
            data: { searchCompany: $('#searchcompany').val() },
            url: "/DR/src/controllers/front/profileHR/companiesHRController.php",
            success: function (data) {    // success callback function
                $('#list-company2').html(data);
                $('#list-company').css('display', 'none');
            }
        });
    });


    $('#searchapprovedjob').on('keyup', function () {
        $.ajax({
            method: "POST",
            data: { searchapprovedjob: $('#searchapprovedjob').val() },
            url: "/DR/src/controllers/front/profileHR/jobsHRController.php",
            success: function (data) {    // success callback function
                $('#approved-jobs2').html(data);
                $('#approved-jobs1').css('display', 'none');
            }
        });
    });

    //HR candidates display
    $('#all').click(function () {
        $('.all').css('display', 'block');
        $('.onhold').css('display', 'none');
        $('.approved').css('display', 'none');
        $('.approvedinterview').css('display', 'none');
        $('.interviewed').css('display', 'none');
        $('.rejected').css('display', 'none');
    });
    $('#onhold').click(function () {
        $('.all').css('display', 'none');
        $('.onhold').css('display', 'block');
        $('.approved').css('display', 'none');
        $('.approvedinterview').css('display', 'none');
        $('.interviewed').css('display', 'none');
        $('.rejected').css('display', 'none');
    });
    $('#approved').click(function () {
        $('.all').css('display', 'none');
        $('.onhold').css('display', 'none');
        $('.approved').css('display', 'block');
        $('.approvedinterview').css('display', 'none');
        $('.interviewed').css('display', 'none');
        $('.rejected').css('display', 'none');
    });
    $('#approvedinterview').click(function () {
        $('.all').css('display', 'none');
        $('.onhold').css('display', 'none');
        $('.approved').css('display', 'none');
        $('.approvedinterview').css('display', 'block');
        $('.interviewed').css('display', 'none');
        $('.rejected').css('display', 'none');
    });
    $('#interviewed').click(function () {
        $('.all').css('display', 'none');
        $('.onhold').css('display', 'none');
        $('.approved').css('display', 'none');
        $('.approvedinterview').css('display', 'none');
        $('.interviewed').css('display', 'block');
        $('.rejected').css('display', 'none');
    });
    $('#rejected').click(function () {
        $('.all').css('display', 'none');
        $('.onhold').css('display', 'none');
        $('.approved').css('display', 'none');
        $('.approvedinterview').css('display', 'none');
        $('.interviewed').css('display', 'none');
        $('.rejected').css('display', 'block');
    });

    $('#searchcandidateHR').on('keyup', function () {
        $.ajax({
            method: "POST",
            data: { searchCandidate: $('#searchcandidateHR').val() },
            url: "/DR/src/controllers/front/profileHR/candidatesHRController.php",
            success: function (data) {    // success callback function
                $('#listCandidates2').html(data);
                $('#listCandidates').css('display', 'none');
            }
        });
    });

});



