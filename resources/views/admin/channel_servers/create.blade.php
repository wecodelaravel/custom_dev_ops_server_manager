@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.channel-server.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.channel_servers.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>

        <div class="panel-body">

            <div class="row">
                <div class="col-xs-12 col-md-9 col-lg-9">
                    <div class="col-xs-12  col-md-4  col-lg-4 form-group">
                        {!! Form::label('cs_name', trans('global.channel-server.fields.cs-name').'*', ['class' => 'control-label']) !!}
                        {!! Form::text('cs_name', old('cs_name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('cs_name'))
                            <p class="help-block">
                                {{ $errors->first('cs_name') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12  col-md-4  col-lg-4 form-group">
                        {!! Form::label('cs_host', trans('global.channel-server.fields.cs-host').'', ['class' => 'control-label']) !!}
                        {!! Form::text('cs_host', old('cs_host'), ['class' => 'form-control', 'placeholder' => 'Enter the server / url host address for this channel server']) !!}
                        <p class="help-block">Enter the server / url host address for this channel server</p>
                        @if($errors->has('cs_host'))
                            <p class="help-block">
                                {{ $errors->first('cs_host') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12  col-md-4  col-lg-4 form-group">
                        {!! Form::label('cs_host_ip', trans('global.channel-server.fields.cs-host-ip').'', ['class' => 'control-label']) !!}
                        {!! Form::text('cs_host_ip', old('cs_host_ip'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('cs_host_ip'))
                            <p class="help-block">
                                {{ $errors->first('cs_host_ip') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 form-group">
                        {!! Form::label('notes', trans('global.channel-server.fields.notes').'', ['class' => 'control-label']) !!}
                        {!! Form::textarea('notes', old('notes'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('notes'))
                            <p class="help-block">
                                {{ $errors->first('notes') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 col-lg-3">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('username', trans('global.channel-server.fields.username').'', ['class' => 'control-label']) !!}
                        {!! Form::text('username', old('username'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('username'))
                            <p class="help-block">
                                {{ $errors->first('username') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 form-group">
                        {!! Form::label('password', trans('global.channel-server.fields.password').'', ['class' => 'control-label']) !!}
                        {!! Form::text('password', old('password'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('password'))
                            <p class="help-block">
                                {{ $errors->first('password') }}
                            </p>
                        @endif
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('default_cloud_a_address', trans('global.channel-server.fields.default-cloud-a-address').'', ['class' => 'control-label']) !!}
                        {!! Form::text('default_cloud_a_address', old('default_cloud_a_address'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('default_cloud_a_address'))
                            <p class="help-block">
                                {{ $errors->first('default_cloud_a_address') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 form-group">
                        {!! Form::label('default_cloud_a_port', trans('global.channel-server.fields.default-cloud-a-port').'', ['class' => 'control-label']) !!}
                        {!! Form::text('default_cloud_a_port', old('default_cloud_a_port'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('default_cloud_a_port'))
                            <p class="help-block">
                                {{ $errors->first('default_cloud_a_port') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('default_cloud_b_address', trans('global.channel-server.fields.default-cloud-b-address').'', ['class' => 'control-label']) !!}
                        {!! Form::text('default_cloud_b_address', old('default_cloud_b_address'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('default_cloud_b_address'))
                            <p class="help-block">
                                {{ $errors->first('default_cloud_b_address') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 form-group">
                        {!! Form::label('default_cloud_b_port', trans('global.channel-server.fields.default-cloud-b-port').'', ['class' => 'control-label']) !!}
                        {!! Form::text('default_cloud_b_port', old('default_cloud_b_port'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('default_cloud_b_port'))
                            <p class="help-block">
                                {{ $errors->first('default_cloud_b_port') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('local_output', trans('global.channel-server.fields.local-output').'', ['class' => 'control-label']) !!}
                        {!! Form::text('local_output', old('local_output'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('local_output'))
                            <p class="help-block">
                                {{ $errors->first('local_output') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 form-group">
                        {!! Form::label('local_output_port', trans('global.channel-server.fields.local-output-port').'', ['class' => 'control-label']) !!}
                        {!! Form::text('local_output_port', old('local_output_port'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('local_output_port'))
                            <p class="help-block">
                                {{ $errors->first('local_output_port') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top:15px;">
                <div class="col-xs-12 col-md-3 col-lg-2 form-group">
                    {!! Form::label('group_id', trans('global.channel-server.fields.group').'', ['class' => 'control-label']) !!}
                    {!! Form::select('group_id', $groups, old('group_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('group_id'))
                        <p class="help-block">
                            {{ $errors->first('group_id') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 col-md-3 col-lg-4 form-group">
                    {!! Form::label('host_id', trans('global.channel-server.fields.host').'', ['class' => 'control-label']) !!}
                    {!! Form::select('host_id', $hosts, old('host_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('host_id'))
                        <p class="help-block">
                            {{ $errors->first('host_id') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6 form-group">
                    {!! Form::label('cs_token', trans('global.channel-server.fields.cs-token').'', ['class' => 'control-label']) !!}
                    {!! Form::text('cs_token', old('cs_token'), ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('cs_token'))
                        <p class="help-block">
                            {{ $errors->first('cs_token') }}
                        </p>
                    @endif
                </div>

                <div class="col-xs-12 form-group">
                    {!! Form::label('license', trans('global.channel-server.fields.license').'', ['class' => 'control-label']) !!}
                    {!! Form::text('license', old('license'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('license'))
                        <p class="help-block">
                            {{ $errors->first('license') }}
                        </p>
                    @endif
                </div>
            </div>


        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

