$('[name=golongan]').change(function(){
  changeKategori($(this).val(), $('[name=bidang]'), 'bidang');
});

$('[name=bidang]').change(function(){
  changeKategori($(this).val(), $('[name=kelompok]'), 'kelompok');
});

$('[name=kelompok]').change(function(){
  changeKategori($(this).val(), $('[name=subkelompok]'), 'subkelompok');
});

$('[name=subkelompok]').change(function(){
  changeKategori($(this).val(), $('[name=kat]'), 'kategori');
});

$('[name=kat]').change(function(){
  $.ajax({
    url: '/autocomplete',
    type: 'POST',
    dataType: 'json',
    data: {_token: $('[name=_token]').val(), id: $(this).val()},
    success: function(data) {
      $('[name=id_kategori]').val( data[0].id );
      $('#kategoris').val( data[0].golongan + ' > ' + data[0].bidang + ' > ' + data[0].kelompok + '\n' + data[0].sub_kelompok + ' > ' + data[0].uraian );
    }
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
    $('[name=id_kategori]').val( ui.item.id );
    $('#kategoris').val( ui.item.golongan + ' > ' + ui.item.bidang + ' > ' + ui.item.kelompok + '\n' + ui.item.sub_kelompok + ' > ' + ui.item.uraian );
    $('[name=golongan]').val(ui.item.id_gol);
    changeKategori(ui.item.id_gol, $('[name=bidang]'), 'bidang', ui.item.id_bidang);
    changeKategori(ui.item.id_bidang, $('[name=kelompok]'), 'kelompok', ui.item.id_kelompok);
    changeKategori(ui.item.id_kelompok, $('[name=subkelompok]'), 'subkelompok', ui.item.id_subkelompok);
    changeKategori(ui.item.id_subkelompok, $('[name=kat]'), 'kategori', ui.item.id);

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

$('.yearpicker').datepicker({
  format: "yyyy",
  startView: 2,
  minViewMode: 2,
  clearBtn: true,
  language: "id",
  autoclose: true
});

ajaxlink($('.batal'));
ajaxlink($('.kembali'));

$('.simpan').click(function(){
  var $button = $(this),
      $form = $('#formAset');

  $button.button('loading');

  $.ajax({
    url: $form.prop('action'),
    type: 'POST',
    dataType: 'json',
    data: $form.serialize(),
    success: function(data) {
      NProgress.start();
      $('.right_col').load('/asset', function(){
        $('title').html($('.judul').html());
        setActive();
        NProgress.done();
        swal({
          title: 'Sukses!',
          text: data.message,
          type: data.status,
          timer: 2000,
          showCloseButton: true,
          showConfirmButton: false,
        });
      });
    },
    error: function(data) {
      $button.button('reset');
      $form.find('.has-error').removeClass('has-error');
      $form.find('span.help-block').html('');

      for (var $kolom in data.responseJSON) {
        $('[name='+$kolom+']').parents('.form-group').addClass('has-error');
        $('[name='+$kolom+']').parents('.form-group').find('span.help-block').html(data.responseJSON[$kolom][0]);
      }
    }
  });
});

$('input[type=number]').on('mousewheel',function(e){ $(this).blur(); });