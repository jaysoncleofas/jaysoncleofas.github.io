@if (Session::has('success'))
  <script type="text/javascript">
    $(document).ready(function(){
        swal("Good job!", "{{ Session::get('success') }}", "success");
    });
  </script>
@endif

@if (Session::has('error'))
  <script type="text/javascript">
    $(document).ready(function(){
        swal("Error!", "{{ Session::get('error') }}", "error");
    });
  </script>
@endif


@if ($flash = session('message'))
  <script type="text/javascript">
    $(document).ready(function(){
        swal("Error!", "{{ $flash }}", "success");
    });
  </script>
@endif
