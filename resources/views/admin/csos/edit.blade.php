@extends('layouts.app')

@section('content')

<style>
    .form-group input[type="checkbox"] {
    display: none;
}

.form-group input[type="checkbox"] + .btn-group > label span {
    width: 20px;
}

.form-group input[type="checkbox"] + .btn-group > label span:first-child {
    display: none;
}
.form-group input[type="checkbox"] + .btn-group > label span:last-child {
    display: inline-block;
}

.form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
    display: inline-block;
}
.form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
    display: none;
}
</style>
    <h3 class="page-title">@lang('global.cso.title')</h3>

    {!! Form::model($cso, ['method' => 'PUT', 'route' => ['admin.csos.update', $cso->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            @include('admin.csos.partials.left')
            @include('admin.csos.partials.right')
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

    {{-- for testing purposes only <button>Get Checked Checkboxes</button> --}}


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


        // document.querySelector("button").addEventListener("click", function(){
        //   // Query for only the checked checkboxes and put the result in an array
        //   let checked = Array.prototype.slice.call(document.querySelectorAll("input[type='checkbox']:checked"));
        //   console.clear();
        //   // Loop over the array and inspect contents
        //   checked.forEach(function(cb){
        //     console.log(cb.name + ' | ' + cb.value);
        //   });
        // });
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
