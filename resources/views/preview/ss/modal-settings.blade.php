    <div class="modal fade" id="ss-modal-settings">
        <div class="modal-dialog" style="width:60%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">settings.conf Preview</h4>
                </div>
                <div class="modal-body">
                    {{-- <div id="conf-preview" style="font-family: 'Helvetica Neue'!important; font-size: 1.5!important;font-weight:bold!important;"> --}}
                        <div class="well">
                            [CONFIGURATION]<br>
                            ftpserver=NOT_USED<br>
                            ftpdirectory=NOT_USED<br>
                            ftpusername=NOT_USED<br>
                            ftppassword=NOT_USED<br>
                            grabtime=<br>
                            reporttime=<strong>{{ @$syncserver->report_time }}</strong> <br>
                            reportemail=<strong>{{ @$syncserver->report_email }}</strong> <br>
                            notifyurl=<strong>{{ @$syncserver->real_time_notification_url }}</strong> <br>
                            httpdownloadfolder=<strong>{{ @$syncserver->report_email }}</strong> <br>
                            tocaiserver=<strong>{{ @$syncserver->transcoding_server }}</strong> <br>
                            max_days_channel_history=<strong>{{ @$syncserver->max_days_channel_history }}</strong> <br>
                            <br>
                            [DISCOVERY]<br>
                            basic_discovery_enabled=<strong>{{ @$syncserver->basic_discovery_enabled }}</strong> <br>
                            continuous_discovery_enabled=<strong>{{ @$syncserver->continuous_discovery_enabled }}</strong> <br>
                            <br>
                            [AUTHENTIFICATION]<br>
                            username=<strong>{{ @$syncserver->username }}</strong> <br>
                            password=<strong>{{ @$syncserver->password }}</strong> <br>
                            <br>
                            [REPORT]<br>
                            millisecsprecision=<strong> {{ (@$syncserver->millisecond_precision ? 'true' : 'false')  }}</strong> <br>
                            buttonchannel=<strong> {{ (@$syncserver->show_channel_button ? 'true' : 'false')  }}</strong> <br>
                            buttonclip=<strong> {{ (@$syncserver->show_clip_button ? 'true' : 'false')  }}</strong> <br>
                            buttonlive=<strong> {{ (@$syncserver->show_live_button ? 'true' : 'false')  }}</strong> <br>
                            buttongroup=<strong> {{ (@$syncserver->show_group_button ? 'true' : 'false')  }}</strong> <br>
                            evt=<strong> {{ (@$syncserver->enable_evt ? 'true' : 'false')  }}</strong> <br>
                            excel=<strong> {{ (@$syncserver->enable_excel ? 'true' : 'false')  }}</strong> <br>
                            evttiming=<strong> {{ (@$syncserver->enable_evt_timing ? 'true' : 'false')  }}</strong> <br>
                            timezone=<strong>{{ @$syncserver->timezone->timezone  }}</strong> <br>
                            gap=<strong>{{ @$syncserver->grab_time }}</strong> <br>
                            adsminimumlength=  <br>
                            filterpreset=<strong>{{ @$syncserver->filter_preset_for_uis  }}</strong> <br>
                            <br>
                            [VIDEO]<br>
                            servertype=<strong>{{ @$syncserver->video_server_type }}</strong> <br>
                            serverurl=<strong>{{ @$syncserver->username }}</strong> <br>
                            hlsshift=<strong>{{ @$syncserver->video_hls_shift }}</strong> <br>
                            serverredirect=<strong>{{ @$syncserver->video_server_redirect }}</strong> <br>
                            hlsshiftperchannel=<strong>{{ @$syncserver->hls_shift_per_channel }}</strong> <br>
                            <br>
                            [EPG]<br>
                            country=<strong>{{ @$syncserver->country->title }}</strong> <br>
                            <br>
                            [DAI]<br>
                            servertype=<strong>{{ @$servertype }}</strong> <br>
                            adslength=<strong>{{ @$syncserver->dai_ads_length }}</strong> <br>
                            notifications=<strong>{{ @$syncserver->dai_notifications }}</strong> <br>
                            adlengthsperchannel=<strong>{{ @$syncserver->dai_ad_lengths_per_channel }}</strong> <br>
                            offsetsperchannel=<strong>{{ @$syncserver->dai_offsets_per_channel }}</strong> <br>
                            minperhourperchannel=<strong>{{ @$syncserver->dai_min_per_hour_per_channel }}</strong> <br>
                            notifygapperchannel=<strong>{{ @$syncserver->dai_notify_gapper_channel }}</strong> <br>
                            adspacingsperchannel=<strong>{{ @$syncserver->dai_ad_spacings_per_channel }}</strong> <br>
                            isnetlenperchannel=<strong>{{ @$syncserver->dai_is_netlen_per_channel }}</strong> <br>
                            <br>
                            [ADMIN] <br>
                            username=<strong>{!! @$syncserver->advanced_username !!}</strong> <br>
                            password=<strong>{!! @$syncserver->advanced_password !!}</strong> <br>
                            <br />
                        </div>
                    {{-- </div> --}}
                    <div style="clear:both"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
