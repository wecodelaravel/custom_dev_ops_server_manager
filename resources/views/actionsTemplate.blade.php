{{-- @if(isset($addCsi))
<a target="_blank" href="{{ route($addCsi, $row->id) }}" class="btn btn-xs btn-warning">ADD 🠊 CSI</a>
@endif
 --}}
@can($gateKey.'view')
{{-- <a href="{{ route($csPreviewKey, $row->id) }}" class="btn btn-xs btn-info">cs</a>
<a href="{{ route($csCsIDKey, $row->id) }}" class="btn btn-xs btn-info">ids</a>
<a href="{{ route($csSettingsKey, $row->id) }}" class="btn btn-xs btn-info">settings</a>
<a href="{{ route($csModelKey, $row->id) }}" class="btn btn-xs btn-info">csm</a>
<a href="{{ route($csCsIDModelKey, $row->id) }}" class="btn btn-xs btn-info">csid</a>
<a href="{{ route($csSettingsModelKey, $row->id) }}" class="btn btn-xs btn-info">csset</a> --}}
@if(\Request::segment(2 =='channel_servers'))
{{-- <a target="_blank" href="{{ route('preview.cs.channel_server', $row->id) }}" class="btn btn-xs btn-info">cs</a>
<a target="_blank" href="{{ route('preview.cs.channelids', $row->id) }}" class="btn btn-xs btn-info">ids</a>
<a target="_blank" href="{{ route('preview.cs.settings', $row->id) }}" class="btn btn-xs btn-info">settings</a> --}}
@endif

{{-- <button type="button" class="btn btn-xs btn-default" data-id="{{ $channel_server->id }}" data-toggle="modal" data-target="#modal-channelids">
ChannelIDS
</button> --}}

    <a target="_blank" href="{{ route($routeKey.'.show', $row->id) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>

@endcan

@can($gateKey.'edit')
    <a target="_blank" href="{{ route($routeKey.'.edit', $row->id) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
    @if(isset($csosKey))
    <a target="_blank" href="{{ route($csosKey.'.edit', $row->id) }}" class="btn btn-xs btn-warning">Edit 🠊 CSO</a>
    @endif
    @if(isset($csisKey))
    <a target="_blank" href="{{ route($csisKey.'.edit', $row->id) }}" class="btn btn-xs btn-warning">Edit 🠈 CSI</a>
    @endif
@endcan



@can($gateKey.'delete')
    {!! Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'DELETE',
        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
        'route' => [$routeKey.'.destroy', $row->id])) !!}
    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
    {!! Form::close() !!}
@endcan


{{-- {{ \Request::segment(2) }} --}}
