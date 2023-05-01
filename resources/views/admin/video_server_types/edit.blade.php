@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.video-server-types.title')</h3>
    
    {!! Form::model($video_server_type, ['method' => 'PUT', 'route' => ['admin.video_server_types.update', $video_server_type->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('video_server_type', trans('global.video-server-types.fields.video-server-type').'', ['class' => 'control-label']) !!}
                    {!! Form::text('video_server_type', old('video_server_type'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('video_server_type'))
                        <p class="help-block">
                            {{ $errors->first('video_server_type') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

