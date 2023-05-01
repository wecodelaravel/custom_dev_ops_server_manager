@php

$hosts = \App\Host::all();

@endphp
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-group-tab" data-toggle="tab"><i class="fa fa-plus"></i></a></li>
      {{-- <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li> --}}
      {{-- <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li> --}}
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Group Settings</h3>
             <div class="form-group">
                  <label>Select</label>
                  {!! Form::select('host', $hosts, old('host'), ['class' => 'form-control select2']) !!}
                </div>

{{--         <div class="form-group col-md-2">
            <label>Company</label>
            <select class="form-control" style="width:100%" name="company_id" required>
                <option value="" @if(empty($search_params['company_id'])) selected @endif>SELECT COMPANY</option>
                @foreach($companies as $item)
                    <option value="{!! $item->id !!}" @if($search_params['company_id'] == $item->id) selected @endif>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
 --}}

            <ul class="control-sidebar-menu">


@foreach (\App\Host::all() as $host)



 <li>
    <div class="col-md-12">
        <h3>{{ $host->host }}</h3>
    <div class="form-group">

        <label> <input type="checkbox" class="minimal" checked></label>
        <label> <input type="checkbox" class="minimal"> </label>
        <label> <input type="checkbox" class="minimal" disabled></label>
        <label> <input type="checkbox" class="minimal" checked></label>
        <label> <input type="checkbox" class="minimal"> </label>
        <label> <input type="checkbox" class="minimal" disabled></label>
    </div>
    </div>
 </li>
{{--     @if ($loop->first)
    <li>{{ $host->host }}</li>


    @endif --}}

{{--     @if ($loop->last)
        This is the last iteration.
        <li>{{ $host->host }}</li>
    @endif --}}

    {{-- <p>This is host {{ $host->id }}</p> --}}
@endforeach
            </ul>
        </div>
      <!-- Home tab content -->
{{--       <div class="tab-pane" id="control-sidebar-home-tab"> </div> --}}
        <!-- /.tab-pane -->
      <!-- Stats tab content -->
      {{-- <div class="tab-pane" id="control-sidebar-stats-tab"></div> --}}
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      {{-- <div class="tab-pane" id="control-sidebar-settings-tab"> </div> --}}
      <!-- /.tab-pane -->
    </div>

