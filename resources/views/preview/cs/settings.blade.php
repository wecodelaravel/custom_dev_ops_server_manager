@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">Settings CONF Preview</h3>

    <div class="panel panel-default" style="padding: 20px;">
        [AUTHENTIFICATION] <br>
        username=<strong>{!! @$channel_server->username !!}</strong> <br>
        password=<strong>{!! @$channel_server->password !!}</strong> <br>
        <br />
    </div>
@stop

@section('javascript')
    <script>

    </script>
@endsection
