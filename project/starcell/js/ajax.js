$(function () {
    $('.modalInput').on('click', function () {
        $('.label').html('Input Data Voucher');
        $('.modal button[type=submit]').html('Tambah Data');
    })

    $('.modalUbah').on('click', function () {
        $('.label').html('Edit Data Voucher');
        $('.modal button[type=submit]').html('Ubah Data');
        $('.modal form').attr('action', 'http://starcell.yes/voucher/edit')
		//alert($(this).attr('data'));
        const idw = $(this).attr('data');

        $.ajax({
            url: 'http://starcell.yes/voucher/getubahvoucher',
            data: {
                id: idw
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
				//alert('dsd');
                $('#provider').val(data.provider);
                $('#kuota').val(data.kuota);
                $('#harga').val(data.harga);
                $('#stok').val(data.stok);
                $('#id').val(data.id);
            }
        })
    })

});