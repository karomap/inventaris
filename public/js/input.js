changeKategori($("[name=golongan]").val(),$("[name=bidang]"),"bidang"),changeKategori($("[name=bidang]").val(),$("[name=kelompok]"),"kelompok"),changeKategori($("[name=kelompok]").val(),$("[name=subkelompok]"),"subkelompok"),changeKategori($("[name=subkelompok]").val(),$("[name=kat]"),"kategori"),$("[name=golongan]").change(function(){changeKategori($(this).val(),$("[name=bidang]"),"bidang")}),$("[name=bidang]").change(function(){changeKategori($(this).val(),$("[name=kelompok]"),"kelompok")}),$("[name=kelompok]").change(function(){changeKategori($(this).val(),$("[name=subkelompok]"),"subkelompok")}),$("[name=subkelompok]").change(function(){changeKategori($(this).val(),$("[name=kat]"),"kategori")}),$("[name=kat]").change(function(){$.ajax({url:"/autocomplete",type:"POST",dataType:"json",data:{_token:$("[name=_token]").val(),id:$(this).val()},success:function(e){$("[name=id_kategori]").val(e[0].id),$("#kategoris").val(e[0].golongan+" > "+e[0].bidang+" > "+e[0].kelompok+"\n"+e[0].sub_kelompok+" > "+e[0].uraian)}})}),$("[name=findkategori]").autocomplete({autoFocus:!0,delay:0,source:function(e,a){$.ajax({headers:{"X-CSRF-TOKEN":$("[name=_token]").val()},url:"/autocomplete",type:"POST",dataType:"json",data:{q:e.term},success:function(e){a(e)}})},select:function(e,a){return $("[name=findkategori]").val(""),$("[name=id_kategori]").val(a.item.id),$("#kategoris").val(a.item.golongan+" > "+a.item.bidang+" > "+a.item.kelompok+"\n"+a.item.sub_kelompok+" > "+a.item.uraian),$("[name=golongan]").val(a.item.id_gol),changeKategori(a.item.id_gol,$("[name=bidang]"),"bidang",a.item.id_bidang),changeKategori(a.item.id_bidang,$("[name=kelompok]"),"kelompok",a.item.id_kelompok),changeKategori(a.item.id_kelompok,$("[name=subkelompok]"),"subkelompok",a.item.id_subkelompok),changeKategori(a.item.id_subkelompok,$("[name=kat]"),"kategori",a.item.id),!1}}).autocomplete("instance")._renderItem=function(e,a){var o=this.term,n=new RegExp("("+$.ui.autocomplete.escapeRegex(o)+")","gi"),t=a.kelompok.replace(n,'<strong class="text-warning">$&</strong>'),i=a.sub_kelompok.replace(n,'<strong class="text-warning">$&</strong>'),l=a.uraian.replace(n,'<strong class="text-warning">$&</strong>');return e.addClass("dropdown-menu"),$("<li>").addClass("dropdown-item").append("<a><small>"+a.golongan+" > "+a.bidang+" > "+t+"</small><br>"+i+" > "+l+"</a>").appendTo(e)},$(".yearpicker").datepicker({format:"yyyy",startView:2,minViewMode:2,clearBtn:!0,language:"id",autoclose:!0}),ajaxlink($(".batal")),ajaxlink($(".kembali")),$(".simpan").click(function(){var e=$(this),a=$("#formAset");e.button("loading"),$.ajax({url:a.prop("action"),type:"POST",dataType:"json",data:a.serialize(),success:function(e){NProgress.start(),$(".right_col").load("/asset",function(){NProgress.done(),$("title").html($(".judul").html()),swal({title:"Sukses!",text:e.message,type:e.status,timer:5e3,showCloseButton:!0,showConfirmButton:!1})})},error:function(o){e.button("reset"),a.find(".has-error").removeClass("has-error"),a.find("span.help-block").html("");for(var n in o.responseJSON)$("[name="+n+"]").parents(".form-group").addClass("has-error"),$("[name="+n+"]").parents(".form-group").find("span.help-block").html(o.responseJSON[n][0])}})}),$("input[type=number]").on("mousewheel",function(e){$(this).blur()});