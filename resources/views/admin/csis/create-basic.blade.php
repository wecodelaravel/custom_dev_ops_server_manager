@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.csi.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.csis.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="[ col-xs-12 col-sm-12 col-md-12 col-lg-4 form-group ]">
                    {!! Form::label('channel_server_id', trans('global.csi.fields.channel-server').'', ['class' => 'control-label']) !!}
                    {!! Form::select('channel_server_id', $channel_servers, old('channel_server_id'), ['class' => 'form-control ', 'id' => 'channelserver']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('channel_server_id'))
                        <p class="help-block">
                            {{ $errors->first('channel_server_id') }}
                        </p>
                    @endif
                </div>



                <div class="[ col-xs-12 col-sm-12 col-md-12 col-lg-4 form-group ]" id="channel-input" style="display:none;">
                    {!! Form::label('channel_id', trans('global.csi.fields.channel').'', ['class' => 'control-label']) !!}
                    {!! Form::select('channel_id', $channels, old('channel_id'), ['class' => 'form-control ', 'id' => 'channel']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('channel_id'))
                        <p class="help-block">
                            {{ $errors->first('channel_id') }}
                        </p>
                    @endif
                </div>


                <div class="[ col-xs-12 col-sm-12 col-md-12 col-lg-4 form-group ]" id="protocol-input" style="display:none;">
                    {!! Form::label('protocol_id', trans('global.csi.fields.protocol').'', ['class' => 'control-label']) !!}
                    {!! Form::select('protocol_id', $protocols, old('protocol_id'), ['class' => 'form-control', 'id' => 'protocol']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('protocol_id'))
                        <p class="help-block">
                            {{ $errors->first('protocol_id') }}
                        </p>
                    @endif
                </div>



                <div class="[ col-xs-12 col-sm-12 col-md-12 col-lg-4 form-group ]"  id="move-input" style="display:none;">
                    {!! Form::label('move_path', trans('global.csi.fields.move-path').'', ['class' => 'control-label']) !!}
                    {!! Form::text('move_path', old('move_path'), ['class' => 'form-control', 'placeholder' => '/home/caipy/segments_in', 'id' => 'movepath']) !!}
                    <p class="help-block">/home/caipy/segments_in</p>
                    @if($errors->has('move_path'))
                        <p class="help-block">
                            {{ $errors->first('move_path') }}
                        </p>
                    @endif
                </div>
            </div>


        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

@stop

@section('top-script') @endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            $("select").css("width", "100%");
            $("select#channelserver").change(function () {
                if ( $("select#channelserver :selected").text()  ) {
                    $("#channel-input").css("display","block");
                }
            });
            $("select#channel").change(function () {
                if ( $("select#channel :selected").text()  ) {
                    $("#protocol-input").show();
                }
            });
            $("select#protocol").change(function () {
                if ( $("select#protocol :selected").text() == 'MOVE' ) {
                    $("#move-input").show();
                }
            });
        });
    </script>
@endsection
