            <div class="[ col-xs-12 col-sm-6 ]">
                <div class="[ col-xs-12 col-sm-12 ]">
                    <h3>Channel Server & Input Channel</h3>
                    <hr />
                    <div class="[ col-xs-12 form-group ]">
                        {!! Form::label('channel_server_id', trans('global.cso.fields.channel-server').'', ['class' => 'control-label']) !!}
                        {!! Form::select('channel_server_id', $channel_servers, old('channel_server_id'), ['class' => 'form-control']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('channel_server_id'))
                            <p class="help-block">
                                {{ $errors->first('channel_server_id') }}
                            </p>
                        @endif
                    </div>

                    <div class="[ col-xs-12 form-group ]">
                        {!! Form::label('channel_id', trans('global.cso.fields.channel').'', ['class' => 'control-label']) !!}
                        {!! Form::select('channel_id', $channels, old('channel_id'), ['class' => 'form-control']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('channel_id'))
                            <p class="help-block">
                                {{ $errors->first('channel_id') }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="[ col-xs-12 col-sm-12 ]"  id="use_channel_server_localhost_input" style="display: none;">
                    <h3>Local Host Is Being Used</h3>
                    <hr />
                    <div class="[ col-xs-12 alert-warning ]" style="padding:0 0 10px 10px; margin-bottom:15px;">
                        <h3>Localhost Has No Settings to Add It's Done Automatically.</h3>
                    </div>
                </div>


                <div class="[ col-xs-12 col-sm-12 ]" id="select_sync_server_for_a_id_input" style="display: none">
                    <h3>Using Sync Server for Cloud A</h3>
                    <hr />
                    <div class="[ col-xs-12 form-group ]">
                        {!! Form::label('select_sync_server_for_a_id', trans('global.cso.fields.select-sync-server-for-a').'', ['class' => 'control-label']) !!}
                        {!! Form::select('select_sync_server_for_a_id', $select_sync_server_for_as, old('select_sync_server_for_a_id'), ['class' => 'form-control']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('select_sync_server_for_a_id'))
                            <p class="help-block">
                                {{ $errors->first('select_sync_server_for_a_id') }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="[ col-xs-12 col-sm-12 ]" id="select_sync_server_for_b_id_input" style="display: none">
                    <h3>Using Sync Server for Cloud A</h3>
                    <hr />
                    <div class="[ col-xs-12 form-group ]">
                        {!! Form::label('select_sync_server_for_b_id', trans('global.cso.fields.select-sync-server-for-b').'', ['class' => 'control-label']) !!}
                        {!! Form::select('select_sync_server_for_b_id', $select_sync_server_for_bs, old('select_sync_server_for_b_id'), ['class' => 'form-control']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('select_sync_server_for_b_id'))
                            <p class="help-block">
                                {{ $errors->first('select_sync_server_for_b_id') }}
                            </p>
                        @endif
                    </div>
                </div>


                <div class="[ col-xs-12 col-sm-12 ]" id="select_aggregation_server_for_a_id_input" style="display: none">
                    <h3>Using Aggregation Server for Cloud A</h3>
                    <hr />
                    <div class="[ col-xs-12 form-group ]">
                        {!! Form::label('select_aggregation_server_for_a_id', trans('global.cso.fields.select-aggregation-server-for-a').'', ['class' => 'control-label']) !!}
                        {!! Form::select('select_aggregation_server_for_a_id', $select_aggregation_server_for_as, old('select_aggregation_server_for_a_id'), ['class' => 'form-control']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('select_aggregation_server_for_a_id'))
                            <p class="help-block">
                                {{ $errors->first('select_aggregation_server_for_a_id') }}
                            </p>
                        @endif
                    </div>
                </div>


                <div class="[ col-xs-12 col-sm-12 ]" id="select_aggregation_server_for_b_id_input" style="display: none">
                    <h3>UsingAggregation Server for Cloud B</h3>
                    <hr />
                    <div class="[ col-xs-12 form-group ]">
                        {!! Form::label('select_aggregation_server_for_b_id', trans('global.cso.fields.select-aggregation-server-for-b').'', ['class' => 'control-label']) !!}
                        {!! Form::select('select_aggregation_server_for_b_id', $select_aggregation_server_for_bs, old('select_aggregation_server_for_b_id'), ['class' => 'form-control']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('select_aggregation_server_for_b_id'))
                            <p class="help-block">
                                {{ $errors->first('select_aggregation_server_for_b_id') }}
                            </p>
                        @endif
                    </div>
                </div>


                <div class="[ col-xs-12 col-sm-12 ]" id="use_custom_a_input1" style="display: none">
                    <h3>Custom Settings for Cload A</h3>
                    <hr />
                    <div class="[ col-xs-12 col-sm-6 col-md-8 form-group ]">
                        {!! Form::label('ocloud_a', trans('global.cso.fields.ocloud-a').'', ['class' => 'control-label']) !!}
                        {!! Form::text('ocloud_a', old('ocloud_a'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block">Custom URL</p>
                        @if($errors->has('ocloud_a'))
                            <p class="help-block">
                                {{ $errors->first('ocloud_a') }}
                            </p>
                        @endif
                    </div>

                    <div class="[ col-xs-12 col-sm-6 col-md-4 form-group ]">
                        {!! Form::label('ocp_a', trans('global.cso.fields.ocp-a').'', ['class' => 'control-label']) !!}
                        {!! Form::number('ocp_a', old('ocp_a'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block">Custom Port</p>
                        @if($errors->has('ocp_a'))
                            <p class="help-block">
                                {{ $errors->first('ocp_a') }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="[ col-xs-12 col-sm-12 ]"  id="use_custom_for_b_input1" style="display: none">
                    <h3>Custom Settings for Cload B</h3>
                    <hr />
                    <div class="[ col-xs-12 col-sm-6 col-md-8 form-group ]">
                        {!! Form::label('ocloud_b', trans('global.cso.fields.ocloud-b').'', ['class' => 'control-label']) !!}
                        {!! Form::text('ocloud_b', old('ocloud_b'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block">Custom URL</p>
                        @if($errors->has('ocloud_b'))
                            <p class="help-block">
                                {{ $errors->first('ocloud_b') }}
                            </p>
                        @endif
                    </div>

                    <div class="[ col-xs-12 col-sm-6 col-md-4 form-group ]">
                        {!! Form::label('ocp_b', trans('global.cso.fields.ocp-b').'', ['class' => 'control-label']) !!}
                        {!! Form::text('ocp_b', old('ocp_b'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block">Custom Port</p>
                        @if($errors->has('ocp_b'))
                            <p class="help-block">
                                {{ $errors->first('ocp_b') }}
                            </p>
                        @endif
                    </div>
                </div>


            </div>
