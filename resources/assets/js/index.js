ajaxlink($('.tambah-aset'));

boxTool();

$('#formFilter').on('submit', function(e){
  e.preventDefault();

  var $form = $(this);

  NProgress.start();
  $('.right_col').load($form.prop('action'), $form.serialize(), function(){
    NProgress.done();
  });
});

$('[name=golongan]').change(function(){
  changeKategori($(this).val(), $('[name=bidang]'), 'bidang');
  changeKategori('', $('[name=kelompok]'), 'kelompok');
  changeKategori('', $('[name=subkelompok]'), 'subkelompok');
  changeKategori('', $('[name=kat]'), 'kategori');
  $('#formFilter').submit();
});

$('[name=bidang]').change(function(){
  changeKategori($(this).val(), $('[name=kelompok]'), 'kelompok');
  changeKategori('', $('[name=subkelompok]'), 'subkelompok');
  changeKategori('', $('[name=kat]'), 'kategori');
  $('#formFilter').submit();
});

$('[name=kelompok]').change(function(){
  changeKategori($(this).val(), $('[name=subkelompok]'), 'subkelompok');
  changeKategori('', $('[name=kat]'), 'kategori');
  $('#formFilter').submit();
});

$('[name=subkelompok]').change(function(){
  changeKategori($(this).val(), $('[name=kat]'), 'kategori');
  $('#formFilter').submit();
});

$('[name=kat]').change(function(){
  $('#formFilter').submit();
});

$('.reset').click(function(){
  $('#formFilter').find('input:visible, select').val('');
  $('#formFilter').submit();
});

$('.edit').each(function(){
  ajaxlink($(this));
});

$('.preview').each(function(){
  $(this).click(function(){
    BootstrapDialog.show({
      type: BootstrapDialog.TYPE_INFO,
      title: '<i class="fa fa-eye fa-fw"></i> Detail Asset',
      message: function(dialog) {
        var $message = $('<div></div>');
        var pageToLoad = dialog.getData('pageToLoad');
        $message.load(pageToLoad);

        return $message;
      },
      data: {
        'pageToLoad': $(this).data('href')
      }
    });
  });
});

$('.hapus').each(function(){
  $(this).click(function(){
    var form = $(this).parents('form'),
        barang = $(this).data('barang'),
        result = {};

    swal({
      title: 'Apakah Anda yakin?',
      text: "Anda akan menghapus data "+barang+"<br>Data yang dihapus tidak dapat dikembalikan",
      type: 'warning',
      showCancelButton: true,
      allowOutsideClick: false,
      confirmButtonColor: '#D9534F',
      cancelButtonColor: '#394D5F',
      confirmButtonText: 'Ya, hapus data ini!',
      cancelButtonText: 'Batal',
      preConfirm: function() {
        return new Promise(function(resolve){
          $('button.sweet-confirm').button('loading');
          $.ajax({
            url: form.prop('action'),
            type: 'POST',
            dataType: 'json',
            data: form.serialize(),
            success: function(data) {
              result = data;
              resolve();
            }
          });
        });
      }
    }).then(function(isConfirm) {
      if (isConfirm) {
        $('.right_col').load('/asset', function(){
          swal({
            title: 'Sukses!',
            text: result.message,
            type: result.status,
            timer: 5000,
            showCloseButton: true,
            showConfirmButton: false,
          });
        });
      }
    })
  });
});

$('[name=findkategori]').autocomplete({
  autoFocus: true,
  delay: 0,
  source: function(request, response) {
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('[name=_token]').val()
      },
      url: '/autocomplete',
      type: 'POST',
      dataType: 'json',
      data: {q: request.term},
      success: function(data) {
        response(data);
      }
    });
  },
  select: function(event, ui) {
    $('[name=findkategori]').val( '' );

    var $form = $('#formFilter'),
        $data = {
          golongan: ui.item.id_gol,
          bidang: ui.item.id_bidang,
          kelompok: ui.item.id_kelompok,
          subkelompok: ui.item.id_subkelompok,
          kat: ui.item.id,
          _token: $('[name=_token]').val()
        };

    NProgress.start();
    $('.right_col').load($form.prop('action'), $data, function(){
      NProgress.done();
    });

    return false;
  }
}).autocomplete('instance')._renderItem = function(ul, item) {
  var term = this.term,
      regex = new RegExp('('+ $.ui.autocomplete.escapeRegex(term) +')', 'gi'),
      kelompok = item.kelompok.replace(regex, '<strong class="text-warning">$&</strong>'),
      sub_kelompok = item.sub_kelompok.replace(regex, '<strong class="text-warning">$&</strong>'),
      uraian = item.uraian.replace(regex, '<strong class="text-warning">$&</strong>');
  ul.addClass('dropdown-menu');
  return $('<li>')
  .addClass('dropdown-item')
  .append('<a><small>' + item.golongan + ' > ' + item.bidang + ' > ' + kelompok + '</small><br>' + 
          sub_kelompok + ' > ' + uraian + '</a>')
  .appendTo(ul);
};
