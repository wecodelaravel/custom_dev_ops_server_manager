    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <i class="fa fa-warning"></i>
                <h3 class="box-title">Visual Status</h3>
&nbsp; &nbsp;
                <span class="description">Last Updated: {{ @$group->updated_at->format('m-d-Y') }}</span>

                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                    {{-- <div class="col-md-8"> --}}
                        <div class="mermaid" id="mermaidChart0" style="font-size:2rem!important;">
                            graph LR
                    classDef before fill:#AEB6BF,stroke:#000,stroke-width:2px,padding:5px;
                    classDef serverexists fill:#fff,stroke:#ff0000,stroke-width:3px,padding:5px;
                    classDef hascaipy fill:#fff,stroke:#039BE5,stroke-width:3px,padding:5px;
                    classDef needsconf fill:#fff,stroke:#33CC00,stroke-width:3px,padding:5px;
                    classDef configured fill:#33CC00,stroke:#000,stroke-width:2px,padding:5px;
                    classDef running fill:#33CC00,stroke:#33CC00,stroke-width:2px,padding:5px;
                    classDef notrunning fill:#FFFF00,stroke:#ff0000,stroke-width:2px,padding:5px;
                    classDef stopped fill:#ff0000,stroke:#000,stroke-width:2px,padding:5px;

                            @if(isset($css))
                            @foreach($css as $cs)
                                A("fa:fa-signal Channel Server<br> <br>{{ $cs->host }}")
                                click A "{{ route('admin.channel_servers.edit',[$cs->id]) }}" "{{ $cs->name }}"
                                @if($cs->server_exists && !$cs->caipy_is_setup && !$cs->ready_to_receive_conf && !$cs->configured)
                                class A serverexists
                                @elseif($cs->server_exists && $cs->caipy_is_setup && !$cs->ready_to_receive_conf && !$cs->configured)
                                class A hascaipy
                                @elseif($cs->server_exists && $cs->caipy_is_setup && $cs->ready_to_receive_conf  && !$cs->last_recieved_conf)
                                class A needsconf
                                @elseif($cs->server_exists && $cs->caipy_is_setup && $cs->ready_to_receive_conf  && $cs->configured)
                                    @switch($cs->status->id)
                                        @case(1)
                                            class A running
                                        @break
                                        @case(2)
                                            class A notrunning
                                        @break
                                        @case(3)
                                            class A stopped
                                        @break
                                        @default
                                            default A configured
                                    @endswitch
                                @else
                                    class A before
                                @endif
                            @endforeach
                            @endif

                            @if(isset($ags) && $ags->count()>0)
                            @foreach($ags as $as)
                                B("fa:fa-server Aggregation Server<br> <br>{{ $as->host }}")
                                click B "{{ route('admin.aggregation_servers.edit',[$as->id]) }}" "{{ $as->name }}"
                                @if($as->server_exists && !$as->caipy_is_setup && !$as->ready_to_receive_conf && !$as->configured)
                                class B serverexists
                                @elseif($as->server_exists && $as->caipy_is_setup && !$as->ready_to_receive_conf && !$as->configured)
                                class B hascaipy
                                @elseif($as->server_exists && $as->caipy_is_setup && $as->ready_to_receive_conf  && !$as->configured)
                                class B needsconf
                                @elseif($as->server_exists && $as->caipy_is_setup && $as->ready_to_receive_conf  && $as->configured)
                                    @switch($as->status->id)
                                        @case(1)
                                            class B running
                                        @break
                                        @case(2)
                                            class B notrunning
                                        @break
                                        @case(3)
                                            class B stopped
                                        @break
                                        @default
                                            default B configured
                                    @endswitch
                                @else
                                    class B before
                                @endif

                            @endforeach
                            @endif

                            @foreach($sss as $ss)
                                @php $x++;  @endphp
                                {{-- A-->{{ $x }}[fa:fa-cogs SyncServer <br>{{ $ss->host }}] --}}
                                A-->{{ $x }}[fa:fa-cogs {{ $ss->host }}]
                                click {{ $x }} "{{ route('admin.syncservers.edit',[$ss->id]) }}" "{{ $ss->name }}"
                                @if(isset($ags) && $ags->count()>0)
                                {{ $x }}---B
                                @endif

                                @if($ss->server_exists && !$ss->caipy_is_setup && !$ss->ready_to_receive_conf && !$ss->configured)
                                    class {{ $x }} serverexists
                                @elseif($ss->server_exists && $ss->caipy_is_setup && !$ss->ready_to_receive_conf && !$ss->configured)
                                    class {{ $x }} hascaipy
                                @elseif($ss->server_exists && $ss->caipy_is_setup && $ss->ready_to_receive_conf  && !$ss->configured)
                                    class {{ $x }} needsconf
                                @elseif($ss->server_exists && $ss->caipy_is_setup && $ss->ready_to_receive_conf  && $ss->configured)

                                    @switch($ss->status->id)
                                        @case(1)
                                            class {{ $x }} running
                                        @break

                                        @case(2)
                                            class {{ $x }} notrunning
                                        @break

                                        @case(3)
                                            class {{ $x }} stopped
                                        @break

                                        @default
                                            default {{ $x }} configured
                                    @endswitch
                                @else
                                    class {{ $x }} before
                                @endif

                            @endforeach

                        </div>


                    {{-- </div> --}}
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->


