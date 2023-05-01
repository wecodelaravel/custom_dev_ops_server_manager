@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.environment.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.environments.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('environment', trans('global.environment.fields.environment').'', ['class' => 'control-label']) !!}
                    {!! Form::text('environment', old('environment'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('environment'))
                        <p class="help-block">
                            {{ $errors->first('environment') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('env_value', trans('global.environment.fields.env-value').'', ['class' => 'control-label']) !!}
                    {!! Form::text('env_value', old('env_value'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('env_value'))
                        <p class="help-block">
                            {{ $errors->first('env_value') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

