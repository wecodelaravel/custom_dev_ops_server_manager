@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.aggregation-server.title')</h3>
    
    {!! Form::model($aggregation_server, ['method' => 'PUT', 'route' => ['admin.aggregation_servers.update', $aggregation_server->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('group_id', trans('global.aggregation-server.fields.group').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('channel_server_id', trans('global.aggregation-server.fields.channel-server').'', ['class' => 'control-label']) !!}
                    {!! Form::select('channel_server_id', $channel_servers, old('channel_server_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('channel_server_id'))
                        <p class="help-block">
                            {{ $errors->first('channel_server_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('as_name', trans('global.aggregation-server.fields.as-name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('as_name', old('as_name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('as_name'))
                        <p class="help-block">
                            {{ $errors->first('as_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('as_host_url', trans('global.aggregation-server.fields.as-host-url').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('as_host_url', old('as_host_url'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('as_host_url'))
                        <p class="help-block">
                            {{ $errors->first('as_host_url') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('as_hostip', trans('global.aggregation-server.fields.as-hostip').'', ['class' => 'control-label']) !!}
                    {!! Form::text('as_hostip', old('as_hostip'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('as_hostip'))
                        <p class="help-block">
                            {{ $errors->first('as_hostip') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('grab_time', trans('global.aggregation-server.fields.grab-time').'', ['class' => 'control-label']) !!}
                    {!! Form::text('grab_time', old('grab_time'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('grab_time'))
                        <p class="help-block">
                            {{ $errors->first('grab_time') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('transcoding_server', trans('global.aggregation-server.fields.transcoding-server').'', ['class' => 'control-label']) !!}
                    {!! Form::text('transcoding_server', old('transcoding_server'), ['class' => 'form-control', 'placeholder' => 'The hostname of the transcoding server (tocai)']) !!}
                    <p class="help-block">The hostname of the transcoding server (tocai)</p>
                    @if($errors->has('transcoding_server'))
                        <p class="help-block">
                            {{ $errors->first('transcoding_server') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('max_upload_filesize', trans('global.aggregation-server.fields.max-upload-filesize').'', ['class' => 'control-label']) !!}
                    {!! Form::number('max_upload_filesize', old('max_upload_filesize'), ['class' => 'form-control', 'placeholder' => '300MB']) !!}
                    <p class="help-block">300MB</p>
                    @if($errors->has('max_upload_filesize'))
                        <p class="help-block">
                            {{ $errors->first('max_upload_filesize') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('report_time', trans('global.aggregation-server.fields.report-time').'', ['class' => 'control-label']) !!}
                    {!! Form::text('report_time', old('report_time'), ['class' => 'form-control timepicker', 'placeholder' => 'Enter the time you will receive the daily report']) !!}
                    <p class="help-block">Enter the time you will receive the daily report</p>
                    @if($errors->has('report_time'))
                        <p class="help-block">
                            {{ $errors->first('report_time') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('report_email', trans('global.aggregation-server.fields.report-email').'', ['class' => 'control-label']) !!}
                    {!! Form::email('report_email', old('report_email'), ['class' => 'form-control', 'placeholder' => 'Enter the email address to where the daily report will be sent']) !!}
                    <p class="help-block">Enter the email address to where the daily report will be sent</p>
                    @if($errors->has('report_email'))
                        <p class="help-block">
                            {{ $errors->first('report_email') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('max_days_channel_history', trans('global.aggregation-server.fields.max-days-channel-history').'', ['class' => 'control-label']) !!}
                    {!! Form::number('max_days_channel_history', old('max_days_channel_history'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('max_days_channel_history'))
                        <p class="help-block">
                            {{ $errors->first('max_days_channel_history') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('notification_server_type_id', trans('global.aggregation-server.fields.notification-server-type').'', ['class' => 'control-label']) !!}
                    {!! Form::select('notification_server_type_id', $notification_server_types, old('notification_server_type_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('notification_server_type_id'))
                        <p class="help-block">
                            {{ $errors->first('notification_server_type_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('real_time_notification_url', trans('global.aggregation-server.fields.real-time-notification-url').'', ['class' => 'control-label']) !!}
                    {!! Form::text('real_time_notification_url', old('real_time_notification_url'), ['class' => 'form-control', 'placeholder' => 'For server-type Caipy the call will provide the following parameters http://yoururl?clip=XXX&channel=XXX&time=XXX&duration=XXX to notify you']) !!}
                    <p class="help-block">For server-type Caipy the call will provide the following parameters http://yoururl?clip=XXX&channel=XXX&time=XXX&duration=XXX to notify you</p>
                    @if($errors->has('real_time_notification_url'))
                        <p class="help-block">
                            {{ $errors->first('real_time_notification_url') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('basic_discovery_enabled', trans('global.aggregation-server.fields.basic-discovery-enabled').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('basic_discovery_enabled', 0) !!}
                    {!! Form::checkbox('basic_discovery_enabled', 1, old('basic_discovery_enabled', old('basic_discovery_enabled')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('basic_discovery_enabled'))
                        <p class="help-block">
                            {{ $errors->first('basic_discovery_enabled') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('continuous_discovery_enabled', trans('global.aggregation-server.fields.continuous-discovery-enabled').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('continuous_discovery_enabled', 0) !!}
                    {!! Form::checkbox('continuous_discovery_enabled', 1, old('continuous_discovery_enabled', old('continuous_discovery_enabled')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('continuous_discovery_enabled'))
                        <p class="help-block">
                            {{ $errors->first('continuous_discovery_enabled') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('username', trans('global.aggregation-server.fields.username').'', ['class' => 'control-label']) !!}
                    {!! Form::text('username', old('username'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('username'))
                        <p class="help-block">
                            {{ $errors->first('username') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('password', trans('global.aggregation-server.fields.password').'', ['class' => 'control-label']) !!}
                    {!! Form::text('password', old('password'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('advanced_username', trans('global.aggregation-server.fields.advanced-username').'', ['class' => 'control-label']) !!}
                    {!! Form::text('advanced_username', old('advanced_username'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('advanced_username'))
                        <p class="help-block">
                            {{ $errors->first('advanced_username') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('advanced_password', trans('global.aggregation-server.fields.advanced-password').'', ['class' => 'control-label']) !!}
                    {!! Form::text('advanced_password', old('advanced_password'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('advanced_password'))
                        <p class="help-block">
                            {{ $errors->first('advanced_password') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('millisecond_precision', trans('global.aggregation-server.fields.millisecond-precision').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('millisecond_precision', 0) !!}
                    {!! Form::checkbox('millisecond_precision', 1, old('millisecond_precision', old('millisecond_precision')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('millisecond_precision'))
                        <p class="help-block">
                            {{ $errors->first('millisecond_precision') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('show_channel_button', trans('global.aggregation-server.fields.show-channel-button').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('show_channel_button', 0) !!}
                    {!! Form::checkbox('show_channel_button', 1, old('show_channel_button', old('show_channel_button')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('show_channel_button'))
                        <p class="help-block">
                            {{ $errors->first('show_channel_button') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('show_clip_button', trans('global.aggregation-server.fields.show-clip-button').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('show_clip_button', 0) !!}
                    {!! Form::checkbox('show_clip_button', 1, old('show_clip_button', old('show_clip_button')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('show_clip_button'))
                        <p class="help-block">
                            {{ $errors->first('show_clip_button') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('show_group_button', trans('global.aggregation-server.fields.show-group-button').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('show_group_button', 0) !!}
                    {!! Form::checkbox('show_group_button', 1, old('show_group_button', old('show_group_button')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('show_group_button'))
                        <p class="help-block">
                            {{ $errors->first('show_group_button') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('show_live_button', trans('global.aggregation-server.fields.show-live-button').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('show_live_button', 0) !!}
                    {!! Form::checkbox('show_live_button', 1, old('show_live_button', old('show_live_button')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('show_live_button'))
                        <p class="help-block">
                            {{ $errors->first('show_live_button') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('enable_evt', trans('global.aggregation-server.fields.enable-evt').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('enable_evt', 0) !!}
                    {!! Form::checkbox('enable_evt', 1, old('enable_evt', old('enable_evt')), []) !!}
                    <p class="help-block">Enable Guide Information</p>
                    @if($errors->has('enable_evt'))
                        <p class="help-block">
                            {{ $errors->first('enable_evt') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('enable_excel', trans('global.aggregation-server.fields.enable-excel').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('enable_excel', 0) !!}
                    {!! Form::checkbox('enable_excel', 1, old('enable_excel', old('enable_excel')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('enable_excel'))
                        <p class="help-block">
                            {{ $errors->first('enable_excel') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('enable_evt_timing', trans('global.aggregation-server.fields.enable-evt-timing').'', ['class' => 'control-label']) !!}
                    {!! Form::text('enable_evt_timing', old('enable_evt_timing'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('enable_evt_timing'))
                        <p class="help-block">
                            {{ $errors->first('enable_evt_timing') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('timezone_id', trans('global.aggregation-server.fields.timezone').'', ['class' => 'control-label']) !!}
                    {!! Form::select('timezone_id', $timezones, old('timezone_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('timezone_id'))
                        <p class="help-block">
                            {{ $errors->first('timezone_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('filter_preset_for_ui_id', trans('global.aggregation-server.fields.filter-preset-for-ui').'', ['class' => 'control-label']) !!}
                    {!! Form::select('filter_preset_for_ui_id', $filter_preset_for_uis, old('filter_preset_for_ui_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('filter_preset_for_ui_id'))
                        <p class="help-block">
                            {{ $errors->first('filter_preset_for_ui_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('country_id', trans('global.aggregation-server.fields.country').'', ['class' => 'control-label']) !!}
                    {!! Form::select('country_id', $countries, old('country_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('country_id'))
                        <p class="help-block">
                            {{ $errors->first('country_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('video_server_type_id', trans('global.aggregation-server.fields.video-server-type').'', ['class' => 'control-label']) !!}
                    {!! Form::select('video_server_type_id', $video_server_types, old('video_server_type_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('video_server_type_id'))
                        <p class="help-block">
                            {{ $errors->first('video_server_type_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('video_server_url', trans('global.aggregation-server.fields.video-server-url').'', ['class' => 'control-label']) !!}
                    {!! Form::text('video_server_url', old('video_server_url'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('video_server_url'))
                        <p class="help-block">
                            {{ $errors->first('video_server_url') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('video_server_redirect', trans('global.aggregation-server.fields.video-server-redirect').'', ['class' => 'control-label']) !!}
                    {!! Form::text('video_server_redirect', old('video_server_redirect'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('video_server_redirect'))
                        <p class="help-block">
                            {{ $errors->first('video_server_redirect') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('video_hls_shift', trans('global.aggregation-server.fields.video-hls-shift').'', ['class' => 'control-label']) !!}
                    {!! Form::number('video_hls_shift', old('video_hls_shift'), ['class' => 'form-control', 'placeholder' => 'Enter the hlsshift (example : +0)']) !!}
                    <p class="help-block">Enter the hlsshift (example : +0)</p>
                    @if($errors->has('video_hls_shift'))
                        <p class="help-block">
                            {{ $errors->first('video_hls_shift') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('dai_ads_length', trans('global.aggregation-server.fields.dai-ads-length').'', ['class' => 'control-label']) !!}
                    {!! Form::text('dai_ads_length', old('dai_ads_length'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dai_ads_length'))
                        <p class="help-block">
                            {{ $errors->first('dai_ads_length') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('dai_notifications', trans('global.aggregation-server.fields.dai-notifications').'', ['class' => 'control-label']) !!}
                    {!! Form::text('dai_notifications', old('dai_notifications'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dai_notifications'))
                        <p class="help-block">
                            {{ $errors->first('dai_notifications') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('hls_shift_per_channel', trans('global.aggregation-server.fields.hls-shift-per-channel').'', ['class' => 'control-label']) !!}
                    {!! Form::text('hls_shift_per_channel', old('hls_shift_per_channel'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('hls_shift_per_channel'))
                        <p class="help-block">
                            {{ $errors->first('hls_shift_per_channel') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('dai_ad_lengths_per_channel', trans('global.aggregation-server.fields.dai-ad-lengths-per-channel').'', ['class' => 'control-label']) !!}
                    {!! Form::text('dai_ad_lengths_per_channel', old('dai_ad_lengths_per_channel'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dai_ad_lengths_per_channel'))
                        <p class="help-block">
                            {{ $errors->first('dai_ad_lengths_per_channel') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('dai_offsets_per_channel', trans('global.aggregation-server.fields.dai-offsets-per-channel').'', ['class' => 'control-label']) !!}
                    {!! Form::text('dai_offsets_per_channel', old('dai_offsets_per_channel'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dai_offsets_per_channel'))
                        <p class="help-block">
                            {{ $errors->first('dai_offsets_per_channel') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('dai_min_per_hour_per_channel', trans('global.aggregation-server.fields.dai-min-per-hour-per-channel').'', ['class' => 'control-label']) !!}
                    {!! Form::text('dai_min_per_hour_per_channel', old('dai_min_per_hour_per_channel'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dai_min_per_hour_per_channel'))
                        <p class="help-block">
                            {{ $errors->first('dai_min_per_hour_per_channel') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('dai_notify_gapper_channel', trans('global.aggregation-server.fields.dai-notify-gapper-channel').'', ['class' => 'control-label']) !!}
                    {!! Form::text('dai_notify_gapper_channel', old('dai_notify_gapper_channel'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dai_notify_gapper_channel'))
                        <p class="help-block">
                            {{ $errors->first('dai_notify_gapper_channel') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('dai_ad_spacings_per_channel', trans('global.aggregation-server.fields.dai-ad-spacings-per-channel').'', ['class' => 'control-label']) !!}
                    {!! Form::text('dai_ad_spacings_per_channel', old('dai_ad_spacings_per_channel'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dai_ad_spacings_per_channel'))
                        <p class="help-block">
                            {{ $errors->first('dai_ad_spacings_per_channel') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('dai_is_netlen_per_channel', trans('global.aggregation-server.fields.dai-is-netlen-per-channel').'', ['class' => 'control-label']) !!}
                    {!! Form::text('dai_is_netlen_per_channel', old('dai_is_netlen_per_channel'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dai_is_netlen_per_channel'))
                        <p class="help-block">
                            {{ $errors->first('dai_is_netlen_per_channel') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('host_id', trans('global.aggregation-server.fields.host').'', ['class' => 'control-label']) !!}
                    {!! Form::select('host_id', $hosts, old('host_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('host_id'))
                        <p class="help-block">
                            {{ $errors->first('host_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('imc', trans('global.aggregation-server.fields.imc').'', ['class' => 'control-label']) !!}
                    {!! Form::text('imc', old('imc'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('imc'))
                        <p class="help-block">
                            {{ $errors->first('imc') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ip', trans('global.aggregation-server.fields.ip').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ip', old('ip'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ip'))
                        <p class="help-block">
                            {{ $errors->first('ip') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('itcpport', trans('global.aggregation-server.fields.itcpport').'', ['class' => 'control-label']) !!}
                    {!! Form::text('itcpport', old('itcpport'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('itcpport'))
                        <p class="help-block">
                            {{ $errors->first('itcpport') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('mobile', trans('global.aggregation-server.fields.mobile').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('mobile', 0) !!}
                    {!! Form::checkbox('mobile', 1, old('mobile', old('mobile')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('mobile'))
                        <p class="help-block">
                            {{ $errors->first('mobile') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('clips', trans('global.aggregation-server.fields.clips').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('clips', 0) !!}
                    {!! Form::checkbox('clips', 1, old('clips', old('clips')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('clips'))
                        <p class="help-block">
                            {{ $errors->first('clips') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('rtclips', trans('global.aggregation-server.fields.rtclips').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('rtclips', 0) !!}
                    {!! Form::checkbox('rtclips', 1, old('rtclips', old('rtclips')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('rtclips'))
                        <p class="help-block">
                            {{ $errors->first('rtclips') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('p1_match', trans('global.aggregation-server.fields.p1-match').'', ['class' => 'control-label']) !!}
                    {!! Form::text('p1_match', old('p1_match'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('p1_match'))
                        <p class="help-block">
                            {{ $errors->first('p1_match') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('doublef0_match', trans('global.aggregation-server.fields.doublef0-match').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('doublef0_match', 0) !!}
                    {!! Form::checkbox('doublef0_match', 1, old('doublef0_match', old('doublef0_match')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('doublef0_match'))
                        <p class="help-block">
                            {{ $errors->first('doublef0_match') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('full_match', trans('global.aggregation-server.fields.full-match').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('full_match', 0) !!}
                    {!! Form::checkbox('full_match', 1, old('full_match', old('full_match')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('full_match'))
                        <p class="help-block">
                            {{ $errors->first('full_match') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('do_notify_url', trans('global.aggregation-server.fields.do-notify-url').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('do_notify_url', 0) !!}
                    {!! Form::checkbox('do_notify_url', 1, old('do_notify_url', old('do_notify_url')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('do_notify_url'))
                        <p class="help-block">
                            {{ $errors->first('do_notify_url') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('record', trans('global.aggregation-server.fields.record').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('record', 0) !!}
                    {!! Form::checkbox('record', 1, old('record', old('record')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('record'))
                        <p class="help-block">
                            {{ $errors->first('record') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('clip_refresh_secs', trans('global.aggregation-server.fields.clip-refresh-secs').'', ['class' => 'control-label']) !!}
                    {!! Form::text('clip_refresh_secs', old('clip_refresh_secs'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('clip_refresh_secs'))
                        <p class="help-block">
                            {{ $errors->first('clip_refresh_secs') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('threshold_nr_p1_matches_times_hundred', trans('global.aggregation-server.fields.threshold-nr-p1-matches-times-hundred').'', ['class' => 'control-label']) !!}
                    {!! Form::text('threshold_nr_p1_matches_times_hundred', old('threshold_nr_p1_matches_times_hundred'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('threshold_nr_p1_matches_times_hundred'))
                        <p class="help-block">
                            {{ $errors->first('threshold_nr_p1_matches_times_hundred') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('threshold_nr_doublef0_matches_times_hundred', trans('global.aggregation-server.fields.threshold-nr-doublef0-matches-times-hundred').'', ['class' => 'control-label']) !!}
                    {!! Form::text('threshold_nr_doublef0_matches_times_hundred', old('threshold_nr_doublef0_matches_times_hundred'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('threshold_nr_doublef0_matches_times_hundred'))
                        <p class="help-block">
                            {{ $errors->first('threshold_nr_doublef0_matches_times_hundred') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('threshold_nr_3smatches_times_hundred', trans('global.aggregation-server.fields.threshold-nr-3smatches-times-hundred').'', ['class' => 'control-label']) !!}
                    {!! Form::text('threshold_nr_3smatches_times_hundred', old('threshold_nr_3smatches_times_hundred'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('threshold_nr_3smatches_times_hundred'))
                        <p class="help-block">
                            {{ $errors->first('threshold_nr_3smatches_times_hundred') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('threshold_nr_matches_times_hundred', trans('global.aggregation-server.fields.threshold-nr-matches-times-hundred').'', ['class' => 'control-label']) !!}
                    {!! Form::text('threshold_nr_matches_times_hundred', old('threshold_nr_matches_times_hundred'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('threshold_nr_matches_times_hundred'))
                        <p class="help-block">
                            {{ $errors->first('threshold_nr_matches_times_hundred') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('clip_len_notify_secs', trans('global.aggregation-server.fields.clip-len-notify-secs').'', ['class' => 'control-label']) !!}
                    {!! Form::text('clip_len_notify_secs', old('clip_len_notify_secs'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('clip_len_notify_secs'))
                        <p class="help-block">
                            {{ $errors->first('clip_len_notify_secs') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('clip_notifyurl_script', trans('global.aggregation-server.fields.clip-notifyurl-script').'', ['class' => 'control-label']) !!}
                    {!! Form::text('clip_notifyurl_script', old('clip_notifyurl_script'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('clip_notifyurl_script'))
                        <p class="help-block">
                            {{ $errors->first('clip_notifyurl_script') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('clip_dir', trans('global.aggregation-server.fields.clip-dir').'', ['class' => 'control-label']) !!}
                    {!! Form::text('clip_dir', old('clip_dir'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('clip_dir'))
                        <p class="help-block">
                            {{ $errors->first('clip_dir') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('license', trans('global.aggregation-server.fields.license').'', ['class' => 'control-label']) !!}
                    {!! Form::text('license', old('license'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('license'))
                        <p class="help-block">
                            {{ $errors->first('license') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('cs_token', trans('global.aggregation-server.fields.cs-token').'', ['class' => 'control-label']) !!}
                    {!! Form::text('cs_token', old('cs_token'), ['class' => 'form-control', 'placeholder' => 'This needs to match the token from the channel server']) !!}
                    <p class="help-block">This needs to match the token from the channel server</p>
                    @if($errors->has('cs_token'))
                        <p class="help-block">
                            {{ $errors->first('cs_token') }}
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
            
            $('.timepicker').datetimepicker({
                format: "{{ config('app.time_format_moment') }}",
            });
            
        });
    </script>
            
@stop