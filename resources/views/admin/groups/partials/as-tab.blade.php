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
