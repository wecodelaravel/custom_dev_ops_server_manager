@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.cso.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.cso.fields.use-channel-server-localhost')</th>
                            <td field-key='use_channel_server_localhost'>{{ Form::checkbox("use_channel_server_localhost", 1, $cso->use_channel_server_localhost == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.cso.fields.channel-server')</th>
                            <td field-key='channel_server'>{{ $cso->channel_server->cs_host ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.cso.fields.channel')</th>
                            <td field-key='channel'>{{ $cso->channel->channelid ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.cso.fields.use-as-for-a')</th>
                            <td field-key='use_as_for_a'>{{ Form::checkbox("use_as_for_a", 1, $cso->use_as_for_a == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.cso.fields.select-aggregation-server-for-a')</th>
                            <td field-key='select_aggregation_server_for_a'>{{ $cso->select_aggregation_server_for_a->as_host_url ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.cso.fields.use-sync-server-for-a')</th>
                            <td field-key='use_sync_server_for_a'>{{ Form::checkbox("use_sync_server_for_a", 1, $cso->use_sync_server_for_a == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.cso.fields.select-sync-server-for-a')</th>
                            <td field-key='select_sync_server_for_a'>{{ $cso->select_sync_server_for_a->ss_host_url ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.cso.fields.use-custom-a')</th>
                            <td field-key='use_custom_a'>{{ Form::checkbox("use_custom_a", 1, $cso->use_custom_a == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.cso.fields.ocloud-a')</th>
                            <td field-key='ocloud_a'>{{ $cso->ocloud_a }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.cso.fields.ocp-a')</th>
                            <td field-key='ocp_a'>{{ $cso->ocp_a }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.cso.fields.use-as-for-b')</th>
                            <td field-key='use_as_for_b'>{{ Form::checkbox("use_as_for_b", 1, $cso->use_as_for_b == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.cso.fields.select-aggregation-server-for-b')</th>
                            <td field-key='select_aggregation_server_for_b'>{{ $cso->select_aggregation_server_for_b->as_host_url ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.cso.fields.use-sync-server-for-b')</th>
                            <td field-key='use_sync_server_for_b'>{{ Form::checkbox("use_sync_server_for_b", 1, $cso->use_sync_server_for_b == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.cso.fields.select-sync-server-for-b')</th>
                            <td field-key='select_sync_server_for_b'>{{ $cso->select_sync_server_for_b->ss_host_url ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.cso.fields.use-custom-for-b')</th>
                            <td field-key='use_custom_for_b'>{{ Form::checkbox("use_custom_for_b", 1, $cso->use_custom_for_b == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.cso.fields.ocloud-b')</th>
                            <td field-key='ocloud_b'>{{ $cso->ocloud_b }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.cso.fields.ocp-b')</th>
                            <td field-key='ocp_b'>{{ $cso->ocp_b }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.csos.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


