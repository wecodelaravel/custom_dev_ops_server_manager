@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.channels.title')</h3>
    
    {!! Form::model($channel, ['method' => 'PUT', 'route' => ['admin.channels.update', $channel->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('source_name', trans('global.channels.fields.source-name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('source_name', old('source_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('source_name'))
                        <p class="help-block">
                            {{ $errors->first('source_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('channelid', trans('global.channels.fields.channelid').'', ['class' => 'control-label']) !!}
                    {!! Form::text('channelid', old('channelid'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('channelid'))
                        <p class="help-block">
                            {{ $errors->first('channelid') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('env', trans('global.channels.fields.env').'', ['class' => 'control-label']) !!}
                    {!! Form::text('env', old('env'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('env'))
                        <p class="help-block">
                            {{ $errors->first('env') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ffmpegsource', trans('global.channels.fields.ffmpegsource').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ffmpegsource', old('ffmpegsource'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ffmpegsource'))
                        <p class="help-block">
                            {{ $errors->first('ffmpegsource') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ssm', trans('global.channels.fields.ssm').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ssm', old('ssm'), ['class' => 'form-control', 'placeholder' => 'UDP :// {IP}']) !!}
                    <p class="help-block">UDP :// {IP}</p>
                    @if($errors->has('ssm'))
                        <p class="help-block">
                            {{ $errors->first('ssm') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('imc', trans('global.channels.fields.imc').'', ['class' => 'control-label']) !!}
                    {!! Form::text('imc', old('imc'), ['class' => 'form-control', 'placeholder' => 'Source= IP of UDP ']) !!}
                    <p class="help-block">Source= IP of UDP </p>
                    @if($errors->has('imc'))
                        <p class="help-block">
                            {{ $errors->first('imc') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('port', trans('global.channels.fields.port').'', ['class' => 'control-label']) !!}
                    {!! Form::text('port', old('port'), ['class' => 'form-control', 'placeholder' => 'IP in Conf Files']) !!}
                    <p class="help-block">IP in Conf Files</p>
                    @if($errors->has('port'))
                        <p class="help-block">
                            {{ $errors->first('port') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('pid', trans('global.channels.fields.pid').'', ['class' => 'control-label']) !!}
                    {!! Form::text('pid', old('pid'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('pid'))
                        <p class="help-block">
                            {{ $errors->first('pid') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('source_ip', trans('global.channels.fields.source-ip').'', ['class' => 'control-label']) !!}
                    {!! Form::text('source_ip', old('source_ip'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('source_ip'))
                        <p class="help-block">
                            {{ $errors->first('source_ip') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('udp', trans('global.channels.fields.udp').'', ['class' => 'control-label']) !!}
                    {!! Form::text('udp', old('udp'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('udp'))
                        <p class="help-block">
                            {{ $errors->first('udp') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('valid_as_of', trans('global.channels.fields.valid-as-of').'', ['class' => 'control-label']) !!}
                    {!! Form::text('valid_as_of', old('valid_as_of'), ['class' => 'form-control datetime', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('valid_as_of'))
                        <p class="help-block">
                            {{ $errors->first('valid_as_of') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('csi_id', trans('global.channels.fields.csi').'', ['class' => 'control-label']) !!}
                    {!! Form::select('csi_id', $csis, old('csi_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('csi_id'))
                        <p class="help-block">
                            {{ $errors->first('csi_id') }}
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