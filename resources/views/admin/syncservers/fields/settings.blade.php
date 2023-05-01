                <div class="col-xs-12 form-group">
                    {!! Form::label('ss_type_id', trans('global.syncservers.fields.ss-type').'', ['class' => 'control-label']) !!}
                    {!! Form::select('ss_type_id', $ss_types, old('ss_type_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ss_type_id'))
                        <p class="help-block">
                            {{ $errors->first('ss_type_id') }}
                        </p>
                    @endif
                </div>

                            <div class="col-xs-12 form-group">
                                {!! Form::label('ss_name', trans('global.syncservers.fields.ss-name').'', ['class' => 'control-label']) !!}
                                {!! Form::text('ss_name', old('ss_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('ss_name'))
                                <p class="help-block">
                                    {{ $errors->first('ss_name') }}
                                </p>
                                @endif
                            </div>
                            <div class="col-xs-12 form-group">
                                {!! Form::label('ss_host_url', trans('global.syncservers.fields.ss-host-url').'', ['class' => 'control-label']) !!}
                                {!! Form::text('ss_host_url', old('ss_host_url'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('ss_host_url'))
                                <p class="help-block">
                                    {{ $errors->first('ss_host_url') }}
                                </p>
                                @endif
                            </div>
                            <div class="col-xs-12 form-group">
                                {!! Form::label('ss_hostip', trans('global.syncservers.fields.ss-hostip').'', ['class' => 'control-label']) !!}
                                {!! Form::text('ss_hostip', old('ss_hostip'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('ss_hostip'))
                                <p class="help-block">
                                    {{ $errors->first('ss_hostip') }}
                                </p>
                                @endif
                            </div>
                            <div class="col-xs-12 form-group">
                                {!! Form::label('group_id', trans('global.syncservers.fields.group').'', ['class' => 'control-label', 'disabled' => 'disabled']) !!}
                                {!! Form::select('group_id', $groups, old('group_id'), ['class' => 'form-control select2']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('group_id'))
                                <p class="help-block">
                                    {{ $errors->first('group_id') }}
                                </p>
                                @endif
                            </div>
                            <div class="col-xs-12 form-group">
                                {!! Form::label('channel_server_id', trans('global.syncservers.fields.channel-server').'', ['class' => 'control-label']) !!}
                                {!! Form::select('channel_server_id', $channel_servers, old('channel_server_id'), ['class' => 'form-control select2']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('channel_server_id'))
                                <p class="help-block">
                                    {{ $errors->first('channel_server_id') }}
                                </p>
                                @endif
                            </div>

{{--                             <div class="col-xs-12 form-group">
                                {!! Form::label('cs_token', trans('global.syncservers.fields.cs-token').'', ['class' => 'control-label']) !!}
                                {!! Form::text('cs_token', old('cs_token'), ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                <p class="help-block">This needs to match the token from the channel server</p>
                                @if($errors->has('cs_token'))
                                <p class="help-block">
                                    {{ $errors->first('cs_token') }}
                                </p>
                                @endif
                            </div>

                            <div class="col-xs-12 form-group">
                                {!! Form::label('host_id', trans('global.syncservers.fields.host').'', ['class' => 'control-label']) !!}
                                {!! Form::select('host_id', $hosts, old('host_id'), ['class' => 'form-control select2', 'disabled' => 'disabled']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('host_id'))
                                <p class="help-block">
                                    {{ $errors->first('host_id') }}
                                </p>
                                @endif
                            </div> --}}
