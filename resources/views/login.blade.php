@include('part._header')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{route('login')}}"><b>Dota2</b>Server</a>
  </div>
 
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    @if(Session::has('error'))
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

        {{Session::get('error')}}
      </div>
     @endif
       @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

    <form action="{{route('login')}}" method="post">
      {{csrf_field()}}
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="UserId">
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="Password">
      </div>
      <div class="row">
        <div class="col-xs-8">
          
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