<!-- jQuery 2.2.3 -->
<script src="{{asset('js/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/app.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('js/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('js/fastclick.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

  });
</script>