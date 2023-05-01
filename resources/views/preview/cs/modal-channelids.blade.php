        <div class="modal fade" id="modal-channelids">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">ChannelIDs Preview</h4>
                        </div>
                        <div class="modal-body">
                            <div id="conf-preview" style="font-family: 'Helvetica Neue'!important; font-size: 1.5!important;font-weight:bold!important;">
                                @if(count($csis) > 0)
                                <div class="well">
                                    @foreach ($csis as $csi)
                                    {{ $csi->channel->source_name ?? '' }}, {{ $csi->channel->env ?? '' }} <br>
                                    @endforeach
                                </div>
                                @endif
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
