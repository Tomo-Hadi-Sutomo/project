$(function () {
    $('.modalInput').on('click', function () {
        $('.label').html('Input Data Voucher');
        $('.modal button[type=submit]').html('Tambah Data');
    })

    $('.modalUbah').on('click', function () {
        $('.label').html('Edit Data Voucher');
        $('.modal button[type=submit]').html('Ubah Data');
        $('.modal form').attr('action', 'http://localhost/starcell/public/voucher/edit')

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/starcell/public/voucher/getubahvoucher',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#provider').val(data.provider);
                $('#kuota').val(data.kuota);
                $('#harga').val(data.harga);
                $('#stok').val(data.stok);
                $('#id').val(data.id);
            }
        })
    })

});