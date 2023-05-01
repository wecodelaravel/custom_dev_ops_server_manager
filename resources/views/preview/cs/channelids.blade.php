@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">ChannelIDs Preview</h3>
    <br />
    <div id="conf-preview" class="col-md-6" style="margin-left:20px;font-size: 1.5em;">
    @if(count($csis) > 0)
        <pre>
        @foreach ($csis as $csi)
        {{ $csi->channel->source_name ?? '' }}, {{ $csi->channel->env ?? '' }}
        @endforeach
        </pre>
    @endif
    </div>
@stop

@section('javascript')
    <script>

    </script>
@endsection

@section('page-style')
<style>
#conf-preview {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
        "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji",
        "Segoe UI Emoji", "Segoe UI Symbol";
  }
</style>
@endsection
