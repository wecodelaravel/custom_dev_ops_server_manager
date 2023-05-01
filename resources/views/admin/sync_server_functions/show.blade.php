@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.sync-server-function.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.sync-server-function.fields.type')</th>
                            <td field-key='type'>{{ $sync_server_function->type }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.sync-server-function.fields.description')</th>
                            <td field-key='description'>{{ $sync_server_function->description }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#syncservers" aria-controls="syncservers" role="tab" data-toggle="tab">Sync Servers</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="syncservers">
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

            <a href="{{ route('admin.sync_server_functions.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


