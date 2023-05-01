            <div role="tabpanel" class="tab-pane " id="channel_server">
                <table class="table table-bordered table-striped {{ count($channel_servers) > 0 ? 'datatable' : '' }}">
                    <thead>
                        <tr>
                            <th>@lang('global.channel-server.fields.group')</th>
                            <th>@lang('global.channel-server.fields.cs-name')</th>
                            <th>@lang('global.channel-server.fields.cs-host')</th>
                            <th>@lang('global.channel-server.fields.cs-host-ip')</th>
                            <th>@lang('global.channel-server.fields.host')</th>
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
                            <td field-key='cs_name'>{{ $channel_server->cs_name }}</td>
                            <td field-key='cs_host'>{{ $channel_server->cs_host }}</td>
                            <td field-key='cs_host_ip'>{{ $channel_server->cs_host_ip }}</td>
                            <td field-key='host'>{{ $channel_server->host->name ?? '' }}</td>
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
                            <td colspan="14">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
