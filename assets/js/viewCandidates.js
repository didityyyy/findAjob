$('#jobid').on('change', function () {
    $.ajax({
        method: "POST",
        data: { jobid: $('#jobid').val() },
        url: "/DR/src/controllers/front/profileCompany/viewCandidatesController.php",
        success: function (data) {    // success callback function
            $('#jobCandidates').html(data);
            $('#jobs-list').css('display', 'none');
        }
    });
});

$('#status').on('change', function () {
    var url = window.location.href.split('=');
    var jobid = url[1];
    $.ajax({
        method: "POST",
        data: { statusid: $('#status').val(), idjob: jobid },
        url: "/DR/src/controllers/front/profileCompany/viewCandidatesController.php",
        success: function (data){
            $('#cands2').html(data);
            $('#cands').css('display','none');
        }
    });
});