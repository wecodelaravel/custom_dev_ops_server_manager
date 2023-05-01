@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.csi.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.csi.fields.channel-server')</th>
                            <td field-key='channel_server'>{{ $csi->channel_server->cs_host ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.csi.fields.channel')</th>
                            <td field-key='channel'>{{ $csi->channel->source_name ?? '' }}</td>
<td field-key='channelid'>{{ isset($csi->channel) ? $csi->channel->channelid : '' }}</td>
<td field-key='ssm'>{{ isset($csi->channel) ? $csi->channel->ssm : '' }}</td>
<td field-key='imc'>{{ isset($csi->channel) ? $csi->channel->imc : '' }}</td>
<td field-key='port'>{{ isset($csi->channel) ? $csi->channel->port : '' }}</td>
<td field-key='pid'>{{ isset($csi->channel) ? $csi->channel->pid : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.csi.fields.protocol')</th>
                            <td field-key='protocol'>{{ $csi->protocol->protocol ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.csi.fields.move-path')</th>
                            <td field-key='move_path'>{{ $csi->move_path }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.csi.fields.cs-token')</th>
                            <td field-key='cs_token'>{{ $csi->cs_token }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#channels" aria-controls="channels" role="tab" data-toggle="tab">Channels</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="channels">
<table class="table table-bordered table-striped {{ count($channels) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.channels.fields.channelid')</th>
                        <th>@lang('global.channels.fields.ssm')</th>
                        <th>@lang('global.channels.fields.imc')</th>
                        <th>@lang('global.channels.fields.port')</th>
                        <th>@lang('global.channels.fields.valid-as-of')</th>
                        <th>@lang('global.channels.fields.csi')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($channels) > 0)
            @foreach ($channels as $channel)
                <tr data-entry-id="{{ $channel->id }}">
                    <td field-key='channelid'>{{ $channel->channelid }}</td>
                                <td field-key='ssm'>{{ $channel->ssm }}</td>
                                <td field-key='imc'>{{ $channel->imc }}</td>
                                <td field-key='port'>{{ $channel->port }}</td>
                                <td field-key='valid_as_of'>{{ $channel->valid_as_of }}</td>
                                <td field-key='csi'>{{ $channel->csi->move_path ?? '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.channels.restore', $channel->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.channels.perma_del', $channel->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('channel_view')
                                    <a href="{{ route('admin.channels.show',[$channel->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('channel_edit')
                                    <a href="{{ route('admin.channels.edit',[$channel->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
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
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="17">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.csis.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


