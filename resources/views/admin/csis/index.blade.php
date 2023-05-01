@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.csi.title')</h3>
    @can('csi_create')
    <p>
        <a href="{{ route('admin.csis.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        <a href="#" class="btn btn-warning" style="margin-left:5px;" data-toggle="modal" data-target="#myModal">@lang('global.app_csvImport')</a>
        @include('csvImport.modal', ['model' => 'Csi'])
        
    </p>
    @endcan

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.csis.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.csis.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('csi_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('csi_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('global.csi.fields.channel-server')</th>
                        <th>@lang('global.csi.fields.channel')</th>
                        <th>@lang('global.channels.fields.channelid')</th>
                        <th>@lang('global.channels.fields.ssm')</th>
                        <th>@lang('global.channels.fields.imc')</th>
                        <th>@lang('global.channels.fields.port')</th>
                        <th>@lang('global.channels.fields.pid')</th>
                        <th>@lang('global.csi.fields.protocol')</th>
                        <th>@lang('global.csi.fields.move-path')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('csi_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.csis.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.csis.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('csi_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'channel_server.cs_host', name: 'channel_server.cs_host'},
                {data: 'channel.source_name', name: 'channel.source_name'},
                {data: 'channel.channelid', name: 'channel.channelid'},
                {data: 'channel.ssm', name: 'channel.ssm'},
                {data: 'channel.imc', name: 'channel.imc'},
                {data: 'channel.port', name: 'channel.port'},
                {data: 'channel.pid', name: 'channel.pid'},
                {data: 'protocol.protocol', name: 'protocol.protocol'},
                {data: 'move_path', name: 'move_path'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection