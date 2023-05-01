                            <div class="col-xs-12 form-group">
                                {!! Form::label('advanced_username', trans('global.syncservers.fields.advanced-username').'', ['class' => 'control-label']) !!}
                                {!! Form::text('advanced_username', old('advanced_username'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('advanced_username'))
                                <p class="help-block">
                                    {{ $errors->first('advanced_username') }}
                                </p>
                                @endif
                            </div>
                            <div class="col-xs-12 form-group">
                                {!! Form::label('advanced_password', trans('global.syncservers.fields.advanced-password').'', ['class' => 'control-label']) !!}
                                {!! Form::text('advanced_password',  old('advanced_password'),['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('advanced_password'))
                                <p class="help-block">
                                    {{ $errors->first('advanced_password') }}
                                </p>
                                @endif
                            </div>
