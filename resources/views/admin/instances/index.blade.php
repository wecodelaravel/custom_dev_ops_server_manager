@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.instance.title')</h3>
    @can('instance_create')
    <p>
        <a href="{{ route('admin.instances.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        <a href="#" class="btn btn-warning" style="margin-left:5px;" data-toggle="modal" data-target="#myModal">@lang('global.app_csvImport')</a>
        @include('csvImport.modal', ['model' => 'Instance'])

    </p>
    @endcan

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.instances.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.instances.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('instance_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('instance_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('global.instance.fields.group')</th>
                        <th>@lang('global.instance.fields.quantity-to-create')</th>
                        <th>@lang('global.instance.fields.role-convention')</th>
                        <th>@lang('global.instance.fields.channel-server')</th>
                        <th>@lang('global.instance.fields.aggregation-server')</th>
                        <th>@lang('global.instance.fields.env')</th>
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
        @can('instance_delete')
            @if(request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.instances.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.instances.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [
                @can('instance_delete')
                    @if( request('show_deleted') != 1 )
                        {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                    @endif
                @endcan
                {data: 'group.group', name: 'group.group'},
                {data: 'quantity_to_create', name: 'quantity_to_create'},
                {data: 'role_convention.role_convention', name: 'role_convention.role_convention'},
                {data: 'channel_server.cs_host', name: 'channel_server.cs_host'},
                {data: 'aggregation_server.as_host_url', name: 'aggregation_server.as_host_url'},
                {data: 'env.environment', name: 'env.environment'},

                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection
