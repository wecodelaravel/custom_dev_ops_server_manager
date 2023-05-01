

    <div class="colxs-12 col-sm-12 col-md-12 col-lg-12 ">
        <div class="box box-default">
            <div class="box-header with-border">
                <i class="fa fa-warning"></i>

                <h3 class="box-title">Setup Checklist</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                @foreach($hosts as $host)
                <div class="colxs-12 col-sm-12 col-md-12 col-lg-12 hosts-status-section">
                    <div class="box box-default collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title"><a target="_blank" href="{{ route('admin.hosts.show',[$host->id]) }}">{{ $host->host }}</a></h3>
                            &nbsp; &nbsp; &nbsp; &nbsp;
                            {!! ($host->server_exists) ? '<i class="fa fa-check-circle-o fa-2x text-success" style="color:green"></i>' : '<i class="fa fa-times-circle fa-2x text-danger" style="color:red"></i>' !!}
                            {!! ($host->caipy_is_setup) ? '<i class="fa fa-check-circle-o fa-2x text-success" style="color:green"></i>' : '<i class="fa fa-times-circle fa-2x text-danger" style="color:red"></i>' !!}
                            {!! ($host->ready_to_receive_conf) ? '<i class="fa fa-check-circle-o fa-2x text-success" style="color:green"></i>' : '<i class="fa fa-times-circle fa-2x text-danger" style="color:red"></i>' !!}
                            {!! ($host->configured) ? '<i class="fa fa-check-circle-o fa-2x text-success" style="color:green"></i>' : '<i class="fa fa-times-circle fa-2x text-danger" style="color:red"></i>' !!}
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool btn-default" data-widget="collapse">
                                {{ @$host->status->status }} &nbsp; <i class="fa fa-plus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="box-footer no-padding">

                                <ul class="nav nav-stacked">
                                    <li><a href="#">Server Exists: <span class="pull-right status-icon">{!! ($host->server_exists) ? '<i class="fa fa-check-circle-o fa-2x text-success" style="color:green"></i>' : '<i class="fa fa-times-circle fa-2x text-danger" style="color:red"></i>'  !!}</span></a></li>
                                    <li><a href="#">Caipy is Setup: <span class="pull-right status-icon">{!! ($host->caipy_is_setup) ? '<i class="fa fa-check-circle-o fa-2x text-success" style="color:green"></i>' : '<i class="fa fa-times-circle fa-2x text-danger" style="color:red"></i>' !!}</span></a></li>
                                    <li><a href="#">Ready for Conf: <span class="pull-right status-icon">{!! ($host->ready_to_receive_conf) ? '<i class="fa fa-check-circle-o fa-2x text-success" style="color:green"></i>' : '<i class="fa fa-times-circle fa-2x text-danger" style="color:red"></i>' !!}</span></a></li>
                                    <li><a href="#">Configured & Ready: <span class="pull-right status-icon">{!! ($host->configured) ? '<i class="fa fa-check-circle-o fa-2x text-success" style="color:green"></i>' : '<i class="fa fa-times-circle fa-2x text-danger" style="color:red"></i>' !!}</span></a></li>
                                    <li><a href="#">Status:  <span class="pull-right">{{ @$host->status->status }} {{ $status->host->host ?? '' }}</span></a></li>
                                    @if($host->rc_id == '3')
                                    <li>data: | {{ @$cs_confs }}</li>
                                    @elseif($host->rc_id == '2')
                                    <li>data: | {{ @$as_confs }}</li>
                                    @elseif($host->rc_id == '1')
                                    <li>data: | {{ @$ss_confs }}</li>
                                    @endif
                                    <li>
                                        {{-- {{ $host->host }} --}}
                                        {{--<a href="#">Send Conf's If Ready: <span class="pull-right"><button type="button" class="btn btn-default" data-id="" data-toggle="modal" data-target="#modal-cs">Post Conf's</button></span> </a>--}}
                                        @if($host->rc_id == '3')
                                        {!! Form::open(['route' => 'cs_configs', 'host' => $host->host]) !!}
                                            {{ Form::hidden('cs_confs', @$cs_confs) }}
                                            {{ Form::hidden('host', @$host->host) }}
                                            @if($host->server_exists && $host->caipy_is_setup && $host->ready_to_receive_conf)
                                            {!! Form::submit('Post Confs to CS', ['class' => 'form-control btn btn-success']) !!}
                                            @else
                                            {!! Form::submit('Post Confs to CS', ['class' => 'form-control btn btn-danger', 'disabled' => 'disabled']) !!}
                                            @endif
                                        {!! Form::close() !!}
                                        @endif

                                        @if($host->rc_id == '1')
                                        {!! Form::open(['route' => 'ss_configs', 'host' => $host->host]) !!}
                                            {{ Form::hidden('ss_confs', @$ss_confs) }}
                                            {{ Form::hidden('host', @$host->host) }}
                                            @if($host->server_exists && $host->caipy_is_setup && $host->ready_to_receive_conf)
                                            {!! Form::submit('Post Confs to SS', ['class' => 'form-control btn btn-success']) !!}
                                            @else
                                            {!! Form::submit('Post Confs to SS', ['class' => 'form-control btn btn-danger', 'disabled' => 'disabled']) !!}
                                            @endif
                                        {!! Form::close() !!}
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                @endforeach

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
