function changeKategori(id_parent, child, tipe, selected) {
  if(id_parent != '') {
    $.ajax({
      url: '/listkat',
      type: 'POST',
      dataType: 'json',
      data: {_token: $('[name=_token]').val(), tipe: tipe, id_parent: id_parent},
      success: function(data) {
        child.prop('disabled', false);
        child.html('');
        child.append('<option value="">-- Pilih Salah Satu --</option>');
        for(var key in data) {
          child.append('<option value="'+ key +'">'+ data[key] +'</option>');
        }
        if(selected != '') {
          child.val(selected);
        }
      }
    });
  } else {
    child.html('');
    child.append('<option value="">-- Pilih Salah Satu --</option>');
    child.prop('disabled', true);
    switch (tipe) {
      case 'bidang':
        $('[name=kelompok], [name=subkelompok], [name=kat]').html('');
        $('[name=kelompok], [name=subkelompok], [name=kat]').append('<option value="">-- Pilih Salah Satu --</option>');
        $('[name=kelompok], [name=subkelompok], [name=kat]').prop('disabled', true);
        break;

      case 'kelompok':
        $('[name=subkelompok], [name=kat]').html('');
        $('[name=subkelompok], [name=kat]').append('<option value="">-- Pilih Salah Satu --</option>');
        $('[name=subkelompok], [name=kat]').prop('disabled', true);
        break;

      case 'subkelompok':
        $('[name=kat]').html('');
        $('[name=kat]').append('<option value="">-- Pilih Salah Satu --</option>');
        $('[name=kat]').prop('disabled', true);
        break;
    }
  }
}

$('.keluar').click(function(){
  var link = $(this).data('href');

  swal({
    title: 'Apakah Anda yakin?',
    text: "Anda akan keluar dari aplikasi",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#D9534F',
    cancelButtonColor: '#394D5F',
    confirmButtonText: 'Ya, keluar dari aplikasi!',
    cancelButtonText: 'Batal'
  }).then(function(isConfirm) {
    if (isConfirm) {
      window.location.href = link;
    }
  })
});