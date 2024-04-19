$(document).ready(function(){
    // Función para cargar y mostrar los productos
    function cargarProductos() {
        $.ajax({
            url: 'productos.php',
            type: 'GET',
            success: function(response) {
                $('#lista-productos').html(response);
            }
        });
    }

    // Cargar productos al cargar la página
    cargarProductos();

    // Manejar envío del formulario para agregar un nuevo producto
    $('#formulario-producto').submit(function(event) {
        event.preventDefault();
        var datos = $(this).serialize();
        $.ajax({
            url: 'agregar_producto.php',
            type: 'POST',
            data: datos,
            success: function(response) {
                cargarProductos(); // Recargar la lista de productos
                $('#formulario-producto')[0].reset(); // Limpiar el formulario
            }
        });
    });

    // Manejar clic en botón para eliminar un producto
    $(document).on('click', '.eliminar-producto', function() {
        var id = $(this).data('id');
        $.ajax({
            url: 'eliminar_producto.php',
            type: 'POST',
            data: {id: id},
            success: function(response) {
                cargarProductos(); // Recargar la lista de productos
            }
        });
    });
});
