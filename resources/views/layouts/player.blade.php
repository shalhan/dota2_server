@extends('master')

@section('header-content')
Player
@endsection

@section('header-content-small')
Management
@endsection

@section('content')
<div class"row">
    <div class="col-xs-12">
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
         @if(Session::has('success_edit'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

            {{Session::get('success_edit')}}
        </div>
        @endif
        @if(Session::has('success_adding'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

            {{Session::get('success_adding')}}
        </div>
        @endif
         @if(Session::has('delete_player'))
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

            {{Session::get('delete_player')}}
        </div>
        @endif
        @if(Session::has('nothing_edited'))
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

            {{Session::get('nothing_edited')}}
        </div>
        @endif
        <div class="box">
            <div class="box-header">

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>User ID</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($players as $p)
                        <tr>
                            <td>{{$p->PlayerID}}</td>
                            <td>{{$p->Name}}</td>
                            <td>{{$p->UserId}}</td>
                            <td>{{$p->Email}}X</td>
                            <td>
                                <a href="{{url('editPlayer=' . $p->PlayerID)}}"><i class="fa fa-cog" aria-hidden="true"></i></a>
                                <a href="{{url('delPlayer=' . $p->PlayerID)}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="floating-button">
            <a href="" data-toggle="modal" data-target="#myModal"><i class="ion ion-plus-circled"></i></a>
    </div>

    <div id="myModal" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Add Player</h4>
                    </div>
             
                    <div class="modal-body">
                       <form action="{{route('addPlayer')}}" method="post">
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
                            
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                            </div>
                            <!-- /.col -->
                        </div>
                        </form>
                    </div>
                   
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
</div>
@endsection

 