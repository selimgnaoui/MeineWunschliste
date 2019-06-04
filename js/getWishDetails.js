$(document).ready(function () {


    $('.showListDetails').on('click',function () {

        var wish_id=$(this).attr("wish-id");

        var request = $.ajax({
            url: "../classes/getWishDetails.php",
            type: "GET",
            data: {wish_id : wish_id},
            dataType: "html"
        });

        request.done(function(msg) {
            $("#wish_list_history").html( msg );
        });

        request.fail(function(jqXHR, textStatus) {
            alert( "Request failed: " + textStatus );
        });

    })







});


