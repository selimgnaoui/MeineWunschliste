$(document).ready(function () {

    var counter = 0;










    $("#addrow").on("click", function () {

        var newRow = $("<tr>");
        var cols = "";

        cols +=  '<td><input type="text" name="items[]" class="form-control" required /></td>';
        cols += '  <td>\n' +
            '        <input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete">\n' +
            '        </td>';
        cols += '</tr>'

        newRow.append(cols);
        $(".wishlist").append(newRow);
        counter++;
    });



    $("form").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });


});



function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}