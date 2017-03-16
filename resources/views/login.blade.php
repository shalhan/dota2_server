@include('part._header')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{route('login')}}"><b>Dota2</b>Server</a>
  </div>
  @if(Session::has('thanks'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

      {{Session::get('thanks')}}
    </div>
  @endif
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="{{route('login')}}" method="post">
      {{csrf_field()}}
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username">
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
      </div>
      <div class="row">
        <div class="col-xs-8">
          <a href="{{route('signup')}}" class="text-center">Register a new membership</a>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
   

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@include('part._script')
</body>
</html>