@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.status.title')</h3>
    
    {!! Form::model($status, ['method' => 'PUT', 'route' => ['admin.statuses.update', $status->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('status', trans('global.status.fields.status').'', ['class' => 'control-label']) !!}
                    {!! Form::text('status', old('status'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('status'))
                        <p class="help-block">
                            {{ $errors->first('status') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

