@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.sync-server-function.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.sync_server_functions.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('type', trans('global.sync-server-function.fields.type').'', ['class' => 'control-label']) !!}
                    {!! Form::text('type', old('type'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('type'))
                        <p class="help-block">
                            {{ $errors->first('type') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', trans('global.sync-server-function.fields.description').'', ['class' => 'control-label']) !!}
                    {!! Form::text('description', old('description'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

