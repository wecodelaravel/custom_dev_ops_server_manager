@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">Settings CONF Preview</h3>

    <div class="panel panel-default" style="padding: 20px;">
        <div id="conf-preview" class="col-md-6" style="margin-left:20px;font-size: 1.5em;">
            <pre>
            {!! $contents !!}
            </pre>
        </div>
        <br style="clear:both;" />
    </div>
@stop

@section('javascript')
    <script>

    </script>
@endsection
