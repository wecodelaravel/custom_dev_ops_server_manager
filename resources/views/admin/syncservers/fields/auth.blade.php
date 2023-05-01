                            <div class="col-xs-12 form-group">
                                {!! Form::label('username', trans('global.syncservers.fields.username').'', ['class' => 'control-label']) !!}
                                {!! Form::text('username', old('username'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('username'))
                                <p class="help-block">
                                    {{ $errors->first('username') }}
                                </p>
                                @endif
                            </div>

                            <div class="col-xs-12 form-group">
                                {!! Form::label('password', trans('global.syncservers.fields.password').'', ['class' => 'control-label']) !!}
                                {!! Form::text('password',  old('password'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('password'))
                                <p class="help-block">
                                    {{ $errors->first('password') }}
                                </p>
                                @endif
                            </div>
