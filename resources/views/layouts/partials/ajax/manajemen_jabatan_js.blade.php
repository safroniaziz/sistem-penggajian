 <!-- Script menampilkan data dari table jenis -->  
  <script type="text/javascript">
  $('#table-jabatan').DataTable({
    processing:true,
    serverSide:true,
    ajax: "{{ route('api.jabatan') }}",
    columns: [
      {data: 'rownum', name: 'rownum'},
      {data: 'nm_jabatan', name:'nm_jabatan'},
      {data: 'gaji_pokok', name:'gaji_pokok'},
      {data: 'tunj_jabatan', name:'tunj_jabatan'},
      {data: 'uang_makan', name:'uang_makan'},
      {data: 'tunj_akomodasi', name:'tunj_akomodasi'},
      {data: 'tunj_pulsa', name:'tunj_pulsa'},
      {data: 'tunj_bbm', name:'tunj_bbm'},
      {data: 'potongan', name:'potongan'},
      {data: 'action', name:'action', orderable:false, searchable:false}
    ]
  });

  // Script Tambah Jenis Indikator
  function tambahJabatan(){
    save_method = "add";
    $('input[name=_method]').val('POST');
    $('#form-jabatan').modal('show');
    $('#form-jabatan form')[0].reset();
    $('#modal-title').text('TAMBAH JABATAN');
  }

  function editJabatan(id_jabatan){
    save_method = 'edit';
    $('input[name=_method]').val('PATCH');
    $('#form-jabatan form')[0].reset();
    $.ajax({
      url: "{{ url('admin/jabatan') }}"+'/'+ id_jabatan + "/edit",
      type: "GET",
      dataType: "JSON",
      success: function(data){
        $('#form-jabatan').modal('show');
        $('#modal-title').text('EDIT DATA JABATAN');
        $('#id_jabatan').val(data.id_jabatan);
        $('#nm_jabatan').val(data.nm_jabatan);
        $('#gaji_pokok').val(data.gaji_pokok);
        $('#tunj_jabatan').val(data.tunj_jabatan);
        $('#tunj_ms_kerja').val(data.tunj_ms_kerja);
        $('#uang_makan').val(data.uang_makan);
        $('#tunj_akomodasi').val(data.tunj_akomodasi);
        $('#tunj_pulsa').val(data.tunj_pulsa);
        $('#tunj_bbm').val(data.tunj_bbm);
        $('#tunj_hr_raya_cuti').val(data.tunj_hr_raya_cuti);
        $('#tunj_yayasan').val(data.tunj_yayasan);
        $('#bonus').val(data.bonus);
        $('#potongan').val(data.potongan);
      },
      error:function(){
        alert("Nothing Data");
      }
    });
  }

  function hapusJabatan(id_jabatan){
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
            url : "{{ url('admin/jabatan') }}" + '/' + id_jabatan,
            type : "POST",
            data : {'_method' : 'DELETE', '_token' : csrf_token},
            success : function($data) {
              $('#table-jabatan').dataTable().api().ajax.reload();
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
    $('#form-jabatan form').validator().on('submit', function(e){
      if (!e.isDefaultPrevented()) {
        var id_jabatan = $('#id_jabatan').val();
        if (save_method == 'add') url = "{{ url('admin/jabatan') }}";
        else url = "{{ url('admin/jabatan')}}"+'/'+id_jabatan;

        $.ajax({
          url : url,
          type : "POST",
          data : $('#form-jabatan form').serialize(),
          success : function($data){
            $('#form-jabatan').modal('hide');
            $('#table-jabatan').dataTable().api().ajax.reload();
            swal({
              title:'Berhasil!',
              text:'Data Sudah Diperbarui',
              type:'success',
              timer:'1500'
            })
          },
          error:function(){
            swal({
              title:'Oops...',
              text:'Terjadi KEsalahan!',
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