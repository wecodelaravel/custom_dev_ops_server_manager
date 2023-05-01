@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.instance.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.instance.fields.group')</th>
                            <td field-key='group'>{{ $instance->group->group ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.instance.fields.quantity-to-create')</th>
                            <td field-key='quantity_to_create'>{{ $instance->quantity_to_create }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.instance.fields.role-convention')</th>
                            <td field-key='role_convention'>{{ $instance->role_convention->role_convention ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.instance.fields.channel-server')</th>
                            <td field-key='channel_server'>{{ $instance->channel_server->cs_host ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.instance.fields.aggregation-server')</th>
                            <td field-key='aggregation_server'>{{ $instance->aggregation_server->as_host_url ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.instance.fields.env')</th>
                            <td field-key='env'>{{ $instance->env->environment ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.instance.fields.details')</th>
                            <td field-key='details'>
                                @foreach($instance->details as $detail)
                                    {{ $detail }} <br>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('global.instance.fields.notes')</th>
                            <td field-key='notes'>{!! $instance->notes !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.instance.fields.cs-token')</th>
                            <td field-key='cs_token'>{{ $instance->cs_token }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.instances.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


