@extends('layouts.app')


@php


// $group = \Session::get('group');

// dd($group);

if($group){
    $id = $group->id;

}else{
    $id = "1";

}
    $css = \App\Host::where('group_id', $id)->where('name', 'LIKE', '%aacs%')->get();
    $sss = \App\Host::where('group_id', $id)->where('name', 'LIKE', '%aass%')->get();
    $ags = \App\Host::where('group_id', $id)->where('name', 'LIKE', '%aaas%')->get();
    $x = 'B';
@endphp

@section('content')


<div class="row">
    <div class="col-md-3">
        <h3 class="page-title">@lang('global.global_dashboard')</h3>
        <p> {{-- trans('global.app_custom_controller_index') --}} </p>
    </div>
</div>

{!! Form::open(['method' => 'get','id' => 'filter_form']) !!}
<div class="row">

    <div class="form-group col-md-4">
        <label for="inputGroup">Groups</label>
        {{-- {!! Form::select('group_id', $groups, old('group_id'), ['class' => 'form-control select2']) !!} --}}
        {!! Form::select('group', @$groups, @$search_params['group'], array('placeholder' => 'Select Group', 'class'=>'form-control', 'id' => 'group', 'value'=>@$search_params['group'])) !!}
    </div>

</div>
{!! Form::close() !!}
<hr style="clear:both" />


<div class="row">
    <div class="col-md-8">
        <div class="box box-default">
            <div class="box-header with-border">
                <i class="fa fa-warning"></i>
                <h3 class="box-title">Group Details</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 table-responsive">
                        @if($group)
                        <table class="table table-bordered table-striped">
                            <tr> <th>@lang('global.group.fields.group')</th> <td field-key='group'>{{ $group->group }}</td> </tr>
                            <tr> <th>@lang('global.group.fields.cs-token')</th> <td field-key='cs_token'>{{ $group->cs_token }}</td> </tr>
                            <tr> <th>@lang('global.group.fields.details')</th> <td field-key='details'>{!! $group->details !!}</td> </tr>
                            <tr> <th>@lang('global.group.fields.notes')</th> <td field-key='notes'>{!! $group->notes !!}</td> </tr>
                        </table>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Post All CONF's (ready when green)</h3>
                            </div>
                            <div class="panel-body">
                                {{-- <a target="_blank" href="{{ route('preview.cs.channel_server',[$channel_server->id]) }}" class="btn  btn-primary">ChannelServer </a>
                                <a target="_blank" href="{{ route('preview.cs.channelids',[$channel_server->id]) }}" class="btn  btn-primary">ChannelIDS </a>
                                <a target="_blank" href="{{ route('preview.cs.settings',[$channel_server->id]) }}" class="btn  btn-primary">Settings </a> --}}
                                <button type="button" class="btn btn-danger" data-id="" data-toggle="modal" data-target="#modal-channelids" disabled="true">POST ALL CONFS</button>
                                <button type="button" class="btn btn-primary" data-id="refresh" data-toggle="modal" id="refresh">MANUAL REFRESH</button>
                            </div>
                        </div>
                    </div>

                </div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#instance" aria-controls="instance" role="tab" data-toggle="tab">Instance</a></li>
                    <li role="presentation" class=""><a href="#channel_server" aria-controls="channel_server" role="tab" data-toggle="tab">Channel server</a></li>
                    <li role="presentation" class=""><a href="#aggregation_server" aria-controls="aggregation_server" role="tab" data-toggle="tab">Aggregation Servers</a></li>
                    <li role="presentation" class=""><a href="#syncservers" aria-controls="syncservers" role="tab" data-toggle="tab">Sync Servers</a></li>
                    <li role="presentation" class=""><a href="#hosts" aria-controls="hosts" role="tab" data-toggle="tab">Hosts</a></li>
                </ul>
                <div class="tab-content">
                    @if($group)
                    @include('admin.groups.partials.instance-tab')
                    @include('admin.groups.partials.cs-tab')
                    @include('admin.groups.partials.as-tab')
                    @include('admin.groups.partials.ss-tab')
                    @include('admin.groups.partials.hosts-tab')
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 pull-right">
        {{-- @if(count($hosts) > 0) --}}
        @if($hosts)
        @include('admin.groups.partials.checklist')
        @else
        <div class="col-md-4">
            <h3>NO SERVERS HAVE BEEN SETUP YET</h3>
        </div>
        @endif
    </div>
    @if(count($css) > 0)
    <div class="col-md-8">
        @include('admin.groups.partials.mermaid')
        @include('admin.groups.partials.legend')
    </div>
    @else
    <div class="col-md-8">
        <h3>NO SERVERS HAVE BEEN SETUP NOTHING TO VISUAL SHOW</h3>
    </div>
    @endif
</div>


@endsection

@section('javascript')
<script>
    $(function () {
        $('select[name="group"]').val('{{ @$group->id }}').change();
        $('select[name="group"]').on("change", function () {
            console.log($('select[name="group"]').val());

            if($(this).attr('id') == 'group'){
                console.log("id matched group i guess");
            }
            $('#filter_form').submit();
        });
    });
</script>
@endsection
