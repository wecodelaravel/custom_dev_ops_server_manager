@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.cso.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.csos.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>

        <div class="panel-body">
            @include('admin.csos.partials.left')
            @include('admin.csos.partials.right')
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

    {{-- <button>Get Checked Checkboxes</button> --}}


@stop

@section('javascript')
    <script>

        if ( $('input[name="use_channel_server_localhost"]').is(':checked') ) {
             $('#use_channel_server_localhost_input').show();
        }
        if ( $('input[name="use_sync_server_for_a"]').is(':checked') ) {
             $('#select_sync_server_for_a_id_input').show();
        }
        if ( $('input[name="use_sync_server_for_b"]').is(':checked') ) {
             $('#select_sync_server_for_b_id_input').show();
        }
        if ( $('input[name="use_as_for_a"]').is(':checked') ) {
             $('#select_aggregation_server_for_a_id_input').show();
        }
        if ( $('input[name="use_as_for_b"]').is(':checked') ) {
             $('#select_aggregation_server_for_b_id_input').show();
        }

        if ( $('input[name="use_custom_a"]').is(':checked') ) {
            $("#use_custom_a_input1").show();
            $("#use_custom_a_input2").show();
        }

        if ( $('input[name="use_custom_for_b"]').is(':checked') ) {
            $("#use_custom_for_b_input1").show();
            $("#use_custom_for_b_input2").show();
        }

        $(document).ready(function()
        {
            $('#use_channel_server_localhost').click(function() {
             if( $(this).is(':checked')) {
                $("#use_channel_server_localhost_input").show();
             } else {
                $("#use_channel_server_localhost_input").hide();
             }
            });

            $('#use_sync_server_for_a').click(function() {
             if( $(this).is(':checked')) {
                $("#select_sync_server_for_a_id_input").show();
             } else {
                $("#select_sync_server_for_a_id_input").hide();
             }
            });

            $('#use_sync_server_for_b').click(function() {
             if( $(this).is(':checked')) {
                $("#select_sync_server_for_b_id_input").show();
             } else {
                $("#select_sync_server_for_b_id_input").hide();
             }
            });

            $('#use_as_for_a').click(function() {
             if( $(this).is(':checked')) {
                $("#select_aggregation_server_for_a_id_input").show();
             } else {
                $("#select_aggregation_server_for_a_id_input").hide();
             }
            });

            $('#use_as_for_b').click(function() {
             if( $(this).is(':checked')) {
                $("#select_aggregation_server_for_b_id_input").show();
             } else {
                $("#select_aggregation_server_for_b_id_input").hide();
             }
            });

            $('#use_custom_a').click(function() {
             if( $(this).is(':checked')) {
                $("#use_custom_a_input1").show();
                $("#use_custom_a_input2").show();
             } else {
                $("#use_custom_a_input1").hide();
                $("#use_custom_a_input2").hide();
             }
            });

            $('#use_custom_for_b').click(function() {
             if( $(this).is(':checked')) {
                $("#use_custom_for_b_input1").show();
                $("#use_custom_for_b_input2").show();
             } else {
                $("#use_custom_for_b_input1").hide();
                $("#use_custom_for_b_input2").hide();
             }
            });
        });

    </script>
@stop


@section('head-script-off')
    <script>
        window.onload = function() {
            console.clear();
            console.log("load event detected!");
        };
    </script>
@stop
