 <!-- Script menampilkan data dari table jenis -->  
  <script type="text/javascript">
  $('#table-pegawai').DataTable({
    processing:true,
    serverSide:true,
    ajax: "{{ route('api.pegawai') }}",
    columns: [
      {data: 'rownum', name: 'rownum'},
      {data: 'nipy', name: 'nipy'},
      {data: 'nm_pegawai', name:'nm_pegawai'},
      {data: 'masa_kerja', 
      render:function(data, type, row){
            if(data >=10)
            {
              return '<label class="label label-primary">'+data+'</label>';
            }
            else
            {
              return '<label class="label label-danger">'+data+'</label>';
            }
        }
      },

      {data: 'tunj_hari_raya', name:'tunj_hari_raya'},
      {data: 'tunj_yayasan', name:'tunj_yayasan'},
      {data: 'bonus', name:'bonus'},
      {data: 'tunj_keahlian', name:'tunj_keahlian'},
      {data: 'lembur', name:'lembur'},
      {data: 'action', name:'action', orderable:false, searchable:false}
    ]
  });

  // Script Tambah Jenis Indikator
  function tambahPegawai(){
    save_method = "add";
    $('input[name=_method]').val('POST');
    $('#form-pegawai').modal('show');
    $('#form-pegawai form')[0].reset();
    $('#modal-title').text('TAMBAH PEGAWAI BARU');
  }

  function editPegawai(nipy){
    save_method = 'edit';
    $('input[name=_method]').val('PATCH');
    $('#form-pegawai form')[0].reset();
    $.ajax({
      url: "{{ url('admin/pegawai') }}"+'/'+ nipy + "/edit",
      type: "GET",
      dataType: "JSON",
      success: function(data){
        $('#form-pegawai').modal('show');
        $('#modal-title').text('EDIT DATA PEGAWAI');
        $('#nip').val(data.nipy);
        $('#nm_pegawai').val(data.nm_pegawai);
        $('#masa_kerja').val(data.masa_kerja);
        $('#tunj_hari_raya').val(data.tunj_hari_raya);
        $('#tunj_yayasan').val(data.tunj_yayasan);
        $('#tunj_keahlian').val(data.tunj_keahlian);
        $('#lembur').val(data.lembur);
        $('#bonus').val(data.bonus);
      },
      error:function(){
        alert("Nothing Data");
      }
    });
  }

  function printPegawai(nipy){
    $.ajax({
       url: "{{ url('admin/cetakpegawai') }}"+'/'+ nipy,
    });
  }

  function hapusPegawai(nipy){
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    swal({
        title: 'Apakah Anda Yakin?',
        text: "Anda tidak akan bisa mengembalikan data ini!",
        type: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus Data!',
    }).then(function() {
        $.ajax({
            url : "{{ url('admin/pegawai') }}" + '/' + nipy,
            type : "POST",
            data : {'_method' : 'DELETE', '_token' : csrf_token},
            success : function($data) {
              $('#table-pegawai').dataTable().api().ajax.reload();
                swal({
                    title: 'Success!',
                    text: 'Data Berhasil Dihapus!',
                    type: 'success',
                    timer: '1500'
                })
            },
            error : function () {
                swal({
                    title: 'Oops...',
                    text: ' Terjadi Kesalahan!',
                    type: 'error',
                    timer: '1500'
                })
            }
        });
    });
  }

  // script fungsi untuk create data
  $(function(){
    $('#form-pegawai form').validator().on('submit', function(e){
      if (!e.isDefaultPrevented()) {
        var nipy = $('#nip').val();
        if (save_method == 'add') url = "{{ url('admin/pegawai') }}";
        else if(save_method == 'edit') url = "{{ url('admin/pegawai') }}"+'/'+nipy;

        $.ajax({
          url : url,
          type : "POST",
          data : $('#form-pegawai form').serialize(),
          success : function($data){
            $('#form-pegawai').modal('hide');
            $('#table-pegawai').dataTable().api().ajax.reload();
            swal({
              title:'Berhasil!',
              text:'Data Sudah Diperbarui ',
              type:'success',
              timer:'1500'
            })
          },
          error:function(){
            swal({
              title:'Oops...',
              text:'Terjadi KEsalahan! ',
              type:'error',
              timer:'1500'
            })
          }
        });
        return false;
      }
    });
  });

</script>