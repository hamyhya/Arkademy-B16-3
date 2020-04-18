<!DOCTYPE html>

<html>
    <head>
        <title>Ilham-POSCRUD-Arkademy</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <!-- Logo Arkademy -->
        <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="https://www.arkademy.com/img/logo%20arkademy.1c82cf5c.svg" width="70" height="70">
        </a>
        <input class="search form-control" type="text" placeholder="Search">
        <form class="form-inline">
          <a href="javascript:void(0)" class="btn btn-warning mb-2" id="new-product" data-toggle="modal">ADD</a>
        </form>
        </nav>
        <div class="container">
        @yield('content')
        </div>
    </body>
<script>
$(document).ready(function () {

/* When click New product button */
$('#new-product').click(function () {
$('#btn-save').val("create-product");
$('#product').trigger("reset");
$('#productCrudModal').html("ADD");
$('#crud-modal').modal('show');
});

/* Edit product */
$('body').on('click', '#edit-product', function () {
var product_id = $(this).data('id');
$.get('products/'+product_id+'/edit', function (data) {
$('#productCrudModal').html("EDIT");
$('#btn-update').val("Update");
$('#btn-save').prop('disabled',false);
$('#crud-modal').modal('show');
$('#cust_id').val(data.id);
$('#name').val(data.name);
$('#cashier').val(data.cashier);
$('#category').val(data.category);
$('#price').val(data.price);
})
});

/* Hapus Produk */
$('body').on('click', '#delete-product', function () {
var product_id = $(this).data("id");
var token = $("meta[name='csrf-token']").attr("content");
confirm("Apakah anda yakin ingin hapus?");

$.ajax({
type: "DELETE",
url: "http://localhost:8000/products/"+product_id,
data: {
"id": product_id,
"_token": token,
},
success: function (data) {
$('#msg').html('product entry deleted successfully');
$("#product_id_" + product_id).remove();
},
error: function (data) {
console.log('Error:', data);
}
});
});
});

</script>
</html>