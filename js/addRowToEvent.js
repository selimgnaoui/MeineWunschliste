$(document).ready(function () {

    var counter = 1;









    $("#addrow").on("click", function () {


        var newRow = $("<tr>");
        var cols = "";

        cols +=  '<td>\n' +
            '                         Name <input type="text" name="wish['+counter+'][name]" class="form-control" required/>\n' +
            '\n' +
            '                      </td>\n' +
            '                      <td>\n' +
            '                      Anzahl    <input type="number" name="wish['+counter+'][amount]" class="form-control" required/>\n' +
            '\n' +
            '                      </td>\n' +
            '                      <td>\n' +
            '                       Anbieter   <input type="text" name="wish['+counter+'][anbieter]" class="form-control" required/>\n' +
            '\n' +
            '                      </td>\n' +
            '                      <td>\n' +
            '                          Ort   <input type="text" name="wish['+counter+'][ort]" class="form-control" required/>\n' +
            '\n' +
            '                      </td>\n' +
            '                      <td>\n' +
            '                          Preis   <input type="text" name="wish['+counter+'][preis]" class="form-control" required/>\n' +
            '\n' +
            '                      </td>';
        cols += '  <td>\n' +
            '       Aktion <input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete">\n' +
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

