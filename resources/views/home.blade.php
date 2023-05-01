@extends('layouts.app')

@section('content')

{{--     <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Where To Start</div>
                <div class="panel-body table-responsive">
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body table-responsive">
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Where To Start</div>
                <div class="panel-body table-responsive">
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row">
         <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Recently added channelservers</div>

                <div class="panel-body table-responsive">
                    <table class="table table-bordered table-striped ajaxTable">
                        <thead>
                        <tr>

                            <th> @lang('global.channel-server.fields.cs-name')</th>
                            <th> @lang('global.channel-server.fields.cs-host')</th>
                            <th> @lang('global.channel-server.fields.cs-host-ip')</th>
                            {{-- <th> @lang('global.channel-server.fields.cs-token')</th> --}}
                            {{-- <th> @lang('global.channel-server.fields.notes')</th> --}}
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        @foreach($channelservers as $channelserver)
                            <tr>

                                <td>{{ $channelserver->cs_name }} </td>
                                <td>{{ $channelserver->cs_host }} </td>
                                <td>{{ $channelserver->cs_host_ip }} </td>
                                {{-- <td>{{ $channelserver->cs_token }} </td> --}}
                                {{-- <td>{{ $channelserver->notes }} </td> --}}
                                <td>

                                    @can('channel_server_view')
                                    <a target="_blank" href="{{ route('admin.channel_servers.show',[$channelserver->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan

                                    @can('channel_server_edit')
                                    <a target="_blank" href="{{ route('admin.channel_servers.edit',[$channelserver->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan

                                    @can('channel_server_delete')
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                            'route' => ['admin.channel_servers.destroy', $channelserver->id])) !!}
                                        {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                    @endcan

                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
 </div>

 <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Recently added channels</div>

                <div class="panel-body table-responsive">
                    <table class="table table-bordered table-striped ajaxTable">
                        <thead>
                        <tr>

                            <th> @lang('global.channels.fields.source-name')</th>
                            <th> @lang('global.channels.fields.channelid')</th>
                            <th> @lang('global.channels.fields.env')</th>
                            {{--<th> @lang('global.channels.fields.ffmpegsource')</th> --}}
                            <th> @lang('global.channels.fields.ssm')</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        @foreach($channels as $channel)
                            <tr>

                                <td>{{ $channel->source_name }} </td>
                                <td>{{ $channel->channelid }} </td>
                                <td>{{ $channel->env }} </td>
                                {{--<td>{{ $channel->ffmpegsource }} </td> --}}
                                <td>{{ $channel->ssm }} </td>
                                <td>

                                    @can('channel_view')
                                    <a target="_blank" href="{{ route('admin.channels.show',[$channel->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan

                                    @can('channel_edit')
                                    <a target="_blank" href="{{ route('admin.channels.edit',[$channel->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan

                                    @can('channel_delete')
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                            'route' => ['admin.channels.destroy', $channel->id])) !!}
                                        {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                    @endcan

                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
 </div>

 <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Recently added csis</div>

                <div class="panel-body table-responsive">
                    <table class="table table-bordered table-striped ajaxTable">
                        <thead>
                        <tr>
                            <th>Channel Name</th>
                            <th> @lang('global.csi.fields.move-path')</th>
                            {{-- <th> @lang('global.csi.fields.cs-token')</th> --}}
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        @foreach($csis as $csi)
                            <tr>
                                <td>{{ @$csi->channel->source_name }}</td>
                                <td>{{ $csi->move_path }} </td>
                                {{-- <td>{{ $csi->cs_token }} </td> --}}
                                <td>

                                    @can('csi_view')
                                    <a target="_blank" href="{{ route('admin.csis.show',[$csi->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan

                                    @can('csi_edit')
                                    <a target="_blank" href="{{ route('admin.csis.edit',[$csi->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
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
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
 </div>


    </div>
@endsection

