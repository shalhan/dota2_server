@extends('master')

@section('header-content')
    Edit Players
@endsection

@section('header-content-small')

@endsection

@section('content')
<div class="row">
    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <div class="box">
            <div class="box-header">
                <h4>Edit Player</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="{{ url('editPlayer=' . $id) }}" method="post">
                    {{csrf_field()}}
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="{{$players->Name}}" name="Name">
                
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="{{$players->UserId}}" name="UserId">

                    </div>
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="{{$players->Email}}" name="Email">

                    </div>


                    <div class="row">
                        <div class="col-xs-8">
                        
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Edit</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    </form>
                </div>
            </div>
    </div>
</div>

@endsection
