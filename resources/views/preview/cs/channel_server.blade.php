@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">Channel Server Data Preview</h3>
    <p>
        <ul class="list-inline">
            <li>Channel Server</li> |
            <li>Configuration File</li>
        </ul>
    </p>

    <div class="panel panel-default">

        <div id="conf-preview" style="margin-left:20px;font-size: 1.5em;">
            [INPUT]<br>
            @if (count($channel_server->csis) > 0)
                @foreach ($channel_server->csis as $csi)
                    @if($csi->protocol->protocol == 'UDP')
                    CID{!! $loop->index !!}=<strong>{!! @$csi->channel->id !!}</strong>
                        &
                        PROTOCOL{!! $loop->index !!}=<strong>{{ @$csi->protocol->protocol }}</strong>
                        &
                        URL{!! $loop->index !!}=<strong>{!! @$csi->url !!}</strong>
                        <br>
                    @elseif($csi->protocol->protocol == 'MOVE')
                    CID{!! $loop->index !!}=<strong>{!! @$csi->channel->id !!}</strong>
                        &
                        PROTOCOL{!! $loop->index !!}=<strong>{{ @$csi->protocol->protocol }}</strong>
                        &
                        URL{!! $loop->index !!}=<strong>{!! @$csi->move_path !!}</strong>
                        <br>
                    {{-- @else --}}
              {{--       CID{!! $loop->index !!}=<strong>{!! @$csi->channel->id !!}</strong>
                    &
                    PROTOCOL{!! $loop->index !!}=<strong>{{ @$csi->protocol->protocol }}</strong>
                    &
                    SSM{!! $loop->index !!}=<strong>{!! @$csi->channel->ssm !!}</strong>
                    &
                    IMC{!! $loop->index !!}=<strong>{!! @$csi->channel->imc !!}</strong>
                    &
                    IP{!! $loop->index !!}=<strong>{!! @$csi->channel->ip !!}</strong>
                    &
                    PID{!! $loop->index !!}=<strong>{!! @$csi->channel->pid !!}</strong>
                    <br> --}}
                    @endif
                @endforeach

                @foreach (range($channel_server->csis->count(), 19) as $index)
                    CID{!! $index !!}=&PROTOCOL{!! $index !!}=&SSM{!! $index !!}=&IMC{!! $index !!}=&IP{!! $index !!}=&PID{!! $index !!}=<br>
                @endforeach
            @endif
            <br>
            [OUTPUT {{ count($csos) }}]<br>
            OMC1=<strong>{!! @$channel_server->local_output !!}</strong>&OP1=<strong>{!! @$channel_server->local_output_port !!}</strong> <br>
            OCLOUD1=<strong>{!! @$channel_server->default_cloud_a_address !!}</strong>&OCP1=<strong>{!! @$channel_server->default_cloud_a_port !!}</strong> <br>
            OCLOUD2=<strong>{!! @$channel_server->default_cloud_b_address !!}</strong>&OCP2=<strong>{!! @$channel_server->default_cloud_b_port !!}</strong> <br>

            @if(count($csos) > 0)
                @foreach ($csos as $cso)
                    @if($cso->use_custom_a)
                        OCLOUD_A_{!! $loop->index !!}=<strong>{{ @$cso->ocloud_a }}</strong>&OCP_A_{!! $loop->index !!}={!! @$cso->ocp_a !!}
                    @elseif($cso->use_sync_server_for_a)
                        OCLOUD_A_{!! $loop->index !!}=<strong>{{ @$cso->select_sync_server_for_a->ss_host_url }}</strong>&OCP_A_{!! $loop->index !!}=8080
                    @elseif($cso->use_as_for_a)
                        OCLOUD_A_{!! $loop->index !!}=<strong>{{ @$cso->select_aggregation_server_for_a->as_host_url }}</strong>&OCP_A_{!! $loop->index !!}=8080
                    @endif
                    @if($cso->use_custom_b)
                        &OCLOUD_B_{!! $loop->index !!}=<strong>{{ @$cso->ocloud_b }}</strong>&OCP_B_{!! $loop->index !!}={!! @$cso->ocp_b !!} <br>
                    @elseif($cso->use_sync_server_for_b)
                        &OCLOUD_B_{!! $loop->index !!}=<strong>{{ @$cso->select_sync_server_for_b->ss_host_url }}</strong>&OCP_B_{!! $loop->index !!}=8080 <br>
                    @elseif($cso->use_as_for_b)
                        &OCLOUD_B_{!! $loop->index !!}=<strong>{{ @$cso->select_aggregation_server_for_b->as_host_url }}</strong>&OCP_B_{!! $loop->index !!}=8080 <br>
                    @endif
                @endforeach
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
            WAVINPUT=0<br>

        </div>
        <br style="clear:both" />
        <br />
        <br />

    </div>
@stop

@section('javascript')

@endsection

@push('pagestyle')
<style>
#conf-preview {
    font-family: "Segoe UI", Roboto,
        "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji",
        "Segoe UI Emoji", "Segoe UI Symbol";
  }
</style>
@endpush
