@extends('master')

@section('header-content')
    Add Players
@endsection

@section('header-content-small')
    Management
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Add Players</h3>
            </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="{{url('match=' . $id)}}" method="post">
            {{csrf_field()}}
            @if(count($errors) > 0)
        <div class="alert alert-danger" style="width:80%">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
            <div class="col-md-8">
                <div class="form-group">
                    <select class="form-control select2" multiple="multiple" data-placeholder="Select players" style="width: 100%;" name="player[]">
                        @foreach($players as $p)
                            <option value="{{$p->PlayerID}}">{{$p->Name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
