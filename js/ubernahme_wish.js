$(document).ready(function () {


$('.showmodal').on('click',function () {

   var wish_id=$(this).attr("data-wish");
   var event_id=$(this).attr("event-id");
   var wish_anzahl=$(this).attr("wish-anzahl");
    $('#wish_amount').attr('max', wish_anzahl);
    $('#wish_id').val(wish_id);
    $('#event_id').val(event_id);
    $('#anzahl').val(wish_anzahl);
    $('#maximumamountSpan').text(' Es kann noch '+ wish_anzahl+' übernommen werden ')


})




});


