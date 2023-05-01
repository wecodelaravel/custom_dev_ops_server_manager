                           <div class="col-xs-12 form-group">

                                {!! Form::hidden('millisecond_precision', 0) !!}
                                {!! Form::checkbox('millisecond_precision', 1, old('millisecond_precision', old('millisecond_precision')), ['class' => 'minimal-red']) !!}
                                &nbsp;
                                {!! Form::label('millisecond_precision', trans('global.syncservers.fields.millisecond-precision').'', ['class' => 'control-label']) !!}

                                <p class="help-block"></p>
                                @if($errors->has('millisecond_precision'))
                                <p class="help-block">
                                    {{ $errors->first('millisecond_precision') }}
                                </p>
                                @endif
                            </div>
                            <div class="col-xs-12 form-group">

                                {!! Form::hidden('show_channel_button', 0) !!}
                                {!! Form::checkbox('show_channel_button', 1, old('show_channel_button', old('show_channel_button')), ['class' => 'minimal-red']) !!}
                                &nbsp;
                                {!! Form::label('show_channel_button', trans('global.syncservers.fields.show-channel-button').'', ['class' => 'control-label']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('show_channel_button'))
                                <p class="help-block">
                                    {{ $errors->first('show_channel_button') }}
                                </p>
                                @endif
                            </div>
                            <div class="col-xs-12 form-group">

                                {!! Form::hidden('show_clip_button', 0) !!}
                                {!! Form::checkbox('show_clip_button', 1, old('show_clip_button', old('show_clip_button')), ['class' => 'minimal-red']) !!}
                                &nbsp;
                                {!! Form::label('show_clip_button', trans('global.syncservers.fields.show-clip-button').'', ['class' => 'control-label']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('show_clip_button'))
                                <p class="help-block">
                                    {{ $errors->first('show_clip_button') }}
                                </p>
                                @endif
                            </div>
                            <div class="col-xs-12 form-group">

                                {!! Form::hidden('show_group_button', 0) !!}
                                {!! Form::checkbox('show_group_button', 1, old('show_group_button', old('show_group_button')), ['class' => 'minimal-red']) !!}
                                &nbsp;
                                {!! Form::label('show_group_button', trans('global.syncservers.fields.show-group-button').'', ['class' => 'control-label']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('show_group_button'))
                                <p class="help-block">
                                    {{ $errors->first('show_group_button') }}
                                </p>
                                @endif
                            </div>
                            <div class="col-xs-12 form-group">

                                {!! Form::hidden('show_live_button', 0) !!}
                                {!! Form::checkbox('show_live_button', 1, old('show_live_button', old('show_live_button')), ['class' => 'minimal-red']) !!}
                                &nbsp;
                                {!! Form::label('show_live_button', trans('global.syncservers.fields.show-live-button').'', ['class' => 'control-label']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('show_live_button'))
                                <p class="help-block">
                                    {{ $errors->first('show_live_button') }}
                                </p>
                                @endif
                            </div>
                            <div class="col-xs-12 form-group">

                                {!! Form::hidden('enable_evt', 0) !!}
                                {!! Form::checkbox('enable_evt', 1, old('enable_evt', old('enable_evt')), ['class' => 'minimal-red']) !!}
                                &nbsp;
                                {!! Form::label('enable_evt', trans('global.syncservers.fields.enable-evt').'', ['class' => 'control-label']) !!}
                                <p class="help-block">Enable Guide Information</p>
                                @if($errors->has('enable_evt'))
                                <p class="help-block">
                                    {{ $errors->first('enable_evt') }}
                                </p>
                                @endif
                            </div>
                            <div class="col-xs-12 form-group">

                                {!! Form::hidden('enable_excel', 0) !!}
                                {!! Form::checkbox('enable_excel', 1, old('enable_excel', old('enable_excel')), ['class' => 'minimal-red']) !!}
                                &nbsp;
                                {!! Form::label('enable_excel', trans('global.syncservers.fields.enable-excel').'', ['class' => 'control-label']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('enable_excel'))
                                <p class="help-block">
                                    {{ $errors->first('enable_excel') }}
                                </p>
                                @endif
                            </div>
                            <div class="col-xs-12 form-group">
                                {!! Form::label('enable_evt_timing', trans('global.syncservers.fields.enable-evt-timing').'', ['class' => 'control-label']) !!}
                                {!! Form::text('enable_evt_timing', old('enable_evt_timing'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('enable_evt_timing'))
                                <p class="help-block">
                                    {{ $errors->first('enable_evt_timing') }}
                                </p>
                                @endif
                            </div>

                            <div class="col-xs-12 form-group">
                                {!! Form::label('timezone_id', trans('global.syncservers.fields.timezone').'', ['class' => 'control-label']) !!}
                                {!! Form::select('timezone_id', $timezones, old('timezone_id'), ['class' => 'form-control select2']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('timezone_id'))
                                <p class="help-block">
                                    {{ $errors->first('timezone_id') }}
                                </p>
                                @endif
                            </div>

                            <div class="col-xs-12 form-group">
                                {!! Form::label('filter_preset_for_ui_id', trans('global.syncservers.fields.filter-preset-for-ui').'', ['class' => 'control-label']) !!}
                                {!! Form::select('filter_preset_for_ui_id', $filter_preset_for_uis, old('filter_preset_for_ui_id'), ['class' => 'form-control select2']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('filter_preset_for_ui_id'))
                                <p class="help-block">
                                    {{ $errors->first('filter_preset_for_ui_id') }}
                                </p>
                                @endif
                            </div>

                            <div class="col-xs-12 form-group">
                                {!! Form::label('country_id', trans('global.syncservers.fields.country').'', ['class' => 'control-label']) !!}
                                {!! Form::select('country_id', $countries, old('country_id'), ['class' => 'form-control select2']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('country_id'))
                                <p class="help-block">
                                    {{ $errors->first('country_id') }}
                                </p>
                                @endif
                            </div>
