@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.csi.title')</h3>
    
    {!! Form::model($csi, ['method' => 'PUT', 'route' => ['admin.csis.update', $csi->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('channel_server_id', trans('global.csi.fields.channel-server').'', ['class' => 'control-label']) !!}
                    {!! Form::select('channel_server_id', $channel_servers, old('channel_server_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('channel_server_id'))
                        <p class="help-block">
                            {{ $errors->first('channel_server_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('channel_id', trans('global.csi.fields.channel').'', ['class' => 'control-label']) !!}
                    {!! Form::select('channel_id', $channels, old('channel_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('channel_id'))
                        <p class="help-block">
                            {{ $errors->first('channel_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('protocol_id', trans('global.csi.fields.protocol').'', ['class' => 'control-label']) !!}
                    {!! Form::select('protocol_id', $protocols, old('protocol_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('protocol_id'))
                        <p class="help-block">
                            {{ $errors->first('protocol_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('move_path', trans('global.csi.fields.move-path').'', ['class' => 'control-label']) !!}
                    {!! Form::text('move_path', old('move_path'), ['class' => 'form-control', 'placeholder' => '/home/caipy/segments_in']) !!}
                    <p class="help-block">/home/caipy/segments_in</p>
                    @if($errors->has('move_path'))
                        <p class="help-block">
                            {{ $errors->first('move_path') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('cs_token', trans('global.csi.fields.cs-token').'', ['class' => 'control-label']) !!}
                    {!! Form::text('cs_token', old('cs_token'), ['class' => 'form-control', 'placeholder' => 'This token has to match the connected channel server and aggregation']) !!}
                    <p class="help-block">This token has to match the connected channel server and aggregation</p>
                    @if($errors->has('cs_token'))
                        <p class="help-block">
                            {{ $errors->first('cs_token') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

