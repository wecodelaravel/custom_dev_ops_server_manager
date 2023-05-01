@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">Settings CONF Preview</h3>

    <div class="panel panel-default" style="padding: 20px;">
        <pre>
        {{ @$contents }}

        </pre>
        <br />
    </div>
@stop

@section('javascript')
    <script>

    </script>
@endsection
