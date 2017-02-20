/**
 * Created by Aaditya on 11/6/2016.
 */
$( document ).ready(function() {

    $("#searchdescription").addClass("hidden");
    $("#searchnofilter").addClass("hidden");
    $("#searchtitle").addClass("hidden");

    $('input[name=searchtype]').change(function () {
        switch ($('input[name=searchtype]:checked').val()){
            case 'title':
                //console.log($('input[name=searchtype]:checked').val());
                $("#searchdescription").addClass("hidden");
                $("#searchnofilter").addClass("hidden");
                $("#searchtitle").removeClass("hidden");
                break;
            case 'description':
                //console.log($('input[name=searchtype]:checked').val());
                $("#searchdescription").removeClass("hidden");
                $("#searchnofilter").addClass("hidden");
                $("#searchtitle").addClass("hidden");
                break;
            case 'nofilter':
                //console.log($('input[name=searchtype]:checked').val());
                $("#searchdescription").addClass("hidden");
                $("#searchnofilter").removeClass("hidden");
                $("#searchtitle").addClass("hidden");
                break;
        }

    });

    $("#filterbutton").click(function () {
        var filter = $('input[name=searchtype]:checked').val();
        var filter_value = $("#search"+filter).val();
        //console.log(filter + " " + filter_value);
        if(filter_value == "undefined"){
            filter_value = "nofilter";
        }
        $.get('filter.php?filter='+filter+"&filter_value="+filter_value,function (data) {
            if(data.length > 1) {
                $("#filteroutput").html(data);
            } else if(data == "0"){
                RedirectToPage('error.php?error_no=4');
            }
        })
    });

    $("#searchbutton").click(function(event) {
        event.preventDefault();
        var searchtitle = $("#searchbar").val();
        if(searchtitle != null || searchtitle !== ''){
            window.location = "Part04_Search.php?title="+searchtitle;
        }
    });

});

function RedirectToPage(page) {
    window.location = page;
}
