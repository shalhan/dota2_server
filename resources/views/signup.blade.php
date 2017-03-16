@include('part._header')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Dota2</b>Server</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Register a new membership</p>
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('signup')}}" method="post">
    {{csrf_field()}}
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Full name" name="Name">
   
      </div>
       <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="UserId">

      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="Email">

      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="Password">

      </div>

      <div class="row">
        <div class="col-xs-8">
         <a href="{{route('login')}}" class="text-center">I already have a membership</a>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
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