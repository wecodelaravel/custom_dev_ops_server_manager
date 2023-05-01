    <div class="modal fade" id="modal-settings">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Settings CONF Preview</h4>
                </div>
                <div class="modal-body">
                    <div id="conf-preview" style="font-family: 'Helvetica Neue'!important; font-size: 1.5!important;font-weight:bold!important;">
                        <div class="well">
                            <br />
                            [AUTHENTIFICATION] <br>
                            username=<strong>{!! $channel_server->username !!}</strong> <br>
                            password=<strong>{!! $channel_server->password !!}</strong> <br>
                            <br />
                        </div>
                    </div>
                    <div style="clear:both"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
