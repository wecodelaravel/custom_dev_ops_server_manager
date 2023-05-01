@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.channels.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.channels.fields.source-name')</th>
                            <td field-key='source_name'>{{ $channel->source_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.channels.fields.channelid')</th>
                            <td field-key='channelid'>{{ $channel->channelid }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.channels.fields.env')</th>
                            <td field-key='env'>{{ $channel->env }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.channels.fields.ffmpegsource')</th>
                            <td field-key='ffmpegsource'>{{ $channel->ffmpegsource }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.channels.fields.ssm')</th>
                            <td field-key='ssm'>{{ $channel->ssm }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.channels.fields.imc')</th>
                            <td field-key='imc'>{{ $channel->imc }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.channels.fields.port')</th>
                            <td field-key='port'>{{ $channel->port }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.channels.fields.pid')</th>
                            <td field-key='pid'>{{ $channel->pid }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.channels.fields.source-ip')</th>
                            <td field-key='source_ip'>{{ $channel->source_ip }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.channels.fields.udp')</th>
                            <td field-key='udp'>{{ $channel->udp }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.channels.fields.valid-as-of')</th>
                            <td field-key='valid_as_of'>{{ $channel->valid_as_of }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.channels.fields.csi')</th>
                            <td field-key='csi'>{{ $channel->csi->move_path ?? '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">

<li role="presentation" class="active"><a href="#csi" aria-controls="csi" role="tab" data-toggle="tab">Channel Server Inputs</a></li>
<li role="presentation" class=""><a href="#cso" aria-controls="cso" role="tab" data-toggle="tab">Channel Server Outputs</a></li>
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

            <a href="{{ route('admin.channels.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
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
