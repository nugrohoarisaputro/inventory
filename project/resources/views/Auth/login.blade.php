@extends('layout.masterlogin')

@section('content')
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1">{{env('APP_NAME')}}</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Silahkan Login</p>

      <form action="" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" id="username" class="form-control" placeholder="Username" required name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" required name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <a href="#">lupa password saya?</a>
          </div> 
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" id="submitbtn">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

@endsection

@section('extrascript')
<script type="text/javascript">
    $(document).ready(function () {
        $('#username').keyup(function () {
            var VAL = $(this).val();
            var reg = new RegExp('^[a-zA-Z0-9]*$');
            if (reg.test(VAL) && $(this).val().length > 4) {$('#submitbtn').removeAttr('disabled');}else{$('#submitbtn').attr('disabled', 'disabled');}
        });
        @if($errors->has('chance'))
        swal('{!! $errors->has('msg') ? $errors->first('msg') : 'Error!' !!}', '{!! $errors->first('chance') !!} Chance Left.', 'error');
        @endif
        @if(session('alert'))
        swal('{{session('alert')['title']}}', '{{session('alert')['message']}}', '{{session('alert')['status']}}')
        @endif
    });
</script>
@endsection