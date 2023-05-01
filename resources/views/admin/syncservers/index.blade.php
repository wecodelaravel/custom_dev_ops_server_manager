@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.syncservers.title')</h3>
    @can('syncserver_create')
    <p>
        <a href="{{ route('admin.syncservers.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        <a href="#" class="btn btn-warning" style="margin-left:5px;" data-toggle="modal" data-target="#myModal">@lang('global.app_csvImport')</a>
        @include('csvImport.modal', ['model' => 'Syncserver'])

    </p>
    @endcan

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.syncservers.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.syncservers.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('syncserver_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('syncserver_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('global.syncservers.fields.ss-name')</th>
                        <th>@lang('global.syncservers.fields.ss-host-url')</th>
                        <th>@lang('global.syncservers.fields.ss-hostip')</th>
                        <th>@lang('global.syncservers.fields.group')</th>
                        <th>@lang('global.syncservers.fields.channel-server')</th>
                        {{-- <th>@lang('global.channel-server.fields.cs-host')</th> --}}
                        <th>@lang('global.syncservers.fields.parent-as')</th>
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
        @can('syncserver_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.syncservers.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.syncservers.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('syncserver_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan
                {data: 'ss_name', name: 'ss_name'},
                {data: 'ss_host_url', name: 'ss_host_url'},
                {data: 'ss_hostip', name: 'ss_hostip'},
                {data: 'group.group', name: 'group.group'},
                {data: 'channel_server.cs_host', name: 'channel_server.cs_host'},
                // {data: 'channel_server.cs_host', name: 'channel_server.cs_host'},
                {data: 'parent_as.as_host_url', name: 'parent_as.as_host_url'},

                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection
