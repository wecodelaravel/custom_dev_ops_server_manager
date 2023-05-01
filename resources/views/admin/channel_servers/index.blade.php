@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.channel-server.title')</h3>
    @can('channel_server_create')
    <p>
        <a href="{{ route('admin.channel_servers.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        <a href="#" class="btn btn-warning" style="margin-left:5px;" data-toggle="modal" data-target="#myModal">@lang('global.app_csvImport')</a>
        @include('csvImport.modal', ['model' => 'ChannelServer'])

    </p>
    @endcan

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.channel_servers.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.channel_servers.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('channel_server_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('channel_server_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('global.channel-server.fields.group')</th>
                        {{-- <th>@lang('global.channel-server.fields.cs-name')</th> --}}
                        <th>@lang('global.channel-server.fields.cs-host')</th>
                        {{-- <th>@lang('global.channel-server.fields.cs-host-ip')</th> --}}
                        <th>Add Channel Server Input ( CSI )</th>
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

{{-- @include('preview.cs.model-channelids') --}}
{{-- @include('preview.cs.model-cs') --}}
{{-- @include('preview.cs.model-settings') --}}


@stop

@section('javascript')
    <script>
        @can('channel_server_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.channel_servers.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.channel_servers.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [
                @can('channel_server_delete')
                    @if ( request('show_deleted') != 1 )
                        {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                    @endif
                @endcan
                {data: 'group.group', name: 'group.group'},
                // {data: 'cs_name', name: 'cs_name'},
                {data: 'cs_host', name: 'cs_host'},
                // {data: 'cs_host_ip', name: 'cs_host_ip'},
                {data: 'add', name: 'add', searchable: false, sortable: false},
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection
