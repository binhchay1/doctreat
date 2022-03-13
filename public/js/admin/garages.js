$(document).ready(function () {

    $('#editModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget)
        let id = button.data('id');
        let name = button.data('name');
        let phone = button.data('phone');
        let address = button.data('address');
        let city = button.data('city');
        let modal = $(this);

        modal.find('.modal-body #id_edit').val(id);
        modal.find('.modal-body #name_edit').val(name);
        modal.find('.modal-body #phone_edit').val(phone);
        modal.find('.modal-body #address_edit').val(address);
        modal.find('.modal-body #list-city').val(city);
    });

    $('#deleteModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget)
        let id = button.data('id');
        let modal = $(this);

        modal.find('.modal-body #id_delete').val(id);
    });
});

function search() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("garages_search");
    filter = input.value.toUpperCase();
    table = document.getElementById("garages_table");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        if (i == 0) {
            continue;
        }
        row = tr[i].getElementsByTagName("td");
        for (y = 0; y < row.length; y++) {
            td = row[y];
            text = td.innerHTML;
            if (text.indexOf('type="button"') == -1) {
                if (text.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    break;
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
}