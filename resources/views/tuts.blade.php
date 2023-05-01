@extends('layouts.app')

@section('content')

<div class="row">
            <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Where To Start</div>

                <div class="panel-body table-responsive">


<div class="col-md-6">
    <h3>GROUP BUILDER</h3>
    <video width="800" controls>
      <source src="{{ asset('vid/group-builder.mp4') }}" type="video/mp4">
    </video>
</div>

<div class="col-md-6">
    <h3>GROUP OVERVIEW / STATUS</h3>
    <video width="800" controls>
      <source src="{{ asset('vid/group-overview.mp4') }}" type="video/mp4">
    </video>
</div>

                </div>
            </div>
        </div>


{{-- --------------------------------------------------------- --}}

        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body table-responsive">
                </div>
            </div>
        </div>


{{-- --------------------------------------------------------- --}}


        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Where To Start</div>

                <div class="panel-body table-responsive">


<div class="col-md-6">
    <h3>HOW TO SETUP CHANNEL SERVER</h3>
    <video width="800" controls>
      <source src="{{ asset('vid/setup-channelserver.mp4') }}" type="video/mp4">
    </video>
</div>

{{-- <div class="col-md-6">
    <h3>HOW TO SETUP SYNC SERVER</h3>
    <video width="800" controls>
      <source src="{{ asset('vid/setup-syncserver.mp4') }}" type="video/mp4">
    </video>
</div> --}}

                </div>
            </div>
        </div>
</div>




    </div>
@endsection

