@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.cso.title')</h3>
    @can('cso_create')
    <p>
        <a href="{{ route('admin.csos.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        <a href="#" class="btn btn-warning" style="margin-left:5px;" data-toggle="modal" data-target="#myModal">@lang('global.app_csvImport')</a>
        @include('csvImport.modal', ['model' => 'Cso'])

    </p>
    @endcan

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.csos.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.csos.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('cso_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('cso_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('global.cso.fields.channel-server')</th>
                        <th>@lang('global.cso.fields.channel')</th>
                        <th>@lang('global.cso.fields.select-aggregation-server-for-a')</th>

                        <th>@lang('global.cso.fields.select-aggregation-server-for-b')</th>
                        <th>@lang('global.cso.fields.select-sync-server-for-a')</th>
                        <th>@lang('global.cso.fields.select-sync-server-for-b')</th>
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
        @can('cso_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.csos.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.csos.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [
                    @can('cso_delete')
                        @if ( request('show_deleted') != 1 )
                            {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                        @endif
                    @endcan
                        {data: 'channel_server.cs_host', name: 'channel_server.cs_host'},
                        {data: 'channel.channelid', name: 'channel.channelid'},
                        {data: 'select_aggregation_server_for_a.as_host_url', name: 'select_aggregation_server_for_a.as_host_url'},

                        {data: 'select_aggregation_server_for_b.as_host_url', name: 'select_aggregation_server_for_b.as_host_url'},
                        {data: 'select_sync_server_for_a.ss_host_url', name: 'select_sync_server_for_a.ss_host_url'},
                        {data: 'select_sync_server_for_b.ss_host_url', name: 'select_sync_server_for_b.ss_host_url'},

                        {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection
