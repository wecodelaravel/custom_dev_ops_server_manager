@extends('layouts.app')
@section('content')
<h3 class="page-title">@lang('global.group.title')</h3>
<div class="panel panel-default">
    <div class="panel-heading">
        @lang('global.app_view')
    </div>
    <div class="panel-body table-responsive">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>@lang('global.group.fields.group')</th>
                        <td field-key='group'>{{ $group->group }}</td>
                    </tr>
                    <tr>
                        <th>@lang('global.group.fields.cs-token')</th>
                        <td field-key='cs_token'>{{ $group->cs_token }}</td>
                    </tr>
                    <tr>
                        <th>@lang('global.group.fields.details')</th>
                        <td field-key='details'>{!! $group->details !!}</td>
                    </tr>
                    <tr>
                        <th>@lang('global.group.fields.notes')</th>
                        <td field-key='notes'>{!! $group->notes !!}</td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#instance" aria-controls="instance" role="tab" data-toggle="tab">Instance</a></li>
            <li role="presentation" class=""><a href="#channel_server" aria-controls="channel_server" role="tab" data-toggle="tab">Channel server</a></li>
            <li role="presentation" class=""><a href="#aggregation_server" aria-controls="aggregation_server" role="tab" data-toggle="tab">Aggregation Servers</a></li>
            <li role="presentation" class=""><a href="#syncservers" aria-controls="syncservers" role="tab" data-toggle="tab">Sync Servers</a></li>
            <li role="presentation" class=""><a href="#hosts" aria-controls="hosts" role="tab" data-toggle="tab">Hosts</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            @include('admin.groups.partials.instance-tab')
            @include('admin.groups.partials.cs-tab')
            @include('admin.groups.partials.as-tab')
            @include('admin.groups.partials.ss-tab')
            @include('admin.groups.partials.hosts-tab')

        </div>
        <p>&nbsp;</p>
        <a href="{{ route('admin.groups.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
    </div>
</div>

@stop
