@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.group.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.groups.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>

        <div class="panel-body">

            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('group', trans('global.group.fields.group').'', ['class' => 'control-label']) !!}
                            {!! Form::number('group', old('group'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('group'))
                                <p class="help-block">
                                    {{ $errors->first('group') }}
                                </p>
                            @endif
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('notes', trans('global.group.fields.notes').'', ['class' => 'control-label']) !!}
                            {!! Form::textarea('notes', old('notes'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('notes'))
                                <p class="help-block">
                                    {{ $errors->first('notes') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    @include('partials.group-instructions')
                </div>
            </div>

        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

