                           <div class="col-xs-12 form-group">
                                {!! Form::label('video_server_type_id', trans('global.syncservers.fields.video-server-type').'', ['class' => 'control-label']) !!}
                                {!! Form::select('video_server_type_id', $video_server_types, old('video_server_type_id'), ['class' => 'form-control select2']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('video_server_type_id'))
                                <p class="help-block">
                                    {{ $errors->first('video_server_type_id') }}
                                </p>
                                @endif
                            </div>


                <div class="col-xs-12 form-group">
                    {!! Form::label('video_server_url', trans('global.syncservers.fields.video-server-url').'', ['class' => 'control-label']) !!}
                    {!! Form::text('video_server_url', old('video_server_url'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    {{-- <p class="help-block">http://d-gp2-cache0-1.d.movetv.com/clipslist/CHANNELNAME/EPOCHSTART/EPOCHEND/master_3_5_internal.m3u8</p> --}}
                    @if($errors->has('video_server_url'))
                        <p class="help-block">
                            {{ $errors->first('video_server_url') }}
                        </p>
                    @endif
                </div>


                            <div class="col-xs-12 form-group">
                                {!! Form::label('video_server_redirect', trans('global.syncservers.fields.video-server-redirect').'', ['class' => 'control-label']) !!}
                                {!! Form::text('video_server_redirect', old('video_server_redirect'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('video_server_redirect'))
                                <p class="help-block">
                                    {{ $errors->first('video_server_redirect') }}
                                </p>
                                @endif
                            </div>

                            <div class="col-xs-12 form-group">
                                {!! Form::label('video_hls_shift', trans('global.syncservers.fields.video-hls-shift').'', ['class' => 'control-label']) !!}
                                {!! Form::number('video_hls_shift', old('video_hls_shift'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block">Enter the hlsshift (example : +0)</p>
                                @if($errors->has('video_hls_shift'))
                                <p class="help-block">
                                    {{ $errors->first('video_hls_shift') }}
                                </p>
                                @endif
                            </div>

                <div class="col-xs-12 form-group">
                    {!! Form::label('hls_shift_per_channel', trans('global.syncservers.fields.hls-shift-per-channel').'', ['class' => 'control-label']) !!}
                    {!! Form::text('hls_shift_per_channel', old('hls_shift_per_channel'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('hls_shift_per_channel'))
                        <p class="help-block">
                            {{ $errors->first('hls_shift_per_channel') }}
                        </p>
                    @endif
                </div>
