@extends('layouts.app')

@section('content')

{{--  <style>
  .highlight{
    background-color: yellow
  }
  </style> --}}

    <h3 class="page-title">@lang('global.csi.title')</h3>
    {{-- {!! Form::open(['method' => 'POST', 'route' => ['admin.csis.store'], 'id' => 'csi-form' ]) !!} --}}
    {!! Form::open(['method' => 'POST',  'id' => 'csi-form' ]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>

        <div class="panel-body">

            <span id="result"></span>

            <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Channel Server</th>
                        <th scope="col">Channel</th>
                        <th scope="col">Protocol</th>
                        <th scope="col">Path</th>
                        <th scope="col"></th>


                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                                <td id="first-cs-input">{!! Form::select('channel_server_id[]', $channel_servers, old('channel_server_id'), ['class' => 'form-control ', 'id' => 'channelserver']) !!}</td>
                                <td>{!! Form::select('channel_id[]', $channels, old('channel_id'), ['class' => 'form-control ', 'id' => 'channel']) !!}</td>
                                <td>{!! Form::select('protocol_id[]', $protocols, old('protocol_id'), ['class' => 'form-control', 'id' => 'protocol']) !!}</td>
                                <td>{!! Form::text('move_path[]', old('move_path'), ['class' => 'form-control', 'value' => '/home/caipy/segments_in', 'id' => 'movepath']) !!}</td>
                                <td><button type="button" name="add" id="add" class="btn btn-success"> <i class="fa fa-plus-square fa-lg"></i> </button></td>
                        </tr>

                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="save" id="save" class="btn btn-primary" value="Save" /></td>
                        </tr>
                    </tfoot>
                  </table>
                </div>
            </div>


        </div>
    </div>

    {{--{!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}--}}
    {!! Form::close() !!}

@stop

@section('top-script') @endsection

@section('javascript')
    <script>



        $(document).ready(function () {
            console.clear();

            var MaxInputs = 5;
            var count = 2;
            var path = "/home/caipy/segments_in";

            dynamic(count);

            $('div#wrapper form#csi-form #first-cs-input select#channelserver :selected').change(function () {
                if ( $("table.table>tbody>tr>td:nth-child(2)>select :selected").text()  ) {
                   var cs = $("table.table>tbody>tr>td:nth-child(2)>select :selected").text();
                   console.log("CS: " + cs);

                }
            });

            $("div#wrapper form#csi-form #first-cs-input select#channelserver").first().addClass( "highlight" );

            // $('input#movepath').val(currentcs).change();

                // https://www.youtube.com/watch?v=KqDpESFmLrg
            function dynamic(number)
            {

                    if(number > 2 )
                    {
                        // var path = "/home/caipy/segments_in";
                        // var selectedValue = jQuery("div#wrapper form#csi-form #first-cs-input select#channelserver").val();
                        var html =  '<tr>';
                            html += '<th scope="row">' + count + '</th>';
                            html += '<td>{!! Form::select("channel_server_id[]", $channel_servers, old("channel_server_id"), ["class" => "form-control", "id" => "channelserver"]) !!}</td>';
                            html += '<td>{!! Form::select("channel_id[]", $channels, old("channel_id"), ["class" => "form-control ", "id" => "channel"]) !!}</td>';
                            html += '<td>{!! Form::select("protocol_id[]", $protocols, old("protocol_id"), ["class" => "form-control", "id" => "protocol"]) !!}</td>';
                            html += '<td>{!! Form::text("move_path[]", old("move_path"), ["class" => "form-control", "id" => "movepath"]) !!}</td>';
                            html += '<td><button type="button" name="remove" id="remove" class="btn btn-danger"> <i class="fa fa-remove fa-lg"></i> </button></td>';
                            html += '</tr>';
                            $('tbody').append(html);


                    }

            }



            $('#add').click(function(e) {
                e.preventDefault();
                count++;
                dynamic(count);
                        var path = "/home/caipy/segments_in";
                        var selectedValue = jQuery("div#wrapper form#csi-form #first-cs-input select#channelserver").val();
                        $("div#wrapper form#csi-form select#channelserver").val(selectedValue).change();
                        $("div#wrapper form#csi-form select#protocol").val('3').change();
                        $('input#movepath').val(path);

            });

            $(document).on('click', '#remove', function () {
                count--;
                $(this).closest("tr").remove();
            });

            $('#csi-form').on('submit', function(event)
            {
                event.preventDefault();
                $.ajax({
                    url:'{{ route("admin.csis.insert") }}',
                    method : 'POST',
                    data:$(this).serialize(),
                    dataType: 'json',
                    beforeSend:function()
                    {
                        $('#save').attr('disabled','disabled');
                    },
                    success:function(data)
                    {
                        if(data.error)
                        {
                            var error_html ='';
                            for (
                                var count = 0;
                                count < data.error.length;
                                count++
                                )
                            {
                                error_html += '<p>'+data.error[count]+'</p>';
                            }
                            $('#result').html('<div class="alert alert-danger">'+ error_html  +'</div>');
                        }
                        else
                        {
                            dynamic(1);
                            $('#result').html('<div class="alert alert-success">'+ data.success +'</div>');
                        }
                        $('#save').attr('disabled', false);
                    }
                });
            });



            // $('#csi-form').on('submit', function(event)
            // {
            //     event.preventDefault();
            //     $.ajax({
            //         url:'{{ route("admin.csis.insert") }}',
            //         method : 'POST',
            //         data:$(this).serialize(),
            //         dataType: 'json',
            //         beforeSend:function()
            //         {
            //             $('#save').attr('disabled','disabled');
            //         },
            //         success:function(data)
            //         {
            //             if(data.error)
            //             {
            //                 var error_html ='';
            //                 for (
            //                     var count = 0;
            //                     count < data.error.length;
            //                     count++
            //                     )
            //                 {
            //                     error_html += '<p>'+data.error[count]+'</p>';
            //                 }
            //                 $('#result').html('<div class="alert alert-danger">'+ error_html  +'</div>');
            //             }
            //             else
            //             {
            //                 dynamic(1);
            //                 $('#result').html('<div class="alert alert-success">'+ data.success +'</div>');
            //                 $('div.flash-message').html(data);
            //             }
            //             $('#save').attr('disabled', false);
            //         }
            //     });
            // });


            $("select").css("width", "100%");
            $("select#channelserver").change(function () {
                if ( $("select#channelserver :selected").text()  ) {
                    $("#channel-input").attr("disabled","disabled");
                }
            });
            $("select#channel").change(function () {
                if ( $("select#channel :selected").text()  ) {
                    $("#protocol-input").show();
                }
            });
            $("select#protocol").change(function () {
                if ( $("select#protocol :selected").text() == 'MOVE' ) {
                    $("#move-input").show();
                }
            });
        });
    </script>
@endsection

@section('head-script')
<style>
    div#wrapper select   {font-family: Helvetica; font-size: 1.5REM;text-transform: uppercase; font-weight: bold; }
</style>
@endsection
