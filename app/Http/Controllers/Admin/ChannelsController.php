<?php

namespace App\Http\Controllers\Admin;

use App\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreChannelsRequest;
use App\Http\Requests\Admin\UpdateChannelsRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreChannelRequest;
use App\Http\Requests\UpdateChannelRequest;
use GuzzleHttp\Client;
use Illuminate\Support\Arr;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Stream\Stream;
use App\Helpers\General;
use Illuminate\Support\Str;
use App\Jobs\GetDevChannels;
use App\Jobs\GetBetaChannels;
use App\Jobs\GetQAChannels;

class ChannelsController extends Controller
{

    public function updateall()
    {
        try {
            \Log::info("I am dispatching in the background the update for dev channels.");
            GetDevChannels::dispatch()->onQueue('processing');
        } catch (\Exception $e) {
            Log::alert($e);
        }

        try {
            GetBetaChannels::dispatch()->onQueue('processing');
        } catch (\Exception $e) {
            Log::warning($e);
        }

        try {
            GetQAChannels::dispatch()->onQueue('processing');
        } catch (\Exception $e) {
            Log::warning($e);
        }

        return response()->json(['success'=>'Data is successfully added']);
    }


    /**
     * Display a listing of Channel.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('channel_access')) {
            return abort(401);
        }

        if (request()->ajax()) {
            $query = Channel::query();
            $query->with("csi");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {

        if (! Gate::allows('channel_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'channels.id',
                'channels.source_name',
                'channels.channelid',
                'channels.env',
                'channels.ffmpegsource',
                'channels.ssm',
                'channels.imc',
                'channels.port',
                'channels.pid',
                'channels.source_ip',
                'channels.udp',
                'channels.valid_as_of',
                'channels.csi_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'channel_';
                $routeKey = 'admin.channels';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('source_name', function ($row) {
                return $row->source_name ? $row->source_name : '';
            });
            $table->editColumn('channelid', function ($row) {
                return $row->channelid ? $row->channelid : '';
            });
            $table->editColumn('env', function ($row) {
                return $row->env ? $row->env : '';
            });
            $table->editColumn('ffmpegsource', function ($row) {
                return $row->ffmpegsource ? $row->ffmpegsource : '';
            });
            $table->editColumn('ssm', function ($row) {
                return $row->ssm ? $row->ssm : '';
            });
            $table->editColumn('imc', function ($row) {
                return $row->imc ? $row->imc : '';
            });
            $table->editColumn('port', function ($row) {
                return $row->port ? $row->port : '';
            });
            $table->editColumn('pid', function ($row) {
                return $row->pid ? $row->pid : '';
            });
            $table->editColumn('source_ip', function ($row) {
                return $row->source_ip ? $row->source_ip : '';
            });
            $table->editColumn('udp', function ($row) {
                return $row->udp ? $row->udp : '';
            });
            $table->editColumn('valid_as_of', function ($row) {
                return $row->valid_as_of ? $row->valid_as_of : '';
            });
            $table->editColumn('csi.move_path', function ($row) {
                return $row->csi ? $row->csi->move_path : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.channels.index');
    }

    /**
     * Show the form for creating new Channel.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('channel_create')) {
            return abort(401);
        }

        $csis = \App\Csi::get()->pluck('move_path', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.channels.create', compact('csis'));
    }

    /**
     * Store a newly created Channel in storage.
     *
     * @param  \App\Http\Requests\StoreChannelsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChannelsRequest $request)
    {
        if (! Gate::allows('channel_create')) {
            return abort(401);
        }
        $channel = Channel::create($request->all());



        return redirect()->route('admin.channels.index');
    }


    /**
     * Show the form for editing Channel.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('channel_edit')) {
            return abort(401);
        }

        $csis = \App\Csi::get()->pluck('move_path', 'id')->prepend(trans('global.app_please_select'), '');

        $channel = Channel::findOrFail($id);

        return view('admin.channels.edit', compact('channel', 'csis'));
    }

    /**
     * Update Channel in storage.
     *
     * @param  \App\Http\Requests\UpdateChannelsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChannelsRequest $request, $id)
    {
        if (! Gate::allows('channel_edit')) {
            return abort(401);
        }
        $channel = Channel::findOrFail($id);
        $channel->update($request->all());



        return redirect()->route('admin.channels.index');
    }


    /**
     * Display Channel.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('channel_view')) {
            return abort(401);
        }

        $csis = \App\Csi::get()->pluck('move_path', 'id')->prepend(trans('global.app_please_select'), '');
        $csis = \App\Csi::where('channel_id', $id)->get();
        $csos = \App\Cso::where('channel_id', $id)->get();

        $channel = Channel::findOrFail($id);

        return view('admin.channels.show', compact('channel', 'csis', 'csos'));
    }


    /**
     * Remove Channel from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('channel_delete')) {
            return abort(401);
        }
        $channel = Channel::findOrFail($id);
        $channel->delete();

        return redirect()->route('admin.channels.index');
    }

    /**
     * Delete all selected Channel at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('channel_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Channel::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Channel from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('channel_delete')) {
            return abort(401);
        }
        $channel = Channel::onlyTrashed()->findOrFail($id);
        $channel->restore();

        return redirect()->route('admin.channels.index');
    }

    /**
     * Permanently delete Channel from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('channel_delete')) {
            return abort(401);
        }
        $channel = Channel::onlyTrashed()->findOrFail($id);
        $channel->forceDelete();

        return redirect()->route('admin.channels.index');
    }
}
