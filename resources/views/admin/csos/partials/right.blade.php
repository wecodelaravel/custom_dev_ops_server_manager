            <div class="[ col-xs-12 col-sm-6 ]">
                <p>Turn on the configuration you want to use for this channel output.</p>
                <div class="[ form-group ]">
                    {!! Form::checkbox('use_channel_server_localhost', 1, old('use_channel_server_localhost', old('use_channel_server_localhost')), ['id' => 'use_channel_server_localhost', 'autocomplete' =>'off']) !!}
                    <div class="[ btn-group ]">
                        <label for="use_channel_server_localhost" class="[ btn btn-primary ]">
                            <span class="[ glyphicon glyphicon-ok ]"></span>
                            <span> </span>
                        </label>
                        {!! Form::label('use_channel_server_localhost', trans('global.cso.fields.use-channel-server-localhost').'', ['class' => '[ btn btn-default active ]']) !!}
                    </div>
                    <p class="help-block"></p>
                    @if($errors->has('use_channel_server_localhost'))
                        <p class="help-block">
                            {{ $errors->first('use_channel_server_localhost') }}
                        </p>
                    @endif
                </div>

                <div class="[ form-group ]">
                    {!! Form::checkbox('use_sync_server_for_a', 1, old('use_sync_server_for_a', old('use_sync_server_for_a')), ['id' => 'use_sync_server_for_a', 'autocomplete' =>'off']) !!}
                    <div class="[ btn-group ]">
                        <label for="use_sync_server_for_a" class="[ btn btn-primary ]">
                            <span class="[ glyphicon glyphicon-ok ]"></span>
                            <span> </span>
                        </label>
                        {!! Form::label('use_sync_server_for_a', trans('global.cso.fields.use-sync-server-for-a').'', ['class' => '[ btn btn-default active ]']) !!}
                    </div>
                    <p class="help-block"></p>
                    @if($errors->has('use_sync_server_for_a'))
                        <p class="help-block">
                            {{ $errors->first('use_sync_server_for_a') }}
                        </p>
                    @endif
                </div>
                <div class="[ form-group ]">
                    {!! Form::checkbox('use_sync_server_for_b', 1, old('use_sync_server_for_b', old('use_sync_server_for_b')), ['id' => 'use_sync_server_for_b', 'autocomplete' =>'off']) !!}
                    <div class="[ btn-group ]">
                        <label for="use_sync_server_for_b" class="[ btn btn-primary ]">
                            <span class="[ glyphicon glyphicon-ok ]"></span>
                            <span> </span>
                        </label>
                         {!! Form::label('use_sync_server_for_b', trans('global.cso.fields.use-sync-server-for-b').'', ['class' => '[ btn btn-default active ]']) !!}
                    </div>
                    <p class="help-block"></p>
                    @if($errors->has('use_sync_server_for_b'))
                        <p class="help-block">
                            {{ $errors->first('use_sync_server_for_b') }}
                        </p>
                    @endif
                </div>

                <div class="[ form-group ]">
                    {!! Form::checkbox('use_as_for_a', 1, old('use_as_for_a', old('use_as_for_a')), ['id' => 'use_as_for_a', 'autocomplete' =>'off']) !!}
                    <div class="[ btn-group ]">
                        <label for="use_as_for_a" class="[ btn btn-primary ]">
                            <span class="[ glyphicon glyphicon-ok ]"></span>
                            <span> </span>
                        </label>
                        {!! Form::label('use_as_for_a', trans('global.cso.fields.use-as-for-a').'', ['class' => '[ btn btn-default active ]']) !!}
                    </div>
                    <p class="help-block"></p>
                    @if($errors->has('use_as_for_a'))
                        <p class="help-block">
                            {{ $errors->first('use_as_for_a') }}
                        </p>
                    @endif
                </div>


                <div class="[ form-group ]">
                    {!! Form::checkbox('use_as_for_b', 1, old('use_as_for_b', old('use_as_for_b')), ['id' => 'use_as_for_b', 'autocomplete' =>'off']) !!}
                    <div class="[ btn-group ]">
                        <label for="use_as_for_b" class="[ btn btn-primary ]">
                            <span class="[ glyphicon glyphicon-ok ]"></span>
                            <span> </span>
                        </label>
                        {!! Form::label('use_as_for_b', trans('global.cso.fields.use-as-for-b').'', ['class' => '[ btn btn-default active ]']) !!}
                    </div>
                    <p class="help-block"></p>
                    @if($errors->has('use_as_for_b'))
                        <p class="help-block">
                            {{ $errors->first('use_as_for_b') }}
                        </p>
                    @endif
                </div>


                <div class="[ form-group ]">
                    {!! Form::checkbox('use_custom_a', 1, old('use_custom_a', old('use_custom_a')), ['id' => 'use_custom_a', 'autocomplete' =>'off']) !!}
                    <div class="[ btn-group ]">
                        <label for="use_custom_a" class="[ btn btn-primary ]">
                            <span class="[ glyphicon glyphicon-ok ]"></span>
                            <span> </span>
                        </label>
                        {!! Form::label('use_custom_a', trans('global.cso.fields.use-custom-a').'', ['class' => '[ btn btn-default active ]']) !!}
                    </div>
                    <p class="help-block"></p>
                    @if($errors->has('use_custom_a'))
                        <p class="help-block">
                            {{ $errors->first('use_custom_a') }}
                        </p>
                    @endif
                </div>

                <div class="[ form-group ]">
                    {!! Form::checkbox('use_custom_for_b', 1, old('use_custom_for_b', old('use_custom_for_b')), ['id' => 'use_custom_for_b', 'autocomplete' =>'off']) !!}
                    <div class="[ btn-group ]">
                        <label for="use_custom_for_b" class="[ btn btn-primary ]">
                            <span class="[ glyphicon glyphicon-ok ]"></span>
                            <span> </span>
                        </label>
                        {!! Form::label('use_custom_for_b', trans('global.cso.fields.use-custom-for-b').'', ['class' => '[ btn btn-default active ]']) !!}
                    </div>
                    <p class="help-block"></p>
                    @if($errors->has('use_custom_for_b'))
                        <p class="help-block">
                            {{ $errors->first('use_custom_for_b') }}
                        </p>
                    @endif
                </div>
            </div>
