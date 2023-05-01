                     <div class="col-xs-12 form-group">
                                {!! Form::label('parent_as_id', trans('global.syncservers.fields.parent-as').'', ['class' => 'control-label']) !!}
                                {!! Form::select('parent_as_id', $parent_as, old('parent_as_id'), ['class' => 'form-control select2']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('parent_as_id'))
                                <p class="help-block">
                                    {{ $errors->first('parent_as_id') }}
                                </p>
                                @endif
                            </div>
