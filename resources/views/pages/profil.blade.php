<div class="page-title">
  <div class="title_left">
    <h3 class="judul" data-current="daftar-aset">Profil Pengguna</h3>
  </div>
</div>
<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Detail Pengguna <small>Laporan Aktifitas</small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

          <div class="profile_img">

            <!-- end of image cropping -->
            <div id="crop-avatar">
              <!-- Current avatar -->
              <img class="img-responsive avatar-view" src="{{ $user->avatar }}" alt="Avatar" title="Avatar">
            </div>
            <!-- end of image cropping -->

          </div>
          <h3>{{ $user->name }}</h3>

          <ul class="list-unstyled user_data">
            <li>
              <i class="fa fa-user user-profile-icon"></i> {{ $user->isAdmin() ? 'Administrator' : 'Operator' }}
            </li>
          </ul>

          <a class="edit btn btn-success" data-href="{{ route('pengguna.edit', $user->id) }}"><i class="fa fa-edit m-right-xs"></i> Edit Profil</a>
          <br />

        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">

          <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
              <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Aktifitas Terbaru</a>
              </li>
              @if($user->isAdmin())
                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="users-tab" data-toggle="tab" aria-expanded="false">Daftar Pengguna</a>
                </li>
              @endif
              <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profil</a>
              </li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                <!-- start recent activity -->
                <ul class="messages">
                  @if($items->count() > 0)
                    @foreach($items as $item)
                      <li>
                        <img src="{{ $item->pembuat->avatar }}" class="avatar" alt="Avatar">
                        <div class="message_date">
                          <h3 class="date text-info">{{ $item->tgl_update }}</h3>
                          <p class="month">{{ $item->bulan_update }}</p>
                        </div>
                        <div class="message_wrapper">
                          <h4 class="heading">{{ $item->pembuat->name }}</h4>
                          <blockquote class="message">{{ $item->updated_at == $item->created_at ? 'Menambahkan' : 'Memperbarui' }} {{ $item->merk_type }} ke Daftar Aset</blockquote>
                          <br>
                          <p class="url">
                            <a class="preview" href="/" data-href="{{ route('inventaris.detail', $item) }}"><i class="fa fa-paperclip"></i> Lihat Detail</a>
                          </p>
                        </div>
                      </li>
                    @endforeach
                  @else
                    Belum ada aktifitas.
                  @endif
                </ul>
                <!-- end recent activity -->

              </div>

              @if($user->isAdmin())
              <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="users-tab">
                <div class="col-xs-12">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Hak Akses</th>
                        <th><a data-href="{{ route('pengguna.create') }}" class="newUser btn btn-dark btn-xs"><i class="fa fa-user-plus"></i> Tambah Pengguna</a></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach(App\User::get() as $pengguna)
                        <tr>
                          <td>{{ $pengguna->name }}</td>
                          <td>{{ $pengguna->email }}</td>
                          <td>{{ $pengguna->isAdmin() ? 'Administrator' : 'Operator' }}</td>
                          <td>
                            @if($pengguna->id != 1 && $pengguna->id != $user->id)
                              {!! Form::model($pengguna, ['route' => ['pengguna.destroy', $pengguna], 'method' => 'delete', 'class' => 'form-inline']) !!}
                                <a class="edit btn btn-info btn-xs" data-href="{{ route('pengguna.edit', $pengguna->id) }}"><i class="fa fa-pencil"></i></a>
                                <a class="hapus btn btn-danger btn-xs" data-pengguna="{{ $pengguna->name }}"><i class="fa fa-trash"></i></a>
                              {!! Form::close() !!}
                            @endif
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              @endif

              <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                <div class="col-xs-12 col-md-8 col-md-offset-2">
                  <table class="table table-hover">
                    <tr>
                      <td><strong>Nama</strong></td>
                      <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                      <td><strong>Email</strong></td>
                      <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                      <td><strong>Hak Akses</strong></td>
                      <td>{{ $user->isAdmin() ? 'Administrator' : 'Operator' }}</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('.newUser').click(function(){
    BootstrapDialog.show({
      type: BootstrapDialog.TYPE_PRIMARY,
      title: '<i class="fa fa-user-plus fa-fw"></i> Tambah Pengguna',
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

  $('.edit').each(function(){
    $(this).click(function(e){
      e.preventDefault();

      BootstrapDialog.show({
        type: BootstrapDialog.TYPE_INFO,
        title: '<i class="fa fa-edit fa-fw"></i> Edit Pengguna',
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

  $('.preview').each(function(){
    $(this).click(function(e){
      e.preventDefault();

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
      var form = $(this).parent('form'),
          pengguna = $(this).data('pengguna'),
          result = {};

      swal({
        title: 'Apakah Anda yakin?',
        text: "Anda akan menghapus data "+pengguna+"<br>Data yang dihapus tidak dapat dikembalikan",
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
          $('.right_col').load('/profil', function(){
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
</script>