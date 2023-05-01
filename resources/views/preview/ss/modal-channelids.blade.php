        <div class="modal fade" id="modal-sschannelids">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">SS ChannelIDs Preview</h4>
                        </div>
                        <div class="modal-body">

                                @if(count($csis) > 0)
                                <div class="well">
                                    @foreach ($csis as $csi)
                                    <strong>{{ $csi->channel->source_name ?? '' }}</strong>, {{ $csi->channel->env ?? '' }} <br>
                                    @endforeach
                                </div>
                                @endif

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
