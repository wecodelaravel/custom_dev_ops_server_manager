@inject('request', 'Illuminate\Http\Request')
@section('head-script')
<style>
    .well strong {font-family: Consolas; color: #fff; background-color: #000; }
</style>
@endsection

        <div class="modal fade" id="modal-cs">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">ChannelServer CONF Preview</h4>
                        </div>
                        <div class="modal-body">
                            <div id="conf-preview" style="font-family: 'Helvetica Neue'!important; font-size: 1.5!important;font-weight:bold!important;">

                                <div class="well">



                                    [INPUT]<br>
                                    @if (count($channel_server->csis) > 0)

                                        @foreach ($csis as $csi)

                                            @if($csi->protocol->protocol == 'UDP')
                                                CID{!! $loop->index !!}=<strong>{!! @$csi->channel->id !!}</strong>
                                                &
                                                PROTOCOL{!! $loop->index !!}=<strong>{!! @$csi->protocol->protocol !!}</strong>
                                                &
                                                URL{!! $loop->index !!}=<strong>{!! @$csi->url !!}</strong>
                                                <br>
                                            @elseif($csi->protocol->protocol == 'MOVE')
                                                CID{!! $loop->index !!}=<strong>{!! @$csi->channel->id !!}</strong>&PROTOCOL{!! $loop->index !!}=<strong>{!! @$csi->protocol->protocol !!}</strong>
                                                &URL{!! $loop->index !!}=<strong>{!! @$csi->move_path !!}</strong>
                                                <br>
                                            {{-- @else --}}

                                                {{--   CID{!! $loop->index !!}=<strong>{!! @$csi->channel->id !!}</strong>
                                                    &
                                                    PROTOCOL{!! $loop->index !!}=<strong>{!! @$csi->protocol->protocol !!}</strong>
                                                    &
                                                    SSM{!! $loop->index !!}=<strong>{!! @$csi->channel->ssm !!}</strong>
                                                    &
                                                    IMC{!! $loop->index !!}=<strong>{!! @$csi->channel->imc !!}</strong>
                                                    &
                                                    IP{!! $loop->index !!}=<strong>{!! @$csi->channel->ip !!}</strong>
                                                    &
                                                    PID{!! $loop->index !!}=<strong>{!! @$csi->channel->pid !!}</strong> --}}

                                            @endif

                                        @endforeach
                                    @endif

                                    @foreach (range($channel_server->csis->count(), 19) as $index)
                                    CID{!! $index !!}=&PROTOCOL{!! $index !!}=&SSM{!! $index !!}=&IMC{!! $index !!}=&IP{!! $index !!}=&PID{!! $index !!}=<br>
                                    @endforeach

                                    <br>
                                    [OUTPUT]<br>
                                    OMC1={!! @$channel_server->local_output !!}&OP1={!! @$channel_server->local_output_port !!} <br>
                                    OCLOUD1={!! @$channel_server->default_cloud_a_address !!}&OCP1={!! @$channel_server->default_cloud_a_port !!} <br>
                                    OCLOUD2={!! @$channel_server->default_cloud_b_address !!}&OCP2={!! @$channel_server->default_cloud_b_port !!} <br>

                                    @if(count($csos) > 0)

                                        @foreach ($csos as $cso)
                                            @if($cso->use_custom_a)
                                                OCLOUD_A_{!! $loop->index !!}={!! @$cso->ocloud_a !!}&OCP_A_{!! $loop->index !!}={!! @$cso->ocp_a !!}
                                            @elseif($cso->use_sync_server_for_a)
                                                OCLOUD_A_{!! $loop->index !!}={!! @$cso->select_sync_server_for_a->ss_host_url !!}&OCP_A_{!! $loop->index !!}=8080
                                            @elseif($cso->use_as_for_a)
                                                OCLOUD_A_{!! $loop->index !!}={!! @$cso->select_aggregation_server_for_a->as_host_url !!}&OCP_A_{!! $loop->index !!}=8080
                                            {{-- @else --}}
                                                {{-- OCLOUD_A_{!! $loop->index !!}=&OCP_A_{!! $loop->index !!}= --}}
                                            @endif

                                            @if($cso->use_custom_a)
                                                &OCLOUD_B_{!! $loop->index !!}={!! @$cso->ocloud_b !!}&OCP_B_{!! $loop->index !!}={!! @$cso->ocp_b !!}
                                            @elseif($cso->use_sync_server_for_b)
                                                &OCLOUD_B_{!! $loop->index !!}={!! @$cso->select_sync_server_for_b->ss_host_url !!}&OCP_B_{!! $loop->index !!}=8080
                                            @elseif($cso->use_as_for_b)
                                                &OCLOUD_B_{!! $loop->index !!}={!! @$cso->select_aggregation_server_for_b->as_host_url !!}&OCP_B_{!! $loop->index !!}=8080
                                            {{-- @else --}}
                                                {{-- &OCLOUD_B_{!! $loop->index !!}=&OCP_B_{!! $loop->index !!}= --}}
                                            @endif
                                            <br>

                                        @endforeach
                                    {{-- @endforeach --}}
                                    @endif

                                    @foreach (range($csos->count(), 19) as $index2)
                                     OCLOUD_A_{!! $index2 !!}=&OCP_A_{!! $index2 !!}=&OCLOUD_B_{!! $index2 !!}=&OCP_B_{!! $index2 !!}= <br>
                                    @endforeach

                                    @php
                                    $str = $channel_server->cs_name;

                                    if( strlen( $str ) < 40) {
                                        $str = explode( "\n", wordwrap( $str, 30));
                                        $str = $str[0] . '!';
                                    }

                                    @endphp

                                    <br style="clear:both" />
                                    [LICENSE]<br>
                                    LIC=ChannelServer-AA.1.0-20991231-{{ date('Ymd', strtotime($channel_server->created_at)) }}-DISHCS!{!! strtoupper(str_pad($str, 40, "0")) !!}<br>

                                    <br style="clear:both" />
                                    [PARAMETERS]<br>
                                </div>

                            </div>
                            <div style="clear:both"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
