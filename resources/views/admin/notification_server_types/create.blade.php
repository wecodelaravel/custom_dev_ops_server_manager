@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.notification-server-types.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.notification_server_types.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('notification_server_type', trans('global.notification-server-types.fields.notification-server-type').'', ['class' => 'control-label']) !!}
                    {!! Form::text('notification_server_type', old('notification_server_type'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('notification_server_type'))
                        <p class="help-block">
                            {{ $errors->first('notification_server_type') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

