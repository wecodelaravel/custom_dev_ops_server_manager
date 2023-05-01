@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.instance.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.instances.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>

        <div class="panel-body">

            <div class="row">
                <div class="col-md-9">
                        <div class="row">

                            <div class="col-xs-12 col-md-4 form-group">
                                {!! Form::label('group_id', trans('global.instance.fields.group').'', ['class' => 'control-label']) !!}
                                {!! Form::select('group_id', $groups, old('group_id'), ['class' => 'form-control select2']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('group_id'))
                                    <p class="help-block">
                                        {{ $errors->first('group_id') }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-xs-12 col-md-4 form-group">
                                {!! Form::label('channel_server_id', trans('global.instance.fields.channel-server').'', ['class' => 'control-label']) !!}
                                {!! Form::select('channel_server_id', $channel_servers, old('channel_server_id'), ['class' => 'form-control select2']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('channel_server_id'))
                                    <p class="help-block">
                                        {{ $errors->first('channel_server_id') }}
                                    </p>
                                @endif
                            </div>

                            <div class="col-xs-12 col-md-4 form-group">
                                {!! Form::label('aggregation_server_id', trans('global.instance.fields.aggregation-server').'', ['class' => 'control-label']) !!}
                                {!! Form::select('aggregation_server_id', $aggregation_servers, old('aggregation_server_id'), ['class' => 'form-control select2']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('aggregation_server_id'))
                                    <p class="help-block">
                                        {{ $errors->first('aggregation_server_id') }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-3 col-md-3 form-group">
                                {!! Form::label('quantity_to_create', trans('global.instance.fields.quantity-to-create').'', ['class' => 'control-label']) !!}
                                {!! Form::text('quantity_to_create', old('quantity_to_create'), ['class' => 'form-control', 'placeholder' => 'how many to create']) !!}
                                <p class="help-block">how many to create</p>
                                @if($errors->has('quantity_to_create'))
                                    <p class="help-block">
                                        {{ $errors->first('quantity_to_create') }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-md-6 form-group">
                                {!! Form::label('role_convention_id', trans('global.instance.fields.role-convention').'', ['class' => 'control-label']) !!}
                                {!! Form::select('role_convention_id', $role_conventions, old('role_convention_id'), ['class' => 'form-control select2']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('role_convention_id'))
                                    <p class="help-block">
                                        {{ $errors->first('role_convention_id') }}
                                    </p>
                                @endif
                            </div>

                            <div class="col-xs-12 col-md-6 form-group">
                                {!! Form::label('env_id', trans('global.instance.fields.env').'', ['class' => 'control-label']) !!}
                                {!! Form::select('env_id', $envs, old('env_id'), ['class' => 'form-control select2']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('env_id'))
                                    <p class="help-block">
                                        {{ $errors->first('env_id') }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 form-group">
                                {!! Form::label('notes', trans('global.instance.fields.notes').'', ['class' => 'control-label']) !!}
                                {!! Form::textarea('notes', old('notes'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('notes'))
                                    <p class="help-block">
                                        {{ $errors->first('notes') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                </div>
                <div class="col-md-3">
                    @include('partials.group-instructions')
                </div>
            </div>

        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop


@section('top-script') @endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            $("select").css("width", "100%");
            // $("select#channelserver").change(function () {
            //     if ( $("select#channelserver :selected").text()  ) {
            //         $("#channel-input").css("display","block");
            //     }
            // });
        });
    </script>
@endsection
