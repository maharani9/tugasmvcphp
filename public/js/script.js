$(function() {

$('.tombolTambahData').on('click', function() {
    $('#formModalLabel').html('Tambah Data Mahasiswa');
    $('.modal-footer button[type=submit').html('Tambah Data');
});


$('.tampilModalEdit').on('click', function() {

    $('#formModalLabel').html('Edit Data Mahasiswa');
    $('.modal-footer button[type=submit').html('Edit Data');
    $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/edit');

    const id = $(this).data('id');

    $.ajax({
        url: 'http://localhost/phpmvc/public/mahasiswa/getedit',
        data: {id : id},
        method: 'post',
        dataType: 'json',

        success: function(data){
          $('#nama').val(data.nama);
          $('#nrp').val(data.nrp);
          $('#email').val(data.email);
          $('#jurusan').val(data.jurusan);
          $('#id').val(data.id);
        }
    });
});



});