<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery UI 1.11.4 -->
<script src="<?=_URL_ . '/public/admin/accsset/'?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=_URL_ . '/public/admin/accsset/'?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?=_URL_ . '/public/admin/accsset/'?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?=_URL_ . '/public/admin/accsset/'?>plugins/sparklines/sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=_URL_ . '/public/admin/accsset/'?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=_URL_ . '/public/admin/accsset/'?>plugins/moment/moment.min.js"></script>
<script src="<?=_URL_ . '/public/admin/accsset/'?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=_URL_ . '/public/admin/accsset/'?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?=_URL_ . '/public/admin/accsset/'?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=_URL_ . '/public/admin/accsset/'?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=_URL_ . '/public/admin/accsset/'?>dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=_URL_ . '/public/admin/accsset/'?>dist/js/pages/dashboard.js"></script>
<script src="<?=_URL_ . '/public/admin/accsset/'?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=_URL_ . '/public/admin/accsset/'?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?=_URL_ . '/public/admin/accsset/'?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=_URL_ . '/public/admin/accsset/'?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=_URL_ . '/public/admin/accsset/'?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=_URL_ . '/public/admin/accsset/'?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=_URL_ . '/public/admin/accsset/'?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=_URL_ . '/public/admin/accsset/'?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=_URL_ . '/public/admin/accsset/'?>plugins/jszip/jszip.min.js"></script>
<script src="<?=_URL_ . '/public/admin/accsset/'?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=_URL_ . '/public/admin/accsset/'?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=_URL_ . '/public/admin/accsset/'?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=_URL_ . '/public/admin/accsset/'?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=_URL_ . '/public/admin/accsset/'?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
