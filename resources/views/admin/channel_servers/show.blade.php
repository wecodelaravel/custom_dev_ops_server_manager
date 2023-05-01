@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.channel-server.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">

                <div class="col-md-6">
                    <table class="table table-bordered table-striped">


                        <tr>
                            <th>@lang('global.channel-server.fields.group')</th>
                            <td field-key='group'>{{ $channel_server->group->group ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.channel-server.fields.cs-name')</th>
                            <td field-key='cs_name'>{{ $channel_server->cs_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.channel-server.fields.cs-host')</th>
                            <td field-key='cs_host'>{{ $channel_server->cs_host }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.channel-server.fields.cs-host-ip')</th>
                            <td field-key='cs_host_ip'>{{ $channel_server->cs_host_ip }}</td>
                        </tr>
                        <tr>
                            <th>License</th>
                            <td field-key='cs_token'>{{ $channel_server->license }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.channel-server.fields.notes')</th>
                            <td field-key='notes'>{!! $channel_server->notes !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.channel-server.fields.username')</th>
                            <td field-key='username'>{{ $channel_server->username }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.channel-server.fields.host')</th>
                            {{-- <td field-key='host'>{{ $channel_server->host->host ?? '' }}</td> --}}
                            <td field-key='name'>{{ isset($channel_server->host) ? $channel_server->host->name : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.channel-server.fields.default-cloud-a-address')</th>
                            <td field-key='default_cloud_a_address'>{{ $channel_server->default_cloud_a_address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.channel-server.fields.default-cloud-a-port')</th>
                            <td field-key='default_cloud_a_port'>{{ $channel_server->default_cloud_a_port }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.channel-server.fields.default-cloud-b-address')</th>
                            <td field-key='default_cloud_b_address'>{{ $channel_server->default_cloud_b_address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.channel-server.fields.default-cloud-b-port')</th>
                            <td field-key='default_cloud_b_port'>{{ $channel_server->default_cloud_b_port }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.channel-server.fields.local-output')</th>
                            <td field-key='local_output'>{{ $channel_server->local_output }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.channel-server.fields.local-output-port')</th>
                            <td field-key='local_output_port'>{{ $channel_server->local_output_port }}</td>
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
@if(count($csis) > 0)
<button type="button" class="btn btn-default" data-id="{{ $channel_server->id }}" data-toggle="modal" data-target="#modal-channelids">
ChannelIDS ({{count($csis)}})
</button>
@endif

@if($channel_server->cs_token)
<button type="button" class="btn btn-default" data-id="{{ $channel_server->id }}" data-toggle="modal" data-target="#modal-cs">
ChannelServer
</button>
@endif

@if($channel_server->username)
<button type="button" class="btn btn-default" data-id="{{ $channel_server->id }}" data-toggle="modal" data-target="#modal-settings">
Settings
</button>
@endif

<button type="button" class="btn btn-danger" data-id="" data-toggle="modal" data-target="#modal-channelids" disabled="true">POST ALL CONFS</button>
                        </div>
                </div>


            </div>

            </div><!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#csi" aria-controls="csi" role="tab" data-toggle="tab">Channel Server Inputs</a></li>
                <li role="presentation" class=""><a href="#aggregation_server" aria-controls="aggregation_server" role="tab" data-toggle="tab">Aggregation Servers</a></li>
                <li role="presentation" class=""><a href="#cso" aria-controls="cso" role="tab" data-toggle="tab">Channel Server Outputs</a></li>
                <li role="presentation" class=""><a href="#instance" aria-controls="instance" role="tab" data-toggle="tab">Instance</a></li>
                <li role="presentation" class=""><a href="#syncservers" aria-controls="syncservers" role="tab" data-toggle="tab">Sync Servers</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

                <div role="tabpanel" class="tab-pane active" id="csi">
                    <table class="table table-bordered table-striped {{ count($csis) > 0 ? 'datatable' : '' }}">
                        <thead>
                            <tr>
                                <th>@lang('global.csi.fields.channel-server')</th>
                                            <th>@lang('global.csi.fields.channel')</th>
                                            <th>@lang('global.csi.fields.protocol')</th>
                                            <th>@lang('global.csi.fields.move-path')</th>
                                            @if( request('show_deleted') == 1 )
                                            <th>&nbsp;</th>
                                            @else
                                            <th>&nbsp;</th>
                                            @endif
                            </tr>
                        </thead>

                        <tbody>
                            @if (count($csis) > 0)
                                @foreach ($csis as $csi)
                                    <tr data-entry-id="{{ $csi->id }}">
                                        <td field-key='channel_server'>{{ $csi->channel_server->cs_host ?? '' }}</td>
                                                    <td field-key='channel'>{{ $csi->channel->source_name ?? '' }}</td>
                                                    <td field-key='protocol'>{{ $csi->protocol->protocol ?? '' }}</td>
                                                    <td field-key='move_path'>{{ $csi->move_path }}</td>
                                                    @if( request('show_deleted') == 1 )
                                                    <td>
                                                        {!! Form::open(array(
                                                            'style' => 'display: inline-block;',
                                                            'method' => 'POST',
                                                            'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                                            'route' => ['admin.csis.restore', $csi->id])) !!}
                                                        {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                                        {!! Form::close() !!}
                                                                                        {!! Form::open(array(
                                                            'style' => 'display: inline-block;',
                                                            'method' => 'DELETE',
                                                            'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                                            'route' => ['admin.csis.perma_del', $csi->id])) !!}
                                                        {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                                        {!! Form::close() !!}
                                                                                    </td>
                                                    @else
                                                    <td>

                                                        @can('csi_view')
                                                        <a href="{{ route('admin.csis.show',[$csi->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                                        @endcan
                                                        @can('csi_edit')
                                                        <a href="{{ route('admin.csis.edit',[$csi->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                                        @endcan
                                                        @can('csi_delete')
                                                        {!! Form::open(array(
                                                            'style' => 'display: inline-block;',
                                                            'method' => 'DELETE',
                                                            'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                                            'route' => ['admin.csis.destroy', $csi->id])) !!}
                                                        {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                                        {!! Form::close() !!}
                                                        @endcan
                                                    </td>
                                                    @endif
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="10">@lang('global.app_no_entries_in_table')</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div role="tabpanel" class="tab-pane " id="aggregation_server">
                    <table class="table table-bordered table-striped {{ count($aggregation_servers) > 0 ? 'datatable' : '' }}">
                        <thead>
                            <tr>
                                <th>@lang('global.aggregation-server.fields.group')</th>
                                            <th>@lang('global.aggregation-server.fields.channel-server')</th>
                                            <th>@lang('global.aggregation-server.fields.as-name')</th>
                                            <th>@lang('global.aggregation-server.fields.as-host-url')</th>
                                            <th>@lang('global.aggregation-server.fields.as-hostip')</th>
                                            @if( request('show_deleted') == 1 )
                                            <th>&nbsp;</th>
                                            @else
                                            <th>&nbsp;</th>
                                            @endif
                            </tr>
                        </thead>

                        <tbody>
                            @if (count($aggregation_servers) > 0)
                                @foreach ($aggregation_servers as $aggregation_server)
                                    <tr data-entry-id="{{ $aggregation_server->id }}">
                                        <td field-key='group'>{{ $aggregation_server->group->group ?? '' }}</td>
                                                    <td field-key='channel_server'>{{ $aggregation_server->channel_server->cs_host ?? '' }}</td>
                                                    <td field-key='as_name'>{{ $aggregation_server->as_name }}</td>
                                                    <td field-key='as_host_url'>{{ $aggregation_server->as_host_url }}</td>
                                                    <td field-key='as_hostip'>{{ $aggregation_server->as_hostip }}</td>
                                                    @if( request('show_deleted') == 1 )
                                                    <td>
                                                        {!! Form::open(array(
                                                            'style' => 'display: inline-block;',
                                                            'method' => 'POST',
                                                            'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                                            'route' => ['admin.aggregation_servers.restore', $aggregation_server->id])) !!}
                                                        {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                                        {!! Form::close() !!}
                                                                                        {!! Form::open(array(
                                                            'style' => 'display: inline-block;',
                                                            'method' => 'DELETE',
                                                            'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                                            'route' => ['admin.aggregation_servers.perma_del', $aggregation_server->id])) !!}
                                                        {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                                        {!! Form::close() !!}
                                                                                    </td>
                                                    @else
                                                    <td>
                                                        @can('aggregation_server_view')
                                                        <a href="{{ route('admin.aggregation_servers.show',[$aggregation_server->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                                        @endcan
                                                        @can('aggregation_server_edit')
                                                        <a href="{{ route('admin.aggregation_servers.edit',[$aggregation_server->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                                        @endcan
                                                        @can('aggregation_server_delete')
                                                        {!! Form::open(array(
                                                            'style' => 'display: inline-block;',
                                                            'method' => 'DELETE',
                                                            'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                                            'route' => ['admin.aggregation_servers.destroy', $aggregation_server->id])) !!}
                                                        {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                                        {!! Form::close() !!}
                                                        @endcan
                                                    </td>
                                                    @endif
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="40">@lang('global.app_no_entries_in_table')</td>
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
                                    <td colspan="14">@lang('global.app_no_entries_in_table')</td>
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
                                    <td colspan="41">@lang('global.app_no_entries_in_table')</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.channel_servers.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>


@include('preview.cs.modal-channelids')
@include('preview.cs.modal-cs')
@include('preview.cs.modal-settings')

{{-- @include('admin.channel_servers.partials.modal-success') --}}



@stop


@section('page-style')
<style>
#conf-preview {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
        "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji",
        "Segoe UI Emoji", "Segoe UI Symbol";
  }
</style>
@endsection
