<?php

namespace App\Http\Controllers\Admin;

use App\Cso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCsosRequest;
use App\Http\Requests\Admin\UpdateCsosRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class CsosController extends Controller
{
    /**
     * Display a listing of Cso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('cso_access')) {
            return abort(401);
        }



        if (request()->ajax()) {
            $query = Cso::query();
            $query->with("channel_server");
            $query->with("channel");
            $query->with("select_aggregation_server_for_a");
            $query->with("select_sync_server_for_a");
            $query->with("select_aggregation_server_for_b");
            $query->with("select_sync_server_for_b");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {

        if (! Gate::allows('cso_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'csos.id',
                'csos.use_channel_server_localhost',
                'csos.channel_server_id',
                'csos.channel_id',
                'csos.use_as_for_a',
                'csos.select_aggregation_server_for_a_id',
                'csos.use_sync_server_for_a',
                'csos.select_sync_server_for_a_id',
                'csos.use_custom_a',
                'csos.ocloud_a',
                'csos.ocp_a',
                'csos.use_as_for_b',
                'csos.select_aggregation_server_for_b_id',
                'csos.use_sync_server_for_b',
                'csos.select_sync_server_for_b_id',
                'csos.use_custom_for_b',
                'csos.ocloud_b',
                'csos.ocp_b',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'cso_';
                $routeKey = 'admin.csos';
                $csisKey  = 'admin.csis';

                return view($template, compact('row', 'gateKey', 'routeKey', 'csisKey'));
            });
            $table->editColumn('use_channel_server_localhost', function ($row) {
                return \Form::checkbox("use_channel_server_localhost", 1, $row->use_channel_server_localhost == 1, ["disabled"]);
            });
            $table->editColumn('channel_server.cs_host', function ($row) {
                return $row->channel_server ? $row->channel_server->cs_host : '';
            });
            $table->editColumn('channel.channelid', function ($row) {
                return $row->channel ? $row->channel->channelid : '';
            });
            $table->editColumn('use_as_for_a', function ($row) {
                return \Form::checkbox("use_as_for_a", 1, $row->use_as_for_a == 1, ["disabled"]);
            });
            $table->editColumn('select_aggregation_server_for_a.as_host_url', function ($row) {
                return $row->select_aggregation_server_for_a ? $row->select_aggregation_server_for_a->as_host_url : '';
            });
            $table->editColumn('use_sync_server_for_a', function ($row) {
                return \Form::checkbox("use_sync_server_for_a", 1, $row->use_sync_server_for_a == 1, ["disabled"]);
            });
            $table->editColumn('select_sync_server_for_a.ss_host_url', function ($row) {
                return $row->select_sync_server_for_a ? $row->select_sync_server_for_a->ss_host_url : '';
            });
            $table->editColumn('use_custom_a', function ($row) {
                return \Form::checkbox("use_custom_a", 1, $row->use_custom_a == 1, ["disabled"]);
            });
            $table->editColumn('ocloud_a', function ($row) {
                return $row->ocloud_a ? $row->ocloud_a : '';
            });
            $table->editColumn('ocp_a', function ($row) {
                return $row->ocp_a ? $row->ocp_a : '';
            });
            $table->editColumn('use_as_for_b', function ($row) {
                return \Form::checkbox("use_as_for_b", 1, $row->use_as_for_b == 1, ["disabled"]);
            });
            $table->editColumn('select_aggregation_server_for_b.as_host_url', function ($row) {
                return $row->select_aggregation_server_for_b ? $row->select_aggregation_server_for_b->as_host_url : '';
            });
            $table->editColumn('use_sync_server_for_b', function ($row) {
                return \Form::checkbox("use_sync_server_for_b", 1, $row->use_sync_server_for_b == 1, ["disabled"]);
            });
            $table->editColumn('select_sync_server_for_b.ss_host_url', function ($row) {
                return $row->select_sync_server_for_b ? $row->select_sync_server_for_b->ss_host_url : '';
            });
            $table->editColumn('use_custom_for_b', function ($row) {
                return \Form::checkbox("use_custom_for_b", 1, $row->use_custom_for_b == 1, ["disabled"]);
            });
            $table->editColumn('ocloud_b', function ($row) {
                return $row->ocloud_b ? $row->ocloud_b : '';
            });
            $table->editColumn('ocp_b', function ($row) {
                return $row->ocp_b ? $row->ocp_b : '';
            });

            $table->rawColumns(['actions','massDelete','use_channel_server_localhost','use_as_for_a','use_sync_server_for_a','use_custom_a','use_as_for_b','use_sync_server_for_b','use_custom_for_b']);

            return $table->make(true);
        }

        return view('admin.csos.index');
    }

    /**
     * Show the form for creating new Cso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('cso_create')) {
            return abort(401);
        }

        $channel_servers = \App\ChannelServer::get()->pluck('cs_host', 'id')->prepend(trans('global.app_please_select'), '');
        $channels = \App\Channel::get()->pluck('channelid', 'id')->prepend(trans('global.app_please_select'), '');
        $select_aggregation_server_for_as = \App\AggregationServer::get()->pluck('as_host_url', 'id')->prepend(trans('global.app_please_select'), '');
        $select_sync_server_for_as = \App\Syncserver::get()->pluck('ss_host_url', 'id')->prepend(trans('global.app_please_select'), '');
        $select_aggregation_server_for_bs = \App\AggregationServer::get()->pluck('as_host_url', 'id')->prepend(trans('global.app_please_select'), '');
        $select_sync_server_for_bs = \App\Syncserver::get()->pluck('ss_host_url', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.csos.create', compact('channel_servers', 'channels', 'select_aggregation_server_for_as', 'select_sync_server_for_as', 'select_aggregation_server_for_bs', 'select_sync_server_for_bs'));
    }

    /**
     * Store a newly created Cso in storage.
     *
     * @param  \App\Http\Requests\StoreCsosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCsosRequest $request)
    {
        if (! Gate::allows('cso_create')) {
            return abort(401);
        }
        $cso = Cso::create($request->all());



        return redirect()->route('admin.csos.index');
    }


    /**
     * Show the form for editing Cso.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('cso_edit')) {
            return abort(401);
        }

        $channel_servers = \App\ChannelServer::get()->pluck('cs_host', 'id')->prepend(trans('global.app_please_select'), '');
        $channels = \App\Channel::get()->pluck('channelid', 'id')->prepend(trans('global.app_please_select'), '');
        $select_aggregation_server_for_as = \App\AggregationServer::get()->pluck('as_host_url', 'id')->prepend(trans('global.app_please_select'), '');
        $select_sync_server_for_as = \App\Syncserver::get()->pluck('ss_host_url', 'id')->prepend(trans('global.app_please_select'), '');
        $select_aggregation_server_for_bs = \App\AggregationServer::get()->pluck('as_host_url', 'id')->prepend(trans('global.app_please_select'), '');
        $select_sync_server_for_bs = \App\Syncserver::get()->pluck('ss_host_url', 'id')->prepend(trans('global.app_please_select'), '');

        $cso = Cso::findOrFail($id);

        return view('admin.csos.edit', compact('cso', 'channel_servers', 'channels', 'select_aggregation_server_for_as', 'select_sync_server_for_as', 'select_aggregation_server_for_bs', 'select_sync_server_for_bs'));
    }

    /**
     * Update Cso in storage.
     *
     * @param  \App\Http\Requests\UpdateCsosRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCsosRequest $request, $id)
    {
        if (! Gate::allows('cso_edit')) {
            return abort(401);
        }
        $cso = Cso::findOrFail($id);
        $cso->update($request->all());



        return redirect()->route('admin.csos.index');
    }


    /**
     * Display Cso.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('cso_view')) {
            return abort(401);
        }
        $cso = Cso::findOrFail($id);

        return view('admin.csos.show', compact('cso'));
    }


    /**
     * Remove Cso from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('cso_delete')) {
            return abort(401);
        }
        $cso = Cso::findOrFail($id);
        $cso->delete();

        return redirect()->route('admin.csos.index');
    }

    /**
     * Delete all selected Cso at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('cso_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Cso::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Cso from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('cso_delete')) {
            return abort(401);
        }
        $cso = Cso::onlyTrashed()->findOrFail($id);
        $cso->restore();

        return redirect()->route('admin.csos.index');
    }

    /**
     * Permanently delete Cso from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('cso_delete')) {
            return abort(401);
        }
        $cso = Cso::onlyTrashed()->findOrFail($id);
        $cso->forceDelete();

        return redirect()->route('admin.csos.index');
    }
}
