
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('imc', trans('global.syncservers.fields.imc').'', ['class' => 'control-label']) !!}
                    {!! Form::text('imc', old('imc'), ['class' => 'form-control', 'placeholder' => '239.0.0.3']) !!}
                    <p class="help-block">239.0.0.3</p>
                    @if($errors->has('imc'))
                        <p class="help-block">
                            {{ $errors->first('imc') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ip', trans('global.syncservers.fields.ip').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ip', old('ip'), ['class' => 'form-control', 'placeholder' => '20003']) !!}
                    <p class="help-block">20003</p>
                    @if($errors->has('ip'))
                        <p class="help-block">
                            {{ $errors->first('ip') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('itcpport', trans('global.syncservers.fields.itcpport').'', ['class' => 'control-label']) !!}
                    {!! Form::text('itcpport', old('itcpport'), ['class' => 'form-control', 'placeholder' => '8080']) !!}
                    <p class="help-block">8080</p>
                    @if($errors->has('itcpport'))
                        <p class="help-block">
                            {{ $errors->first('itcpport') }}
                        </p>
                    @endif
                </div>
            </div>





            <div class="row">
                <div class="col-xs-2">

                    {!! Form::hidden('mobile', 0) !!}
                    {!! Form::checkbox('mobile', 1, old('mobile', false), []) !!}
                    {!! Form::label('mobile', trans('global.syncservers.fields.mobile').'', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('mobile'))
                        <p class="help-block">
                            {{ $errors->first('mobile') }}
                        </p>
                    @endif
                </div>

                <div class="col-xs-2">

                    {!! Form::hidden('clips', 0) !!}
                    {!! Form::checkbox('clips', 1, old('clips', true), []) !!}
                    {!! Form::label('clips', trans('global.syncservers.fields.clips').'', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('clips'))
                        <p class="help-block">
                            {{ $errors->first('clips') }}
                        </p>
                    @endif
                </div>

                <div class="col-xs-2">

                    {!! Form::hidden('rtclips', 0) !!}
                    {!! Form::checkbox('rtclips', 1, old('rtclips', false), []) !!}
                     {!! Form::label('rtclips', trans('global.syncservers.fields.rtclips').'', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('rtclips'))
                        <p class="help-block">
                            {{ $errors->first('rtclips') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-2">
                    {!! Form::hidden('p1_match', 0) !!}
                    {!! Form::checkbox('p1_match', 1, old('p1_match', false), []) !!}
                    {!! Form::label('p1_match', trans('global.syncservers.fields.p1-match').'', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('p1_match'))
                        <p class="help-block">
                            {{ $errors->first('p1_match') }}
                        </p>
                    @endif
                </div>

                <div class="col-xs-2">
                    {!! Form::hidden('doublef0_match', 0) !!}
                    {!! Form::checkbox('doublef0_match', 1, old('doublef0_match', true), []) !!}
                    {!! Form::label('doublef0_match', trans('global.syncservers.fields.doublef0-match').'', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('doublef0_match'))
                        <p class="help-block">
                            {{ $errors->first('doublef0_match') }}
                        </p>
                    @endif
                </div>

                <div class="col-xs-2">
                    {!! Form::hidden('full_match', 0) !!}
                    {!! Form::checkbox('full_match', 1, old('full_match', true), []) !!}
                    {!! Form::label('full_match', trans('global.syncservers.fields.full-match').'', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('full_match'))
                        <p class="help-block">
                            {{ $errors->first('full_match') }}
                        </p>
                    @endif
                </div>

                <div class="col-xs-3">
                    {!! Form::hidden('do_notify_url', 0) !!}
                    {!! Form::checkbox('do_notify_url', 1, old('do_notify_url', false), []) !!}
                    {!! Form::label('do_notify_url', trans('global.syncservers.fields.do-notify-url').'', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('do_notify_url'))
                        <p class="help-block">
                            {{ $errors->first('do_notify_url') }}
                        </p>
                    @endif
                </div>

                <div class="col-xs-3">
                    {!! Form::hidden('record', 0) !!}
                    {!! Form::checkbox('record', 1, old('record', true), []) !!}
                    {!! Form::label('record', trans('global.syncservers.fields.record').'', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('record'))
                        <p class="help-block">
                            {{ $errors->first('record') }}
                        </p>
                    @endif
                </div>
            </div>






                <div class="col-xs-12 form-group">
                    {!! Form::label('clip_refresh_secs', trans('global.syncservers.fields.clip-refresh-secs').'', ['class' => 'control-label']) !!}
                    {!! Form::text('clip_refresh_secs', old('clip_refresh_secs'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('clip_refresh_secs'))
                        <p class="help-block">
                            {{ $errors->first('clip_refresh_secs') }}
                        </p>
                    @endif
                </div>


                <div class="col-xs-12 form-group">
                    {!! Form::label('threshold_nr_p1_matches_times_hundred', trans('global.syncservers.fields.threshold-nr-p1-matches-times-hundred').'', ['class' => 'control-label']) !!}
                    {!! Form::text('threshold_nr_p1_matches_times_hundred', old('threshold_nr_p1_matches_times_hundred'), ['class' => 'form-control', 'placeholder' => '60']) !!}
                    <p class="help-block">60</p>
                    @if($errors->has('threshold_nr_p1_matches_times_hundred'))
                        <p class="help-block">
                            {{ $errors->first('threshold_nr_p1_matches_times_hundred') }}
                        </p>
                    @endif
                </div>


                <div class="col-xs-12 form-group">
                    {!! Form::label('threshold_nr_doublef0_matches_times_hundred', trans('global.syncservers.fields.threshold-nr-doublef0-matches-times-hundred').'', ['class' => 'control-label']) !!}
                    {!! Form::text('threshold_nr_doublef0_matches_times_hundred', old('threshold_nr_doublef0_matches_times_hundred'), ['class' => 'form-control', 'placeholder' => '60']) !!}
                    <p class="help-block">60</p>
                    @if($errors->has('threshold_nr_doublef0_matches_times_hundred'))
                        <p class="help-block">
                            {{ $errors->first('threshold_nr_doublef0_matches_times_hundred') }}
                        </p>
                    @endif
                </div>


                <div class="col-xs-12 form-group">
                    {!! Form::label('threshold_nr_3smatches_times_hundred', trans('global.syncservers.fields.threshold-nr-3smatches-times-hundred').'', ['class' => 'control-label']) !!}
                    {!! Form::text('threshold_nr_3smatches_times_hundred', old('threshold_nr_3smatches_times_hundred'), ['class' => 'form-control', 'placeholder' => '70']) !!}
                    <p class="help-block">70</p>
                    @if($errors->has('threshold_nr_3smatches_times_hundred'))
                        <p class="help-block">
                            {{ $errors->first('threshold_nr_3smatches_times_hundred') }}
                        </p>
                    @endif
                </div>


                <div class="col-xs-12 form-group">
                    {!! Form::label('threshold_nr_matches_times_hundred', trans('global.syncservers.fields.threshold-nr-matches-times-hundred').'', ['class' => 'control-label']) !!}
                    {!! Form::text('threshold_nr_matches_times_hundred', old('threshold_nr_matches_times_hundred'), ['class' => 'form-control', 'placeholder' => '60']) !!}
                    <p class="help-block">60</p>
                    @if($errors->has('threshold_nr_matches_times_hundred'))
                        <p class="help-block">
                            {{ $errors->first('threshold_nr_matches_times_hundred') }}
                        </p>
                    @endif
                </div>


                <div class="col-xs-12 form-group">
                    {!! Form::label('clip_len_notify_secs', trans('global.syncservers.fields.clip-len-notify-secs').'', ['class' => 'control-label']) !!}
                    {!! Form::text('clip_len_notify_secs', old('clip_len_notify_secs'), ['class' => 'form-control', 'placeholder' => '3']) !!}
                    <p class="help-block">3</p>
                    @if($errors->has('clip_len_notify_secs'))
                        <p class="help-block">
                            {{ $errors->first('clip_len_notify_secs') }}
                        </p>
                    @endif
                </div>

                <div class="col-xs-12 form-group">
                    {!! Form::label('clip_notifyurl_script', trans('global.syncservers.fields.clip-notifyurl-script').'', ['class' => 'control-label']) !!}
                    {!! Form::text('clip_notifyurl_script', old('clip_notifyurl_script'), ['class' => 'form-control', 'placeholder' => '/var/www/ftp/sh/notifyurl.sh']) !!}
                    <p class="help-block">/var/www/ftp/sh/notifyurl.sh</p>
                    @if($errors->has('clip_notifyurl_script'))
                        <p class="help-block">
                            {{ $errors->first('clip_notifyurl_script') }}
                        </p>
                    @endif
                </div>


                <div class="col-xs-12 form-group">
                    {!! Form::label('clip_dir', trans('global.syncservers.fields.clip-dir').'', ['class' => 'control-label']) !!}
                    {!! Form::text('clip_dir', old('clip_dir'), ['class' => 'form-control', 'placeholder' => '/var/www/ftp/downloads']) !!}
                    <p class="help-block">/var/www/ftp/downloads</p>
                    @if($errors->has('clip_dir'))
                        <p class="help-block">
                            {{ $errors->first('clip_dir') }}
                        </p>
                    @endif
                </div>


                <div class="col-xs-12 form-group">
                    {!! Form::label('license', trans('global.syncservers.fields.license').'', ['class' => 'control-label']) !!}
                    {!! Form::text('license', old('license'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('license'))
                        <p class="help-block">
                            {{ $errors->first('license') }}
                        </p>
                    @endif
                </div>

