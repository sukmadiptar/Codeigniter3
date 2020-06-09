$(function () {
    $('.btnAddMenu').on('click', function () {
        $('#menuModalLabel').html('Add New Menu');
        $('.modal-footer button[type=submit]').html('Add');
    });

    $('.viewModalEdit').on('click', function () {
        $('#menuModalLabel').html('Edit Menu');
        $('.modal-footer button[type=submit]').html('Edit');

        const id = $(this).data('id');

        console.log(id);
        $.ajax({
            url: BASE_URL + 'menu/getedit',
            url: 'http://localhost/wpu-login/menu/getedit',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data);
            },
            error: function (data) {
                alert("fail" + data);
            }
        });
    });

});
