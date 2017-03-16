@extends('master')

@section('header-content')
    Matches
@endsection

@section('header-content-small')
    Management
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12 col-md-8 col-md-offset-2">
         @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(Session::has('createMatch'))
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

            {{Session::get('createMatch')}}
            </div>
        @endif
        @foreach($matches as $match)
        <div class="box box-info acordion">
            <div class="box-header with-border">
                <h3 class="box-title">{{$match->MatchName}}</h3><br>
                <small>{{date("d-m-Y", strtotime($match->Date))}}</small>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
                <!-- /.box-header -->
            <div class="box-body" style="display: block;">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
    
            <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Player</th>
                                        <th></th>
                                        <th style="width: 40px"></th>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Shalhan</td>
                                        <td></td>
                                        <td><span class="badge bg-red">55%</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        @endforeach
        
        <div class="floating-button">
            <a href="" data-toggle="modal" data-target="#myModal"><i class="ion ion-plus-circled"></i></a>
        </div>

        <div id="myModal" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Create Match</h4>
                    </div>
             
                    <div class="modal-body">
                        <form action="{{route('createMatch')}}" method="post">
                        {{csrf_field()}}
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Match Name" name="MatchName">
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <select class="form-control" name="MatchType">
                                    <option selected disabled>Choose match type...</option>
                                    <option value="All-Pick">All-Pick</option>
                                    <option value="All-Random">All-Random</option>
                                    <option value="Captain-Mode">Captain-Mode</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Date</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datepicker" data-date-format="dd/mm/yyyy" name="Date">
                                </div>
                                <!-- /.input group -->
                            </div>
                            
                             <div class="modal-footer">
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
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
</div>
@endsection