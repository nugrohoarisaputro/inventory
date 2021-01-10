
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{env('APP_NAME')}}</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
  @yield('extracss')

</head>

@yield('content')

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script type="text/javascript">
      $(document).ready(function() {
        @if(session('alert'))
        swal('{{session('alert')['title']}}', '{{session('alert')['message']}}', '{{session('alert')['status']}}')
        @endif
      });

      <?php if(session('pesan')){ ?>
      <?php list($a, $b, $c) = explode("#", session('pesan')); ?>
      swal("{{$a}}", "{{$b}}", "{{$c}}");
      <?php } ?>
</script>
    @yield('extrascript')
</body>
</html>

    