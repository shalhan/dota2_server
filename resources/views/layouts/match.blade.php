@extends('master')

@section('header-content')
    Matches
@endsection

@section('header-content-small')
    Management
@endsection

@section('content')
<div class="row">
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
        @if(Session::has('createMatch'))
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

            {{Session::get('createMatch')}}
            </div>
        @endif
        @if(Session::has('delete_player_match'))
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

            {{Session::get('delete_player_match')}}
        </div>
        @endif
        @foreach($match as $m)
        <div class="box box-info acordion">
            <div class="box-header with-border">
                <h3 class="box-title"> {{$m->MatchName}} <small> {{$m->MatchType}}</small></h3><br>
                
               <small>{{$m->Date}}</small>

                <div class="box-tools pull-right">
                    
                    <a href="{{url('match=' . $m->MatchID)}}"><i class="fa fa-user-plus green" aria-hidden="true"></i></a>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  
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
                                    <?php 
                                        $players = array(); 
                                        $players = getPlayer($m->MatchID);
                                    ?>
                                    @foreach($players as $key => $player)
                                    <tr>
                                        <td></td>
                                        <td>{{$player}}</td>
                                        <td></td>
                                        <td><a href="{{ url('matchPlayer=' . $key) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                    </tr>
                                    @endforeach
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
                        <div class="form-group has-feedback">
                        <label>Match Name</label>
                            <input type="text" class="form-control" placeholder="Match name.." name="MatchName">
                    
                        </div>
                        <div class="form-group">
                        <label>Match Type</label>
                        <select class="form-control" name="MatchType">
                            <option disabled>Choose match type...</option>
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
                            <input type="text" data-date-format="dd-mm-yy" class="form-control pull-right" id="datepicker" name="Date">
                            </div>
                            <!-- /.input group -->
                        </div>
                       

                        <div class="row">
                            <div class="col-xs-8">
                            
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
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
</div>
@endsection