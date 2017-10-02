@if ($flash = session('success'))
<script type="text/javascript">
   $(document).ready(function () {
      swal("Sucess!", "{{ $flash }}", "success");
   });
</script>
@endif
@if ($flash = session('error'))
<script type="text/javascript">
   $(document).ready(function () {
      swal("Error!", "{{ $flash }}", "error");
   });
</script>
@endif
