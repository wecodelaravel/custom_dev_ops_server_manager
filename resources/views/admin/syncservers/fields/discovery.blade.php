                            <div class="form-group">
                                {!! Form::hidden('basic_discovery_enabled', 0) !!}
                                {!! Form::checkbox('basic_discovery_enabled', 1, old('basic_discovery_enabled', old('basic_discovery_enabled')), ['class' => 'minimal-red']) !!}
                                &nbsp;
                                 {!! Form::label('basic_discovery_enabled', trans('global.syncservers.fields.basic-discovery-enabled').'', ['class' => 'control-label']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('basic_discovery_enabled'))
                                <p class="help-block">
                                    {{ $errors->first('basic_discovery_enabled') }}
                                </p>
                                @endif
                            </div>

                            <div class="form-group">
                                {!! Form::hidden('continuous_discovery_enabled', 0) !!}
                                {!! Form::checkbox('continuous_discovery_enabled', 1, old('continuous_discovery_enabled', old('continuous_discovery_enabled')), ['class' => 'minimal-red']) !!}
                                &nbsp;
                                {!! Form::label('continuous_discovery_enabled', trans('global.syncservers.fields.continuous-discovery-enabled').'', ['class' => 'control-label']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('continuous_discovery_enabled'))
                                <p class="help-block">
                                    {{ $errors->first('continuous_discovery_enabled') }}
                                </p>
                                @endif
                            </div>
