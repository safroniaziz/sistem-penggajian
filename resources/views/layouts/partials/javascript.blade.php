<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('bower_components/admin-lte/dist/js/adminlte.min.js ')}}"></script>

{{-- dataTables --}}
    <script src="{{ asset('assets/dataTables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dataTables/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/dataTables/datatables_buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/dataTables/datatables_buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/dataTables/datatables_buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/dataTables/datatables_buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/dataTables/datatables_buttons/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/dataTables/datatables_buttons/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/dataTables/datatables_buttons/vfs_fonts.js') }}"></script>

    
{{-- Validator --}}
<script src="{{ asset('assets/validator/validator.min.js') }}"></script>
<!-- sweet alert -->
<script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>

@include('layouts/partials/ajax/manajemen_pegawai_js')
@include('layouts/partials/ajax/manajemen_jabatan_js')
@include('layouts/partials/ajax/laporan_js')