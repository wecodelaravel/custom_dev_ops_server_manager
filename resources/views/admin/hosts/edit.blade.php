@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.hosts.title')</h3>
    
    {!! Form::model($host, ['method' => 'PUT', 'route' => ['admin.hosts.update', $host->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('global.hosts.fields.name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('host', trans('global.hosts.fields.host').'', ['class' => 'control-label']) !!}
                    {!! Form::text('host', old('host'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('host'))
                        <p class="help-block">
                            {{ $errors->first('host') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('server_exists', trans('global.hosts.fields.server-exists').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('server_exists', 0) !!}
                    {!! Form::checkbox('server_exists', 1, old('server_exists', old('server_exists')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('server_exists'))
                        <p class="help-block">
                            {{ $errors->first('server_exists') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('caipy_is_setup', trans('global.hosts.fields.caipy-is-setup').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('caipy_is_setup', 0) !!}
                    {!! Form::checkbox('caipy_is_setup', 1, old('caipy_is_setup', old('caipy_is_setup')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('caipy_is_setup'))
                        <p class="help-block">
                            {{ $errors->first('caipy_is_setup') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ready_to_receive_conf', trans('global.hosts.fields.ready-to-receive-conf').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('ready_to_receive_conf', 0) !!}
                    {!! Form::checkbox('ready_to_receive_conf', 1, old('ready_to_receive_conf', old('ready_to_receive_conf')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ready_to_receive_conf'))
                        <p class="help-block">
                            {{ $errors->first('ready_to_receive_conf') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('last_received_conf', trans('global.hosts.fields.last-received-conf').'', ['class' => 'control-label']) !!}
                    {!! Form::text('last_received_conf', old('last_received_conf'), ['class' => 'form-control datetime', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('last_received_conf'))
                        <p class="help-block">
                            {{ $errors->first('last_received_conf') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('configured', trans('global.hosts.fields.configured').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('configured', 0) !!}
                    {!! Form::checkbox('configured', 1, old('configured', old('configured')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('configured'))
                        <p class="help-block">
                            {{ $errors->first('configured') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('notes', trans('global.hosts.fields.notes').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('notes', old('notes'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('notes'))
                        <p class="help-block">
                            {{ $errors->first('notes') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('cs_token', trans('global.hosts.fields.cs-token').'', ['class' => 'control-label']) !!}
                    {!! Form::text('cs_token', old('cs_token'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('cs_token'))
                        <p class="help-block">
                            {{ $errors->first('cs_token') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('group_id', trans('global.hosts.fields.group').'', ['class' => 'control-label']) !!}
                    {!! Form::select('group_id', $groups, old('group_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('group_id'))
                        <p class="help-block">
                            {{ $errors->first('group_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('status_id', trans('global.hosts.fields.status').'', ['class' => 'control-label']) !!}
                    {!! Form::select('status_id', $statuses, old('status_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('status_id'))
                        <p class="help-block">
                            {{ $errors->first('status_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('instance_id', trans('global.hosts.fields.instance').'', ['class' => 'control-label']) !!}
                    {!! Form::select('instance_id', $instances, old('instance_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('instance_id'))
                        <p class="help-block">
                            {{ $errors->first('instance_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('rc_id', trans('global.hosts.fields.rc').'', ['class' => 'control-label']) !!}
                    {!! Form::select('rc_id', $rcs, old('rc_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('rc_id'))
                        <p class="help-block">
                            {{ $errors->first('rc_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ss_func_id', trans('global.hosts.fields.ss-func').'', ['class' => 'control-label']) !!}
                    {!! Form::select('ss_func_id', $ss_funcs, old('ss_func_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ss_func_id'))
                        <p class="help-block">
                            {{ $errors->first('ss_func_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });
            
            $('.datetime').datetimepicker({
                format: "{{ config('app.datetime_format_moment') }}",
                locale: "{{ App::getLocale() }}",
                sideBySide: true,
            });
            
        });
    </script>
            
@stop