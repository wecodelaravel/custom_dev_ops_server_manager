@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.environment.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.environment.fields.environment')</th>
                            <td field-key='environment'>{{ $environment->environment }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.environment.fields.env-value')</th>
                            <td field-key='env_value'>{{ $environment->env_value }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#instance" aria-controls="instance" role="tab" data-toggle="tab">Instance</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="instance">
<table class="table table-bordered table-striped {{ count($instances) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
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

    <tbody>
        @if (count($instances) > 0)
            @foreach ($instances as $instance)
                <tr data-entry-id="{{ $instance->id }}">
                    <td field-key='group'>{{ $instance->group->group ?? '' }}</td>
                                <td field-key='quantity_to_create'>{{ $instance->quantity_to_create }}</td>
                                <td field-key='role_convention'>{{ $instance->role_convention->role_convention ?? '' }}</td>
                                <td field-key='channel_server'>{{ $instance->channel_server->cs_host ?? '' }}</td>
                                <td field-key='aggregation_server'>{{ $instance->aggregation_server->as_host_url ?? '' }}</td>
                                <td field-key='env'>{{ $instance->env->environment ?? '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.instances.restore', $instance->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.instances.perma_del', $instance->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('instance_view')
                                    <a href="{{ route('admin.instances.show',[$instance->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('instance_edit')
                                    <a href="{{ route('admin.instances.edit',[$instance->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('instance_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.instances.destroy', $instance->id])) !!}
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
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.environments.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


