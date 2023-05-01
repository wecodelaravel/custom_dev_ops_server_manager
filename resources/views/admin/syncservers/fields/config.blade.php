                            <div class="col-xs-12 form-group">
                                {!! Form::label('transcoding_server', trans('global.syncservers.fields.transcoding-server').'', ['class' => 'control-label']) !!}
                                {!! Form::text('transcoding_server', old('transcoding_server'), ['class' => 'form-control', 'placeholder' => 'The hostname of the transcoding server (tocai)']) !!}
                                <p class="help-block">The hostname of the transcoding server (tocai)</p>
                                @if($errors->has('transcoding_server'))
                                <p class="help-block">
                                    {{ $errors->first('transcoding_server') }}
                                </p>
                                @endif
                            </div>
                            <div class="col-xs-12 form-group">
                                {!! Form::label('max_upload_filesize', trans('global.syncservers.fields.max-upload-filesize').'', ['class' => 'control-label']) !!}
                                {!! Form::number('max_upload_filesize', old('max_upload_filesize'), ['class' => 'form-control', 'placeholder' => '300MB']) !!}
                                <p class="help-block">300MB</p>
                                @if($errors->has('max_upload_filesize'))
                                <p class="help-block">
                                    {{ $errors->first('max_upload_filesize') }}
                                </p>
                                @endif
                            </div>
                            <div class="col-xs-12 form-group">
                                {!! Form::label('report_time', trans('global.syncservers.fields.report-time').'', ['class' => 'control-label']) !!}
                                {!! Form::text('report_time', old('report_time'), ['class' => 'form-control timepicker', 'placeholder' => 'Enter the time you will receive the daily report']) !!}
                                <p class="help-block">Enter the time you will receive the daily report</p>
                                @if($errors->has('report_time'))
                                <p class="help-block">
                                    {{ $errors->first('report_time') }}
                                </p>
                                @endif
                            </div>
                            <div class="col-xs-12 form-group">
                                {!! Form::label('report_email', trans('global.syncservers.fields.report-email').'', ['class' => 'control-label']) !!}
                                {!! Form::email('report_email', old('report_email'), ['class' => 'form-control', 'placeholder' => 'Enter the email address to where the daily report will be sent']) !!}
                                <p class="help-block">Enter the email address to where the daily report will be sent</p>
                                @if($errors->has('report_email'))
                                <p class="help-block">
                                    {{ $errors->first('report_email') }}
                                </p>
                                @endif
                            </div>
                            <div class="col-xs-12 form-group">
                                {!! Form::label('max_days_channel_history', trans('global.syncservers.fields.max-days-channel-history').'', ['class' => 'control-label']) !!}
                                {!! Form::number('max_days_channel_history', old('max_days_channel_history'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('max_days_channel_history'))
                                <p class="help-block">
                                    {{ $errors->first('max_days_channel_history') }}
                                </p>
                                @endif
                            </div>
                            <div class="col-xs-12 form-group">
                                {!! Form::label('notification_server_type_id', trans('global.syncservers.fields.notification-server-type').'', ['class' => 'control-label']) !!}
                                {!! Form::select('notification_server_type_id', $notification_server_types, old('notification_server_type_id'), ['class' => 'form-control select2']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('notification_server_type_id'))
                                <p class="help-block">
                                    {{ $errors->first('notification_server_type_id') }}
                                </p>
                                @endif
                            </div>
                            <div class="col-xs-12 form-group">
                                {!! Form::label('real_time_notification_url', trans('global.syncservers.fields.real-time-notification-url').'', ['class' => 'control-label']) !!}
                                {!! Form::text('real_time_notification_url', old('real_time_notification_url'), ['class' => 'form-control', 'placeholder' => 'For server-type Caipy the call will provide the following parameters http://yoururl?clip=XXX&channel=XXX&time=XXX&duration=XXX to notify you']) !!}

                                @if($errors->has('real_time_notification_url'))
                                <p class="help-block">
                                    {{ $errors->first('real_time_notification_url') }}
                                </p>
                                @endif
                            </div>
