$(document).ready(function () {

    function page($param){
        $param.click(function(){
            //e.preventDefault();
            alert($('#total_pages').val());
            $.ajax({
                type: "POST",
                //url: $($param).prop('href'),
                url : "/DR/src/database/pagination.php",
                data: {totalPages : $('#total_pages').val()},
                complete: function(){
                    //var href = $($param).prop('href');
                    //var spinner = '<tr><td colspan="6"><strong>loading...</strong></td></tr>';
                    //window.history.pushState(null, null, href);
                    // $("#contentJobs").html(spinner).load("#jobs");
                    alert(data);
                }

            });
            // return false;
        })
    }

    page($('#first'));
    page($('#prev'));
    page($('#next'));
    page($('#last'));

});

