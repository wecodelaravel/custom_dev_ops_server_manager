@extends('layouts.app')

@section('page-style')
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/iCheck/all.css') }}">
@endsection

@section('content')
    <h3 class="page-title">@lang('global.syncservers.title')</h3>
    {!! Form::model($syncserver, ['method' => 'PUT', 'route' => ['admin.syncservers.update', $syncserver->id]]) !!}

        <div class="row">
            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">SETTINGS</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                    @include('admin.syncservers.fields.settings')
                    </div>
                    <div class="box-footer">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="box box-primaryy">
                    <div class="box-header with-border">
                        <h3 class="box-title">CONFIGURATION</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                    @include('admin.syncservers.fields.config')
                    </div>
                    <div class="box-footer">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Report</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                    @include('admin.syncservers.fields.report')
                    </div>
                    <div class="box-footer">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Discovery</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                    @include('admin.syncservers.fields.discovery')
                    </div>
                    <div class="box-footer">
                    </div>
                </div>

                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Authentication</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                    @include('admin.syncservers.fields.auth')
                    </div>
                    <div class="box-footer">
                    </div>
                </div>

                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Admin</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                    @include('admin.syncservers.fields.admin')
                    </div>
                    <div class="box-footer">
                    </div>
                </div>

                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">CLIP DB</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                    {{-- @include('admin.syncservers.fields.clip-db') --}}
                    </div>
                    <div class="box-footer">
                    </div>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-md-3">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">VIDEO</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                    @include('admin.syncservers.fields.video')
                    </div>
                    <div class="box-footer">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">AGGREGATION</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                    @include('admin.syncservers.fields.aggregation')
                    </div>
                    <div class="box-footer">
                    </div>
                </div>
            </div>

           <div class="col-md-3">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">DAI</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                    @include('admin.syncservers.fields.dai')
                    </div>
                    <div class="box-footer">
                    </div>
                </div>
           </div>

           <div class="col-md-3"></div>

{{--            <div class="col-md-12">
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
                <div class="col-xs-12 form-group">
                    {!! Form::label('cs_token', trans('global.syncservers.fields.cs-token').'', ['class' => 'control-label']) !!}
                    {!! Form::text('cs_token', old('cs_token'), ['class' => 'form-control', 'placeholder' => 'This needs to match the token from the channel server']) !!}
                    <p class="help-block">This needs to match the token from the channel server</p>
                    @if($errors->has('cs_token'))
                        <p class="help-block">
                            {{ $errors->first('cs_token') }}
                        </p>
                    @endif
                </div>

           </div> --}}


        </div>


	{!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
	{!! Form::close() !!}
@stop

@section('javascript')
@parent

	<script src="{{ asset('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
	<script src="{{ asset('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/iCheck/icheck.min.js') }}"></script>
	<script>
		$(function(){
			moment.updateLocale('{{ App::getLocale() }}', {
				week: { dow: 1 } // Monday is the first day of the week
			});

			$('.timepicker').datetimepicker({
				format: "{{ config('app.time_format_moment') }}",
			});

            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
              checkboxClass: 'icheckbox_minimal-blue',
              radioClass   : 'iradio_minimal-blue'
            });

            //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
              checkboxClass: 'icheckbox_minimal-red',
              radioClass   : 'iradio_minimal-red'
            });

            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
              checkboxClass: 'icheckbox_flat-green',
              radioClass   : 'iradio_flat-green'
            });
		});
	</script>

@stop
