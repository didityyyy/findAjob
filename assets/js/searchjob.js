$("#searchbox").keyup(function () {
    sendData();
});

$('#jobcategory').on('change', function () {
    sendData();
});

$('#jobcity').on('change', function () {
    sendData();
});

function sendData() {
    $.ajax({
        method: "POST",
        data: { searchbox: $("#searchbox").val(), jobcategory: $('#jobcategory').val(), jobcity: $("#jobcity").val() },
        url: "/DR/src/controllers/front/profileUser/searchJobController.php",
        success: function (data) {    // success callback function
            if (data != "not-found") {
                $('#contentJobs').html(data);
                $('#not-found').css('display', 'none');
            } else {
                $('#not-found').css('display', 'block');
                $('#not-found').html(data);
            }
        }
    });
}

$('#clearSearch').on('click', function (){
    location.reload();
})

$(document).ready(() => {
    sendData();
})