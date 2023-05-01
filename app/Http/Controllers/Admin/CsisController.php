<?php

namespace App\Http\Controllers\Admin;

use App\Csi;
use App\Cso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCsisRequest;
use App\Http\Requests\Admin\UpdateCsisRequest;
use Yajra\DataTables\DataTables;
use Html;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CsisController extends Controller
{
    /**
     * Display a listing of Csi.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('csi_access')) {
            return abort(401);
        }

        if (request()->ajax()) {
            $query = Csi::query();
            $query->with("channel_server");
            $query->with("channel");
            $query->with("protocol");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {

        if (! Gate::allows('csi_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'csis.id',
                'csis.channel_server_id',
                'csis.channel_id',
                'csis.protocol_id',
                'csis.move_path',
                'csis.cs_token',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'csi_';
                $routeKey = 'admin.csis';
                $csosKey = 'admin.csos';


                return view($template, compact('row', 'gateKey', 'routeKey', 'csosKey'));
            });
            $table->editColumn('channel_server.cs_host', function ($row) {
                return $row->channel_server ? $row->channel_server->cs_host : '';
            });
            $table->editColumn('channel.source_name', function ($row) {
                return $row->channel ? $row->channel->source_name : '';
            });
            $table->editColumn('protocol.protocol', function ($row) {
                return $row->protocol ? $row->protocol->protocol : '';
            });
            $table->editColumn('move_path', function ($row) {
                return $row->move_path ? $row->move_path : '';
            });
            $table->editColumn('cs_token', function ($row) {
                return $row->cs_token ? $row->cs_token : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.csis.index');
    }

    function insert(Request $request)
    {
        if($request->ajax())
        {
            $rules = [];
            $error = \Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }
            $now = Carbon::now();

            $channel_server_id = $request->channel_server_id;
            $channel_id = $request->channel_id;
            $move_path = $request->move_path;
            $protocol_id  = $request->protocol_id;

            for($count = 0; $count < count($move_path); $count++)
            {
                $data = array(
                    'channel_server_id' => $channel_server_id[$count],
                    'channel_id' => $channel_id[$count],
                    'move_path' => $move_path[$count],
                    'protocol_id'  => $protocol_id[$count],
                    'updated_at' => $now,
                    'created_at' => $now
                );

                Csi::insert($data);
            }

            foreach($request->channel_server_id as $key => $v)
            {
                $data = array(
                    'channel_server_id' => $channel_server_id[$key],
                    'channel_id' => $channel_id[$key],
                    'updated_at' => $now,
                    'created_at' => $now
                );
                Cso::insert($data);
            }

            return response()->json([
                'success'  => 'CSI Data Added successfully.'
            ]);
            flash()->success("Successfully added channel server inputs and outputs");

        }
     }


    /**
     * Show the form for creating new Csi.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('csi_create')) {
            return abort(401);
        }
        $groups =  \App\Group::all();
        $csis = \App\Csi::all();
        $channel_servers = \App\ChannelServer::get()->pluck('cs_host', 'id')->prepend(trans('global.app_please_select'), '');
        $channels = \App\Channel::get()->pluck('channelid', 'id')->prepend(trans('global.app_please_select'), '');
        $protocols = \App\Protocol::get()->pluck('protocol', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.csis.create', compact('channel_servers', 'channels', 'protocols', 'csis', 'groups'));
    }

    /**
     * Store a newly created Csi in storage.
     *
     * @param  \App\Http\Requests\StoreCsisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCsisRequest $request)
    {
        if (! Gate::allows('csi_create')) {
            return abort(401);
        }


        $csi = Csi::create($request->all());
        $channel_server = \App\ChannelServer::findOrFail($request->channel_server_id);
        $csi->update(['cs_token' => $channel_server->cs_token]);

//        foreach ($request->input('channel_server_id') as $key=>$csi) {
            Cso::create([
                'channel_server_id' => $csi->channel_server_id,
                'channel_id' => $csi->channel_id,
                'cs_token' => $channel_server->cs_token,
                'host_path' => $request->host_path
            ]);
//        }


        return redirect()->route('admin.csis.index');
    }



    /**
     * Show the form for editing Csi.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('csi_edit')) {
            return abort(401);
        }

        $channel_servers = \App\ChannelServer::get()->pluck('cs_host', 'id')->prepend(trans('global.app_please_select'), '');
        $channels = \App\Channel::get()->pluck('source_name', 'id')->prepend(trans('global.app_please_select'), '');
        $protocols = \App\Protocol::get()->pluck('protocol', 'id')->prepend(trans('global.app_please_select'), '');

        $csi = Csi::findOrFail($id);

        return view('admin.csis.edit', compact('csi', 'channel_servers', 'channels', 'protocols'));
    }

    /**
     * Update Csi in storage.
     *
     * @param  \App\Http\Requests\UpdateCsisRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCsisRequest $request, $id)
    {
        if (! Gate::allows('csi_edit')) {
            return abort(401);
        }
        $csi = Csi::findOrFail($id);
        $csi->update($request->all());



        return redirect()->route('admin.csis.index');
    }


    /**
     * Display Csi.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('csi_view')) {
            return abort(401);
        }

        $channel_servers = \App\ChannelServer::get()->pluck('cs_host', 'id')->prepend(trans('global.app_please_select'), '');
        $channels = \App\Channel::get()->pluck('source_name', 'id')->prepend(trans('global.app_please_select'), '');
        $protocols = \App\Protocol::get()->pluck('protocol', 'id')->prepend(trans('global.app_please_select'), '');
        $channels = \App\Channel::where('csi_id', $id)->get();


        $csi = Csi::findOrFail($id);

        return view('admin.csis.show', compact('csi', 'channels'));
    }


    /**
     * Remove Csi from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('csi_delete')) {
            return abort(401);
        }
        $csi = Csi::findOrFail($id);
        $csi->delete();

        return redirect()->route('admin.csis.index');
    }

    /**
     * Delete all selected Csi at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('csi_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Csi::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Csi from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('csi_delete')) {
            return abort(401);
        }
        $csi = Csi::onlyTrashed()->findOrFail($id);
        $csi->restore();

        return redirect()->route('admin.csis.index');
    }

    /**
     * Permanently delete Csi from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('csi_delete')) {
            return abort(401);
        }
        $csi = Csi::onlyTrashed()->findOrFail($id);
        $csi->forceDelete();

        return redirect()->route('admin.csis.index');
    }
}
