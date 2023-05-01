@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.syncservers.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.syncservers.fields.ss-type')</th>
                            <td field-key='ss_type'>{{ $syncserver->ss_type->type ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.ss-name')</th>
                            <td field-key='ss_name'>{{ $syncserver->ss_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.ss-host-url')</th>
                            <td field-key='ss_host_url'>{{ $syncserver->ss_host_url }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.ss-hostip')</th>
                            <td field-key='ss_hostip'>{{ $syncserver->ss_hostip }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.group')</th>
                            <td field-key='group'>{{ $syncserver->group->group ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.channel-server')</th>
                            <td field-key='channel_server'>{{ $syncserver->channel_server->cs_host ?? '' }}</td>
                                {{--           <td field-key='cs_host_ip'>{{ isset($syncserver->channel_server) ? $syncserver->channel_server->cs_host_ip : '' }}</td> --}}
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.parent-as')</th>
                            <td field-key='parent_as'>{{ $syncserver->parent_as->as_host_url ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.transcoding-server')</th>
                            <td field-key='transcoding_server'>{{ $syncserver->transcoding_server }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.max-upload-filesize')</th>
                            <td field-key='max_upload_filesize'>{{ $syncserver->max_upload_filesize }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.report-time')</th>
                            <td field-key='report_time'>{{ $syncserver->report_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.report-email')</th>
                            <td field-key='report_email'>{{ $syncserver->report_email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.max-days-channel-history')</th>
                            <td field-key='max_days_channel_history'>{{ $syncserver->max_days_channel_history }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.notification-server-type')</th>
                            <td field-key='notification_server_type'>{{ $syncserver->notification_server_type->notification_server_type ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.real-time-notification-url')</th>
                            <td field-key='real_time_notification_url'>{{ $syncserver->real_time_notification_url }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.basic-discovery-enabled')</th>
                            <td field-key='basic_discovery_enabled'>{{ Form::checkbox("basic_discovery_enabled", 1, $syncserver->basic_discovery_enabled == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.continuous-discovery-enabled')</th>
                            <td field-key='continuous_discovery_enabled'>{{ Form::checkbox("continuous_discovery_enabled", 1, $syncserver->continuous_discovery_enabled == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.millisecond-precision')</th>
                            <td field-key='millisecond_precision'>{{ Form::checkbox("millisecond_precision", 1, $syncserver->millisecond_precision == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.show-channel-button')</th>
                            <td field-key='show_channel_button'>{{ Form::checkbox("show_channel_button", 1, $syncserver->show_channel_button == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.show-clip-button')</th>
                            <td field-key='show_clip_button'>{{ Form::checkbox("show_clip_button", 1, $syncserver->show_clip_button == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.show-group-button')</th>
                            <td field-key='show_group_button'>{{ Form::checkbox("show_group_button", 1, $syncserver->show_group_button == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.show-live-button')</th>
                            <td field-key='show_live_button'>{{ Form::checkbox("show_live_button", 1, $syncserver->show_live_button == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.enable-evt')</th>
                            <td field-key='enable_evt'>{{ Form::checkbox("enable_evt", 1, $syncserver->enable_evt == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.enable-excel')</th>
                            <td field-key='enable_excel'>{{ Form::checkbox("enable_excel", 1, $syncserver->enable_excel == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.enable-evt-timing')</th>
                            <td field-key='enable_evt_timing'>{{ $syncserver->enable_evt_timing }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.timezone')</th>
                            <td field-key='timezone'>{{ $syncserver->timezone->timezone ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.filter-preset-for-ui')</th>
                            <td field-key='filter_preset_for_ui'>{{ $syncserver->filter_preset_for_ui->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.country')</th>
                            <td field-key='country'>{{ $syncserver->country->title ?? '' }}</td>
                            {{-- <td field-key='shortcode'>{{ isset($syncserver->country) ? $syncserver->country->shortcode : '' }}</td> --}}
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.video-server-type')</th>
                            <td field-key='video_server_type'>{{ $syncserver->video_server_type->video_server_type ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.video-server-url')</th>
                            <td field-key='video_server_url'>{{ $syncserver->video_server_url }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.video-server-redirect')</th>
                            <td field-key='video_server_redirect'>{{ $syncserver->video_server_redirect }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.video-hls-shift')</th>
                            <td field-key='video_hls_shift'>{{ $syncserver->video_hls_shift }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.cs-token')</th>
                            <td field-key='cs_token'>{{ $syncserver->cs_token }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.license')</th>
                            <td field-key='license'>{{ $syncserver->license }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.syncservers.fields.host')</th>
                            <td field-key='host'>{{ $syncserver->host->host ?? '' }}</td>
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
                            <button type="button" class="btn {{ (count($csis) < 20 ) ? 'btn-danger' : 'btn-success' }}" data-id="{{ $syncserver->id }}" data-toggle="modal" data-target="#modal-sschannelids">
                            ({{count($csis)}}) ChannelIDS.conf
                            </button>

                        {{-- @endif --}}

                        @if($syncserver->cs_token)
                            <button type="button" class="btn btn-default" data-id="{{ $syncserver->id }}" data-toggle="modal" data-target="#modal-ss">
                            SyncServer.conf
                            </button>
                        @endif

                        {{-- @if($syncserver->username) --}}
                            <button type="button" class="btn btn-default" data-id="{{ $syncserver->id }}" data-toggle="modal" data-target="#ss-modal-settings">
                            Settings.conf
                            </button>
                        {{-- @endif --}}

                            <button type="button" class="btn btn-danger" data-id="" data-toggle="modal" data-target="#modal-channelids" disabled="true">POST TO HOST</button>
                        </div>
                    </div>


                </div>







            </div><!-- Nav tabs -->

            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#cso" aria-controls="cso" role="tab" data-toggle="tab">Channel Server Outputs</a></li>
                <li role="presentation" class=""><a href="#hosts" aria-controls="hosts" role="tab" data-toggle="tab">Hosts</a></li>
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

                <div role="tabpanel" class="tab-pane " id="hosts">
                    <table class="table table-bordered table-striped {{ count($hosts) > 0 ? 'datatable' : '' }}">
                        <thead>
                            <tr>
                                <th>@lang('global.hosts.fields.host')</th>
                                            @if( request('show_deleted') == 1 )
                                            <th>&nbsp;</th>
                                            @else
                                            <th>&nbsp;</th>
                                            @endif
                            </tr>
                        </thead>

                        <tbody>
                            @if (count($hosts) > 0)
                                @foreach ($hosts as $host)
                                    <tr data-entry-id="{{ $host->id }}">
                                        <td field-key='host'>{{ $host->host }}</td>
                                                    @if( request('show_deleted') == 1 )
                                                    <td>
                                                        {!! Form::open(array(
                                                            'style' => 'display: inline-block;',
                                                            'method' => 'POST',
                                                            'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                                            'route' => ['admin.hosts.restore', $host->id])) !!}
                                                        {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                                        {!! Form::close() !!}
                                                                                        {!! Form::open(array(
                                                            'style' => 'display: inline-block;',
                                                            'method' => 'DELETE',
                                                            'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                                            'route' => ['admin.hosts.perma_del', $host->id])) !!}
                                                        {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                                        {!! Form::close() !!}
                                                                                    </td>
                                                    @else
                                                    <td>
                                                        @can('host_view')
                                                        <a href="{{ route('admin.hosts.show',[$host->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                                        @endcan
                                                        @can('host_edit')
                                                        <a href="{{ route('admin.hosts.edit',[$host->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                                        @endcan
                                                        @can('host_delete')
                                                        {!! Form::open(array(
                                                            'style' => 'display: inline-block;',
                                                            'method' => 'DELETE',
                                                            'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                                            'route' => ['admin.hosts.destroy', $host->id])) !!}
                                                        {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                                        {!! Form::close() !!}
                                                        @endcan
                                                    </td>
                                                    @endif
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="19">@lang('global.app_no_entries_in_table')</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.syncservers.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>

@include('preview.ss.modal-channelids')
@include('preview.ss.modal-ss')
@include('preview.ss.modal-settings')

@stop

@section('page-style')
    <style>
        .modal-dialog {
            width: 800px;
            margin: 30px auto;
        }
    </style>
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
