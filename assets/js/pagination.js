$(document).ready(function () {

    function page($param){
        $param.click(function(){
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: $($param).prop('href'),
                complete: function(){
                    var href = $($param).prop('href');
                    var spinner = '<tr><td colspan="6"><strong>loading...</strong></td></tr>';
                    window.history.pushState(null, null, href);
                    // $("#contentJobs").html(spinner).load("#jobs");
                }

            });
            return false;
        })
    }

    page($('#first'));
    page($('#prev'));
    page($('#next'));
    page($('#last'));

});

