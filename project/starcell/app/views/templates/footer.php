<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<script>
$(function () {
    $('.modalInput').on('click', function () {
        $('.label').html('Input Data Voucher');
        $('.modal button[type=submit]').html('Tambah Data');
    })

    $('.modalUbah').on('click', function () {
        $('.label').html('Edit Data Voucher');
        $('.modal button[type=submit]').html('Ubah Data');
        $('.modal form').attr('action', '<?= BASEURL; ?>/voucher/edit')
		//alert($(this).attr('data'));
        const idw = $(this).attr('data');

        $.ajax({
            url: '<?= BASEURL; ?>/voucher/getubahvoucher',
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
</script>
</body>

</html>