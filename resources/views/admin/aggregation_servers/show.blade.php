@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.aggregation-server.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.aggregation-server.fields.group')</th>
                            <td field-key='group'>{{ $aggregation_server->group->group ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.channel-server')</th>
                            <td field-key='channel_server'>{{ $aggregation_server->channel_server->cs_host ?? '' }}</td>
                            <td field-key='cs_host_ip'>{{ isset($aggregation_server->channel_server) ? $aggregation_server->channel_server->cs_host_ip : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.as-name')</th>
                            <td field-key='as_name'>{{ $aggregation_server->as_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.as-host-url')</th>
                            <td field-key='as_host_url'>{{ $aggregation_server->as_host_url }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.as-hostip')</th>
                            <td field-key='as_hostip'>{{ $aggregation_server->as_hostip }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.grab-time')</th>
                            <td field-key='grab_time'>{{ $aggregation_server->grab_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.transcoding-server')</th>
                            <td field-key='transcoding_server'>{{ $aggregation_server->transcoding_server }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.max-upload-filesize')</th>
                            <td field-key='max_upload_filesize'>{{ $aggregation_server->max_upload_filesize }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.report-time')</th>
                            <td field-key='report_time'>{{ $aggregation_server->report_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.report-email')</th>
                            <td field-key='report_email'>{{ $aggregation_server->report_email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.max-days-channel-history')</th>
                            <td field-key='max_days_channel_history'>{{ $aggregation_server->max_days_channel_history }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.notification-server-type')</th>
                            <td field-key='notification_server_type'>{{ $aggregation_server->notification_server_type->notification_server_type ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.real-time-notification-url')</th>
                            <td field-key='real_time_notification_url'>{{ $aggregation_server->real_time_notification_url }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.basic-discovery-enabled')</th>
                            <td field-key='basic_discovery_enabled'>{{ Form::checkbox("basic_discovery_enabled", 1, $aggregation_server->basic_discovery_enabled == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.continuous-discovery-enabled')</th>
                            <td field-key='continuous_discovery_enabled'>{{ Form::checkbox("continuous_discovery_enabled", 1, $aggregation_server->continuous_discovery_enabled == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.username')</th>
                            <td field-key='username'>{{ $aggregation_server->username }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.password')</th>
                            <td field-key='password'>{{ $aggregation_server->password }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.advanced-username')</th>
                            <td field-key='advanced_username'>{{ $aggregation_server->advanced_username }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.advanced-password')</th>
                            <td field-key='advanced_password'>{{ $aggregation_server->advanced_password }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.millisecond-precision')</th>
                            <td field-key='millisecond_precision'>{{ Form::checkbox("millisecond_precision", 1, $aggregation_server->millisecond_precision == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.show-channel-button')</th>
                            <td field-key='show_channel_button'>{{ Form::checkbox("show_channel_button", 1, $aggregation_server->show_channel_button == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.show-clip-button')</th>
                            <td field-key='show_clip_button'>{{ Form::checkbox("show_clip_button", 1, $aggregation_server->show_clip_button == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.show-group-button')</th>
                            <td field-key='show_group_button'>{{ Form::checkbox("show_group_button", 1, $aggregation_server->show_group_button == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.show-live-button')</th>
                            <td field-key='show_live_button'>{{ Form::checkbox("show_live_button", 1, $aggregation_server->show_live_button == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.enable-evt')</th>
                            <td field-key='enable_evt'>{{ Form::checkbox("enable_evt", 1, $aggregation_server->enable_evt == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.enable-excel')</th>
                            <td field-key='enable_excel'>{{ Form::checkbox("enable_excel", 1, $aggregation_server->enable_excel == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.enable-evt-timing')</th>
                            <td field-key='enable_evt_timing'>{{ $aggregation_server->enable_evt_timing }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.timezone')</th>
                            <td field-key='timezone'>{{ $aggregation_server->timezone->timezone ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.filter-preset-for-ui')</th>
                            <td field-key='filter_preset_for_ui'>{{ $aggregation_server->filter_preset_for_ui->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.country')</th>
                            <td field-key='country'>{{ $aggregation_server->country->title ?? '' }}</td>
                                <td field-key='shortcode'>{{ isset($aggregation_server->country) ? $aggregation_server->country->shortcode : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.video-server-type')</th>
                            <td field-key='video_server_type'>{{ $aggregation_server->video_server_type->video_server_type ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.video-server-url')</th>
                            <td field-key='video_server_url'>{{ $aggregation_server->video_server_url }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.video-server-redirect')</th>
                            <td field-key='video_server_redirect'>{{ $aggregation_server->video_server_redirect }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.video-hls-shift')</th>
                            <td field-key='video_hls_shift'>{{ $aggregation_server->video_hls_shift }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.dai-ads-length')</th>
                            <td field-key='dai_ads_length'>{{ $aggregation_server->dai_ads_length }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.dai-notifications')</th>
                            <td field-key='dai_notifications'>{{ $aggregation_server->dai_notifications }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.hls-shift-per-channel')</th>
                            <td field-key='hls_shift_per_channel'>{{ $aggregation_server->hls_shift_per_channel }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.dai-ad-lengths-per-channel')</th>
                            <td field-key='dai_ad_lengths_per_channel'>{{ $aggregation_server->dai_ad_lengths_per_channel }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.dai-offsets-per-channel')</th>
                            <td field-key='dai_offsets_per_channel'>{{ $aggregation_server->dai_offsets_per_channel }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.dai-min-per-hour-per-channel')</th>
                            <td field-key='dai_min_per_hour_per_channel'>{{ $aggregation_server->dai_min_per_hour_per_channel }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.dai-notify-gapper-channel')</th>
                            <td field-key='dai_notify_gapper_channel'>{{ $aggregation_server->dai_notify_gapper_channel }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.dai-ad-spacings-per-channel')</th>
                            <td field-key='dai_ad_spacings_per_channel'>{{ $aggregation_server->dai_ad_spacings_per_channel }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.dai-is-netlen-per-channel')</th>
                            <td field-key='dai_is_netlen_per_channel'>{{ $aggregation_server->dai_is_netlen_per_channel }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.host')</th>
                            <td field-key='host'>{{ $aggregation_server->host->host ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.imc')</th>
                            <td field-key='imc'>{{ $aggregation_server->imc }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.ip')</th>
                            <td field-key='ip'>{{ $aggregation_server->ip }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.itcpport')</th>
                            <td field-key='itcpport'>{{ $aggregation_server->itcpport }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.mobile')</th>
                            <td field-key='mobile'>{{ Form::checkbox("mobile", 1, $aggregation_server->mobile == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.clips')</th>
                            <td field-key='clips'>{{ Form::checkbox("clips", 1, $aggregation_server->clips == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.rtclips')</th>
                            <td field-key='rtclips'>{{ Form::checkbox("rtclips", 1, $aggregation_server->rtclips == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.p1-match')</th>
                            <td field-key='p1_match'>{{ $aggregation_server->p1_match }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.doublef0-match')</th>
                            <td field-key='doublef0_match'>{{ Form::checkbox("doublef0_match", 1, $aggregation_server->doublef0_match == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.full-match')</th>
                            <td field-key='full_match'>{{ Form::checkbox("full_match", 1, $aggregation_server->full_match == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.do-notify-url')</th>
                            <td field-key='do_notify_url'>{{ Form::checkbox("do_notify_url", 1, $aggregation_server->do_notify_url == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.record')</th>
                            <td field-key='record'>{{ Form::checkbox("record", 1, $aggregation_server->record == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.clip-refresh-secs')</th>
                            <td field-key='clip_refresh_secs'>{{ $aggregation_server->clip_refresh_secs }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.threshold-nr-p1-matches-times-hundred')</th>
                            <td field-key='threshold_nr_p1_matches_times_hundred'>{{ $aggregation_server->threshold_nr_p1_matches_times_hundred }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.threshold-nr-doublef0-matches-times-hundred')</th>
                            <td field-key='threshold_nr_doublef0_matches_times_hundred'>{{ $aggregation_server->threshold_nr_doublef0_matches_times_hundred }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.threshold-nr-3smatches-times-hundred')</th>
                            <td field-key='threshold_nr_3smatches_times_hundred'>{{ $aggregation_server->threshold_nr_3smatches_times_hundred }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.threshold-nr-matches-times-hundred')</th>
                            <td field-key='threshold_nr_matches_times_hundred'>{{ $aggregation_server->threshold_nr_matches_times_hundred }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.clip-len-notify-secs')</th>
                            <td field-key='clip_len_notify_secs'>{{ $aggregation_server->clip_len_notify_secs }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.clip-notifyurl-script')</th>
                            <td field-key='clip_notifyurl_script'>{{ $aggregation_server->clip_notifyurl_script }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.clip-dir')</th>
                            <td field-key='clip_dir'>{{ $aggregation_server->clip_dir }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.license')</th>
                            <td field-key='license'>{{ $aggregation_server->license }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.cs-token')</th>
                            <td field-key='cs_token'>{{ $aggregation_server->cs_token }}</td>
                        </tr>
                    </table>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Channel Server CONF Previews</h3>
                        </div>
                        <div class="panel-body">
                        {{-- <a target="_blank" href="{{ route('preview.cs.channel_server',[$channel_server->id]) }}" class="btn  btn-primary">ChannelServer </a>
                        <a target="_blank" href="{{ route('preview.cs.channelids',[$channel_server->id]) }}" class="btn  btn-primary">ChannelIDS </a>
                        <a target="_blank" href="{{ route('preview.cs.settings',[$channel_server->id]) }}" class="btn  btn-primary">Settings </a> --}}
                        {{-- @if(count($csis) > 0) --}}
                            <button type="button" class="btn {{ (count($csis) < 20 ) ? 'btn-danger' : 'btn-success' }}" data-id=" " data-toggle="modal" data-target="#modal-channelids">
                            ({{count($csis)}}) ChannelIDS.conf
                            </button>

                        {{-- @endif --}}

                        @if($syncserver->cs_token)
                            <button type="button" class="btn btn-default" data-id=" " data-toggle="modal" data-target="#modal-ss">
                            SyncServer.conf
                            </button>
                        @endif

                        {{-- @if($syncserver->username) --}}
                            <button type="button" class="btn btn-default" data-id=" " data-toggle="modal" data-target="#modal-settings">
                            Settings.conf
                            </button>
                        {{-- @endif --}}

                            <button type="button" class="btn btn-danger" data-id="" data-toggle="modal" data-target="#modal-channelids" disabled="true">POST ALL CONFS</button>
                        </div>
                    </div>


                </div>

            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">

<li role="presentation" class="active"><a href="#cso" aria-controls="cso" role="tab" data-toggle="tab">Channel Server Outputs</a></li>
<li role="presentation" class=""><a href="#instance" aria-controls="instance" role="tab" data-toggle="tab">Instance</a></li>
<li role="presentation" class=""><a href="#syncservers" aria-controls="syncservers" role="tab" data-toggle="tab">Sync Servers</a></li>
<li role="presentation" class=""><a href="#cso" aria-controls="cso" role="tab" data-toggle="tab">Channel Server Outputs</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">

<div role="tabpanel" class="tab-pane active" id="cso">
<table class="table table-bordered table-striped {{ count($csos) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.cso.fields.channel-server')</th>
                        <th>@lang('global.cso.fields.channel')</th>
                        <th>@lang('global.cso.fields.select-aggregation-server-for-a')</th>
                        <th>@lang('global.cso.fields.select-sync-server-for-a')</th>
                        <th>@lang('global.cso.fields.select-aggregation-server-for-b')</th>
                        <th>@lang('global.cso.fields.select-sync-server-for-b')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($csos) > 0)
            @foreach ($csos as $cso)
                <tr data-entry-id="{{ $cso->id }}">
                    <td field-key='channel_server'>{{ $cso->channel_server->cs_host ?? '' }}</td>
                                <td field-key='channel'>{{ $cso->channel->channelid ?? '' }}</td>
                                <td field-key='select_aggregation_server_for_a'>{{ $cso->select_aggregation_server_for_a->as_host_url ?? '' }}</td>
                                <td field-key='select_sync_server_for_a'>{{ $cso->select_sync_server_for_a->ss_host_url ?? '' }}</td>
                                <td field-key='select_aggregation_server_for_b'>{{ $cso->select_aggregation_server_for_b->as_host_url ?? '' }}</td>
                                <td field-key='select_sync_server_for_b'>{{ $cso->select_sync_server_for_b->ss_host_url ?? '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.csos.restore', $cso->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.csos.perma_del', $cso->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('cso_view')
                                    <a href="{{ route('admin.csos.show',[$cso->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('cso_edit')
                                    <a href="{{ route('admin.csos.edit',[$cso->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('cso_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.csos.destroy', $cso->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="22">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="instance">
<table class="table table-bordered table-striped {{ count($instances) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.instance.fields.group')</th>
                        <th>@lang('global.instance.fields.quantity-to-create')</th>
                        <th>@lang('global.instance.fields.role-convention')</th>
                        <th>@lang('global.instance.fields.channel-server')</th>
                        <th>@lang('global.instance.fields.aggregation-server')</th>
                        <th>@lang('global.instance.fields.env')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($instances) > 0)
            @foreach ($instances as $instance)
                <tr data-entry-id="{{ $instance->id }}">
                    <td field-key='group'>{{ $instance->group->group ?? '' }}</td>
                                <td field-key='quantity_to_create'>{{ $instance->quantity_to_create }}</td>
                                <td field-key='role_convention'>{{ $instance->role_convention->role_convention ?? '' }}</td>
                                <td field-key='channel_server'>{{ $instance->channel_server->cs_host ?? '' }}</td>
                                <td field-key='aggregation_server'>{{ $instance->aggregation_server->as_host_url ?? '' }}</td>
                                <td field-key='env'>{{ $instance->env->environment ?? '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.instances.restore', $instance->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.instances.perma_del', $instance->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('instance_view')
                                    <a href="{{ route('admin.instances.show',[$instance->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('instance_edit')
                                    <a href="{{ route('admin.instances.edit',[$instance->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('instance_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.instances.destroy', $instance->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="15">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="syncservers">
<table class="table table-bordered table-striped {{ count($syncservers) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.syncservers.fields.ss-name')</th>
                        <th>@lang('global.syncservers.fields.ss-host-url')</th>
                        <th>@lang('global.syncservers.fields.ss-hostip')</th>
                        <th>@lang('global.syncservers.fields.group')</th>
                        <th>@lang('global.syncservers.fields.channel-server')</th>
                        <th>@lang('global.syncservers.fields.parent-as')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($syncservers) > 0)
            @foreach ($syncservers as $syncserver)
                <tr data-entry-id="{{ $syncserver->id }}">
                    <td field-key='ss_name'>{{ $syncserver->ss_name }}</td>
                                <td field-key='ss_host_url'>{{ $syncserver->ss_host_url }}</td>
                                <td field-key='ss_hostip'>{{ $syncserver->ss_hostip }}</td>
                                <td field-key='group'>{{ $syncserver->group->group ?? '' }}</td>
                                <td field-key='channel_server'>{{ $syncserver->channel_server->cs_host ?? '' }}</td>
                                <td field-key='parent_as'>{{ $syncserver->parent_as->as_host_url ?? '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.syncservers.restore', $syncserver->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.syncservers.perma_del', $syncserver->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('syncserver_view')
                                    <a href="{{ route('admin.syncservers.show',[$syncserver->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('syncserver_edit')
                                    <a href="{{ route('admin.syncservers.edit',[$syncserver->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('syncserver_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.syncservers.destroy', $syncserver->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="71">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="cso">
<table class="table table-bordered table-striped {{ count($csos) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.cso.fields.channel-server')</th>
                        <th>@lang('global.cso.fields.channel')</th>
                        <th>@lang('global.cso.fields.select-aggregation-server-for-a')</th>
                        <th>@lang('global.cso.fields.select-sync-server-for-a')</th>
                        <th>@lang('global.cso.fields.select-aggregation-server-for-b')</th>
                        <th>@lang('global.cso.fields.select-sync-server-for-b')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($csos) > 0)
            @foreach ($csos as $cso)
                <tr data-entry-id="{{ $cso->id }}">
                    <td field-key='channel_server'>{{ $cso->channel_server->cs_host ?? '' }}</td>
                                <td field-key='channel'>{{ $cso->channel->channelid ?? '' }}</td>
                                <td field-key='select_aggregation_server_for_a'>{{ $cso->select_aggregation_server_for_a->as_host_url ?? '' }}</td>
                                <td field-key='select_sync_server_for_a'>{{ $cso->select_sync_server_for_a->ss_host_url ?? '' }}</td>
                                <td field-key='select_aggregation_server_for_b'>{{ $cso->select_aggregation_server_for_b->as_host_url ?? '' }}</td>
                                <td field-key='select_sync_server_for_b'>{{ $cso->select_sync_server_for_b->ss_host_url ?? '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.csos.restore', $cso->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.csos.perma_del', $cso->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('cso_view')
                                    <a href="{{ route('admin.csos.show',[$cso->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('cso_edit')
                                    <a href="{{ route('admin.csos.edit',[$cso->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('cso_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.csos.destroy', $cso->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="22">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.aggregation_servers.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
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
