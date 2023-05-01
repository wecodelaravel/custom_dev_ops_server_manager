@extends('layouts.app')

@section('content')
@php
    $css = \App\Host::where('name', 'LIKE', '%aacs%')->get();
    $sss = \App\Host::where('name', 'LIKE', '%aass%')->get();
    $ags = \App\Host::where('name', 'LIKE', '%aaas%')->get();
    $x = 'B';
@endphp
<h3 class="page-title">@lang('global.group.title') <a href="{{ route('admin.groups.index') }}" class="btn btn-default pull-right">@lang('global.app_back_to_list')</a></h3>

<div class="row">
    <div class="colxs-12 col-sm-12 col-md-10 col-lg-8 ">
        <div class="box box-default">
            <div class="box-header with-border">
                <i class="fa fa-warning"></i>
                <h3 class="box-title">Group Details</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 table-responsive">
                        <table class="table table-bordered table-striped">
                            <tr> <th>@lang('global.group.fields.group')</th> <td field-key='group'>{{ $group->group }}</td> </tr>
                            <tr> <th>@lang('global.group.fields.cs-token')</th> <td field-key='cs_token'>{{ $group->cs_token }}</td> </tr>
                            <tr> <th>@lang('global.group.fields.details')</th> <td field-key='details'>{!! $group->details !!}</td> </tr>
                            <tr> <th>@lang('global.group.fields.notes')</th> <td field-key='notes'>{!! $group->notes !!}</td> </tr>
                        </table>
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
                                                @include('admin.groups.partials.instance-tab')
                                                @include('admin.groups.partials.cs-tab')
                                                @include('admin.groups.partials.as-tab')
                                                @include('admin.groups.partials.ss-tab')
                                                @include('admin.groups.partials.hosts-tab')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 pull-right">
                                    @if(count($hosts) > 0)
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
                                        <h3>NO SERVERS HAVE BEEN SETUP NOTHING TO SHOW</h3>
                                    </div>
                                @endif
                            </div>

                            <p>&nbsp;</p>
                            <a href="{{ route('admin.groups.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>

@stop


@section('page-style')
        <style>
        /*[class=*"col-md"]{}*/
        .status {display: inline-block; min-width: 10px; padding: 3px 7px; font-size: 14px; font-weight: 700; line-height: 1; color: #fff; text-align: center; white-space: nowrap; vertical-align: middle; background-color: #777; border-radius: 0px; }
        .hosts-status-section .box-footer .nav-stacked li {font-size: 14px; font-weight: 700; }
         .status-icon {display: inline-block; min-width: 30px; font-size: 12px; font-weight: 700; line-height: 1; text-align: center; white-space: nowrap; vertical-align: middle; border-radius: 0px; }
        </style>
@endsection


@section('javascript')
    <script>
        $(document).load(function() {
            $("#refresh").click(function () {
                // location.reload(true);
                window.location.reload();
            });
            var config = {
                startOnLoad:true,
                theme: 'dark',
                // themeCSS: '.node rect { fill: red; } ',
                flowchart:{
                    useMaxWidth:true,
                    htmlLabels:true
                },

            };
            mermaid.initialize(config);
            mermaid.flowchartConfig = {
                width:100%;
            };
        });

        $('#mermaidChart0').find('svg > a').attr('target','_blank');


    </script>
@endsection
