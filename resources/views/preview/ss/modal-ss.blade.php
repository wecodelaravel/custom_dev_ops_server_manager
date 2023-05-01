
  <div class="modal fade" id="modal-ss">
        <div class="modal-dialog" style="width:60%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">SyncServer.conf Preview</h4>
                </div>
                <div class="modal-body">
                    <div class="well">
                            [INPUTMC] <br>
                            IMC0=&IP0= <br>
                            [INPUTTCP] <br>
                            [CS_ID] <br>
                            @foreach ($channelservers as $cs)
                                @php
                                    $sscs_count = 1;
                                    $str =  $cs->cs_host;
                                    if( strlen( $str ) < 40) {
                                        $str = explode( "\n", wordwrap( $str, 30));
                                        $str = $str[0] . '!';
                                    }

                                    echo "<strong>CSID". $sscs_count ."=DISHCS!" . strtoupper(str_pad($str, 40, "0")). "</strong><br>";
                                    $sscs_count++;
                                @endphp
                            @endforeach
                            [LICENSE] <br>
                            <strong>{{ $syncserver->license }}</strong> <br>
                            [PARAMETERS]
                            MOBILE=0 <br>
                            CLIPS=<strong>{{ $syncserver->clips }}</strong> <br>
                            RTCLIPS=<strong>{{ $syncserver->rtclips }}</strong> <br>
                            P1_MATCH=<strong>{{ $syncserver->p1_match }}</strong> <br>
                            doubleF0_MATCH=<strong>{{ $syncserver->doublef0_match }}</strong> <br>
                            FULL_MATCH=<strong>{{ $syncserver->full_match }}</strong> <br>
                            DO_NOTIFY_URL=<strong>{{ $syncserver->do_notify_url }}</strong> <br>
                            RECORD=1 <br>
                            CLIP_REFRESH_SECS=20 <br>
                            THRESHOLD_NR_P1_MATCHES_TIMES_HUNDRED=60 <br>
                            THRESHOLD_NR_doubleF0_MATCHES_TIMES_HUNDRED=60 <br>
                            THRESHOLD_NR_3SMATCHES_TIMES_HUNDRED=70 <br>
                            THRESHOLD_NR_MATCHES_TIMES_HUNDRED=60 <br>
                            CLIP_LEN_NOTIFY_SECS=3 <br>
                            CLIP_NOTIFYURL_SCRIPT=/var/www/ftp/sh/notifyurl.sh <br>
                            CLIP_DIR=/var/www/ftp/downloads <br>
                    </div>
                    <div style="clear:both"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
