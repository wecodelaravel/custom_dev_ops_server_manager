@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.role-conventions.title')</h3>
    
    {!! Form::model($role_convention, ['method' => 'PUT', 'route' => ['admin.role_conventions.update', $role_convention->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('role_convention', trans('global.role-conventions.fields.role-convention').'', ['class' => 'control-label']) !!}
                    {!! Form::text('role_convention', old('role_convention'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('role_convention'))
                        <p class="help-block">
                            {{ $errors->first('role_convention') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('role_convention_value', trans('global.role-conventions.fields.role-convention-value').'', ['class' => 'control-label']) !!}
                    {!! Form::text('role_convention_value', old('role_convention_value'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('role_convention_value'))
                        <p class="help-block">
                            {{ $errors->first('role_convention_value') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

