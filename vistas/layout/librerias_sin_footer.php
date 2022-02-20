

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../app/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
<script src="../app/AdminLTE-3.0.5/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../app/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../app/AdminLTE-3.0.5/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../app/AdminLTE-3.0.5/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- ChartJS -->
<script src="../app/AdminLTE-3.0.5/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../app/AdminLTE-3.0.5/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../app/AdminLTE-3.0.5/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../app/AdminLTE-3.0.5/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../app/AdminLTE-3.0.5/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- InputMask -->
<script src="../app/AdminLTE-3.0.5/plugins/moment/moment.min.js"></script>
<script src="../app/AdminLTE-3.0.5/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="../app/AdminLTE-3.0.5/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../app/AdminLTE-3.0.5/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../app/AdminLTE-3.0.5/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../app/AdminLTE-3.0.5/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- Summernote -->
<script src="../app/AdminLTE-3.0.5/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../app/AdminLTE-3.0.5/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../app/AdminLTE-3.0.5/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../app/AdminLTE-3.0.5/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE App -->
<script src="../app/AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../app/AdminLTE-3.0.5/dist/js/demo.js"></script>
<script src="../app/AdminLTE-3.0.5/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../app/AdminLTE-3.0.5/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../app/AdminLTE-3.0.5/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../app/AdminLTE-3.0.5/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script src="../js/confirmacionEliminarMovimiento.js"></script>
<script src="../js/confirmacionReactivarMovimiento.js"></script>
<script src="../js/confirmacionEliminarPlani.js"></script>


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar ",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
    });
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