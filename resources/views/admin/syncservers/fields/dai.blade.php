
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('dai_ads_length', trans('global.syncservers.fields.dai-ads-length').'', ['class' => 'control-label']) !!}
                    {!! Form::text('dai_ads_length', old('dai_ads_length'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dai_ads_length'))
                        <p class="help-block">
                            {{ $errors->first('dai_ads_length') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('dai_notifications', trans('global.syncservers.fields.dai-notifications').'', ['class' => 'control-label']) !!}
                    {!! Form::text('dai_notifications', old('dai_notifications'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dai_notifications'))
                        <p class="help-block">
                            {{ $errors->first('dai_notifications') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('dai_ad_lengths_per_channel', trans('global.syncservers.fields.dai-ad-lengths-per-channel').'', ['class' => 'control-label']) !!}
                    {!! Form::text('dai_ad_lengths_per_channel', old('dai_ad_lengths_per_channel'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dai_ad_lengths_per_channel'))
                        <p class="help-block">
                            {{ $errors->first('dai_ad_lengths_per_channel') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('dai_offsets_per_channel', trans('global.syncservers.fields.dai-offsets-per-channel').'', ['class' => 'control-label']) !!}
                    {!! Form::text('dai_offsets_per_channel', old('dai_offsets_per_channel'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dai_offsets_per_channel'))
                        <p class="help-block">
                            {{ $errors->first('dai_offsets_per_channel') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('dai_min_per_hour_per_channel', trans('global.syncservers.fields.dai-min-per-hour-per-channel').'', ['class' => 'control-label']) !!}
                    {!! Form::text('dai_min_per_hour_per_channel', old('dai_min_per_hour_per_channel'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dai_min_per_hour_per_channel'))
                        <p class="help-block">
                            {{ $errors->first('dai_min_per_hour_per_channel') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('dai_notify_gapper_channel', trans('global.syncservers.fields.dai-notify-gapper-channel').'', ['class' => 'control-label']) !!}
                    {!! Form::text('dai_notify_gapper_channel', old('dai_notify_gapper_channel'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dai_notify_gapper_channel'))
                        <p class="help-block">
                            {{ $errors->first('dai_notify_gapper_channel') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('dai_ad_spacings_per_channel', trans('global.syncservers.fields.dai-ad-spacings-per-channel').'', ['class' => 'control-label']) !!}
                    {!! Form::text('dai_ad_spacings_per_channel', old('dai_ad_spacings_per_channel'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dai_ad_spacings_per_channel'))
                        <p class="help-block">
                            {{ $errors->first('dai_ad_spacings_per_channel') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('dai_is_netlen_per_channel', trans('global.syncservers.fields.dai-is-netlen-per-channel').'', ['class' => 'control-label']) !!}
                    {!! Form::text('dai_is_netlen_per_channel', old('dai_is_netlen_per_channel'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dai_is_netlen_per_channel'))
                        <p class="help-block">
                            {{ $errors->first('dai_is_netlen_per_channel') }}
                        </p>
                    @endif
                </div>
            </div>
