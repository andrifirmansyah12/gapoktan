<!-- jQuery -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plus-admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plus-admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plus-admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plus-admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plus-admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plus-admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plus-admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plus-admin/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plus-admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plus-admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plus-admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plus-admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plus-admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('plus-admin/dist/js/adminlte.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('plus-admin/dist/js/demo.js') }}"></script>

@yield('script')

<script>
    // <-- Route Link -->
    // Dashboard
    function admin_dashboard(url) {
        window.location = url;
    }
    // Kategori Produk
    function admin_kategori_produk(url) {
        window.location = url;
    }
    // Kategori Edukasi
    function admin_kategori_edukasi(url) {
        window.location = url;
    }
    // Kategori Kegiatan
    function admin_kategori_kegiatan(url) {
        window.location = url;
    }
    // Produk
    function admin_produk(url) {
        window.location = url;
    }
    // Edukasi
    function admin_edukasi(url) {
        window.location = url;
    }
    // Kegiatan
    function admin_kegiatan(url) {
        window.location = url;
    }
    // Akun Gapoktan
    function admin_daftar_gapoktan(url) {
        window.location = url;
    }
    // Akun Poktan
    function admin_daftar_poktan(url) {
        window.location = url;
    }
    // Akun Poktan
    function admin_kategori_lahan(url) {
        window.location = url;
    }
    // Akun Poktan
    function admin_lahan(url) {
        window.location = url;
    }
    // Akun Petani
    function admin_daftar_petani(url) {
        window.location = url;
    }
    // Tandur
    function admin_tandur(url) {
        window.location = url;
    }
    // Panen
    function admin_panen(url) {
        window.location = url;
    }
    // Riwayat Penanam
    function admin_riwayat_penanam(url) {
        window.location = url;
    }
    // Rekap Penjualan
    function admin_rekap_penjualan(url) {
        window.location = url;
    }
    // Pengaturan
    function admin_pengaturan(url) {
        window.location = url;
    }
</script>
