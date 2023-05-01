@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.hosts.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.hosts.fields.name')</th>
                            <td field-key='name'>{{ $host->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.hosts.fields.host')</th>
                            <td field-key='host'>{{ $host->host }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.hosts.fields.server-exists')</th>
                            <td field-key='server_exists'>{{ Form::checkbox("server_exists", 1, $host->server_exists == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.hosts.fields.caipy-is-setup')</th>
                            <td field-key='caipy_is_setup'>{{ Form::checkbox("caipy_is_setup", 1, $host->caipy_is_setup == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.hosts.fields.ready-to-receive-conf')</th>
                            <td field-key='ready_to_receive_conf'>{{ Form::checkbox("ready_to_receive_conf", 1, $host->ready_to_receive_conf == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.hosts.fields.last-received-conf')</th>
                            <td field-key='last_received_conf'>{{ $host->last_received_conf }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.hosts.fields.configured')</th>
                            <td field-key='configured'>{{ Form::checkbox("configured", 1, $host->configured == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.hosts.fields.notes')</th>
                            <td field-key='notes'>{!! $host->notes !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.hosts.fields.cs-token')</th>
                            <td field-key='cs_token'>{{ $host->cs_token }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.hosts.fields.group')</th>
                            <td field-key='group'>{{ $host->group->group ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.hosts.fields.status')</th>
                            <td field-key='status'>{{ $host->status->status ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.hosts.fields.instance')</th>
                            <td field-key='instance'>{{ $host->instance->quantity_to_create ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.hosts.fields.rc')</th>
                            <td field-key='rc'>{{ $host->rc->role_convention ?? '' }}</td>
<td field-key='role_convention_value'>{{ isset($host->rc) ? $host->rc->role_convention_value : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.hosts.fields.ss-func')</th>
                            <td field-key='ss_func'>{{ $host->ss_func->type ?? '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#status" aria-controls="status" role="tab" data-toggle="tab">Status</a></li>
<li role="presentation" class=""><a href="#channel_server" aria-controls="channel_server" role="tab" data-toggle="tab">Channel server</a></li>
<li role="presentation" class=""><a href="#instance" aria-controls="instance" role="tab" data-toggle="tab">Instance</a></li>
<li role="presentation" class=""><a href="#aggregation_server" aria-controls="aggregation_server" role="tab" data-toggle="tab">Aggregation Servers</a></li>
<li role="presentation" class=""><a href="#syncservers" aria-controls="syncservers" role="tab" data-toggle="tab">Sync Servers</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="status">
<table class="table table-bordered table-striped {{ count($statuses) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.status.fields.status')</th>
                        <th>@lang('global.status.fields.host')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($statuses) > 0)
            @foreach ($statuses as $status)
                <tr data-entry-id="{{ $status->id }}">
                    <td field-key='status'>{{ $status->status }}</td>
                                <td field-key='host'>{{ $status->host->host ?? '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.statuses.restore', $status->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.statuses.perma_del', $status->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('status_view')
                                    <a href="{{ route('admin.statuses.show',[$status->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('status_edit')
                                    <a href="{{ route('admin.statuses.edit',[$status->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('status_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.statuses.destroy', $status->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="channel_server">
<table class="table table-bordered table-striped {{ count($channel_servers) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.channel-server.fields.group')</th>
                        <th>@lang('global.channel-server.fields.cs-host')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($channel_servers) > 0)
            @foreach ($channel_servers as $channel_server)
                <tr data-entry-id="{{ $channel_server->id }}">
                    <td field-key='group'>{{ $channel_server->group->group ?? '' }}</td>
                                <td field-key='cs_host'>{{ $channel_server->cs_host }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.channel_servers.restore', $channel_server->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.channel_servers.perma_del', $channel_server->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('channel_server_view')
                                    <a href="{{ route('admin.channel_servers.show',[$channel_server->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('channel_server_edit')
                                    <a href="{{ route('admin.channel_servers.edit',[$channel_server->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('channel_server_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.channel_servers.destroy', $channel_server->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="21">@lang('global.app_no_entries_in_table')</td>
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
<div role="tabpanel" class="tab-pane " id="aggregation_server">
<table class="table table-bordered table-striped {{ count($aggregation_servers) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.aggregation-server.fields.group')</th>
                        <th>@lang('global.aggregation-server.fields.channel-server')</th>
                        <th>@lang('global.aggregation-server.fields.as-host-url')</th>
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
                                <td field-key='as_host_url'>{{ $aggregation_server->as_host_url }}</td>
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
                <td colspan="70">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="syncservers">
<table class="table table-bordered table-striped {{ count($syncservers) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.syncservers.fields.ss-type')</th>
                        <th>@lang('global.syncservers.fields.ss-name')</th>
                        <th>@lang('global.syncservers.fields.ss-host-url')</th>
                        <th>@lang('global.syncservers.fields.ss-hostip')</th>
                        <th>@lang('global.syncservers.fields.group')</th>
                        <th>@lang('global.syncservers.fields.channel-server')</th>
                        <th>@lang('global.syncservers.fields.parent-as')</th>
                        <th>@lang('global.syncservers.fields.password')</th>
                        <th>@lang('global.syncservers.fields.advanced-password')</th>
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
                    <td field-key='ss_type'>{{ $syncserver->ss_type->type ?? '' }}</td>
                                <td field-key='ss_name'>{{ $syncserver->ss_name }}</td>
                                <td field-key='ss_host_url'>{{ $syncserver->ss_host_url }}</td>
                                <td field-key='ss_hostip'>{{ $syncserver->ss_hostip }}</td>
                                <td field-key='group'>{{ $syncserver->group->group ?? '' }}</td>
                                <td field-key='channel_server'>{{ $syncserver->channel_server->cs_host ?? '' }}</td>
                                <td field-key='parent_as'>{{ $syncserver->parent_as->as_host_url ?? '' }}</td>
                                <td field-key='password'>{{ $syncserver->password }}</td>
                                <td field-key='advanced_password'>{{ $syncserver->advanced_password }}</td>
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
                <td colspan="72">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.hosts.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
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
            
            $('.datetime').datetimepicker({
                format: "{{ config('app.datetime_format_moment') }}",
                locale: "{{ App::getLocale() }}",
                sideBySide: true,
            });
            
        });
    </script>
            
@stop
