{!! Form::open(['route' => 'avatar.upload', 'files' => true, 'class' => 'form-horizontal', 'id' => 'formAvatar']) !!}
  <div class="form-group">
    <div class="col-md-4">
      <img class="img-responsive avatar-view previewAvatar" src="{{ asset('images/avatar.png') }}" alt="Avatar" title="Avatar">
    </div>
    <div class="col-md-8">
      {!! Form::file('foto') !!}
      <br>
      {!! Form::button('Upload', ['type' => 'submit', 'class' => 'uploadAvatar btn btn-dark btn-sm']) !!}
    </div>
  </div>
{!! Form::close() !!}

{!! Form::open(['route' => 'pengguna.store', 'class' => 'form-horizontal', 'id' => 'formUser']) !!}
  <div class="form-group">
    {!! Form::label('name', 'Nama', ['class' => 'control-label col-md-4']) !!}
    <div class="col-md-8">
      {!! Form::text('name', null, ['class' => 'form-control input-sm', 'placeholder' => 'Nama']) !!}
      <p class="help-block"></p>
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('email', 'Email', ['class' => 'control-label col-md-4']) !!}
    <div class="col-md-8">
      {!! Form::email('email', null, ['class' => 'form-control input-sm', 'placeholder' => 'Email']) !!}
      <p class="help-block"></p>
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('role', 'Hak Akses', ['class' => 'control-label col-md-4']) !!}
    <div class="col-md-8">
      <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-primary btn-sm">
          {!! Form::radio('role', 'operator') !!} Operator
        </label>
        <label class="btn btn-primary btn-sm">
          {!! Form::radio('role', 'admin') !!} Administrator
        </label>
      </div>
      <p class="help-block"></p>
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('password', 'Password', ['class' => 'control-label col-md-4']) !!}
    <div class="col-md-8">
      {!! Form::password('password', ['class' => 'form-control input-sm', 'placeholder' => 'Password']) !!}
      <p class="help-block"></p>
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('password_confirmation', 'Konfirmasi Password', ['class' => 'control-label col-md-4']) !!}
    <div class="col-md-8">
      {!! Form::password('password_confirmation', ['class' => 'form-control input-sm', 'placeholder' => 'Konfirmasi Password']) !!}
      <p class="help-block"></p>
    </div>
  </div>

  <hr>

  <div class="form-group">
    <a class="btn btn-default btn-sm" title="Tutup" data-dismiss="modal"><i class="fa fa-times"></i> Batal</a>
    {!! Form::button('<i class="fa fa-save"></i> Simpan', ['class' => 'simpanUser pull-right btn btn-dark btn-sm']) !!}
  </div>

  {!! Form::hidden('avatar', null) !!}
{!! Form::close() !!}

<script type="text/javascript">
  var fileError = false;

  $('[name=foto]').change(function(){
    var input = $(this),
    numFiles = input.get(0).files ? input.get(0).files.length : 1,
    label = input.val();
    input.trigger('fileselect', [numFiles, label]);

    var file = this.files[0];
    var imagefile = file.type;
    var ukuran = file.size;
    var match = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
    if(!(imagefile == match[0] || imagefile == match[1] || imagefile == match[2] || imagefile == match[3])) {
      fileError = true;

      swal({
          title: 'Error!',
          text: 'Jenis file tidak didukung',
          type: 'error',
          timer: 2000,
          showCloseButton: true,
          showConfirmButton: false,
        });
    } else if(ukuran > 2097152) {
      fileError = true;

      swal({
          title: 'Error!',
          text: 'Ukuran file melebihi batas maksimum 2MB',
          type: 'error',
          timer: 2000,
          showCloseButton: true,
          showConfirmButton: false,
        });
    } else {
      fileError = false;

      var reader = new FileReader();
      reader.onload = function(e){
        $('.previewAvatar').prop('src', e.target.result);
      };
      reader.readAsDataURL(this.files[0]);
    }
  });

  $('#formAvatar').on('submit', function(e){
    e.preventDefault();

    if (fileError) {
      swal({
          title: 'Error!',
          text: 'File menyalahi aturan',
          type: 'error',
          timer: 2000,
          showCloseButton: true,
          showConfirmButton: false,
        });

      return false;
    }

    if ($('[name=foto]').val() == '') {
      swal({
          title: 'Info!',
          text: 'Pilih file terlebih dahulu',
          type: 'info',
          timer: 2000,
          showCloseButton: true,
          showConfirmButton: false,
        });

      return false;
    }

    var button = $('.uploadAvatar'),
        form = $(this),
        formData = new FormData();

    formData.append('_token', form.find('[name=_token]').val());
    formData.append('foto', $('[name=foto]')[0].files[0]);

    button.button('loading');
    NProgress.start();

    $.ajax({
      url: form.prop('action'),
      type: 'POST',
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        button.button('reset');
        $('[name=avatar]').val(data.filename);
        $('.previewAvatar').prop('src', '/images/'+data.filename);
        NProgress.done();
        swal({
          title: 'Sukses!',
          text: data.message,
          type: data.status,
          timer: 2000,
          showCloseButton: true,
          showConfirmButton: false,
        });
      },
      error: function(data) {
        button.button('reset');
        NProgress.done();
        swal({
          title: 'Error!',
          text: 'Gagal mengunggah gambar.',
          type: 'error',
          timer: 2000,
          showCloseButton: true,
          showConfirmButton: false,
        });
      }
    });
  });

  $('.simpanUser').click(function(){
    var $button = $(this),
        $form = $('#formUser'),
        $modal = $(this).parents('.modal');

    $button.button('loading');

    $.ajax({
      url: $form.prop('action'),
      type: 'POST',
      dataType: 'json',
      data: $form.serialize(),
      success: function(data) {
        NProgress.start();
        $('.right_col').load('/profil', function(){
          $('title').html($('.judul').html());
          $button.button('reset');
          $modal.modal('hide');
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
        $form.find('p.help-block').html('');

        for (var $kolom in data.responseJSON) {
          $('[name='+$kolom+']').parents('.form-group').addClass('has-error');
          $('[name='+$kolom+']').parents('.form-group').find('p.help-block').html(data.responseJSON[$kolom][0]);
        }
      }
    });
  });
</script>