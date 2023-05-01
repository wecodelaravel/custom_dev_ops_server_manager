<?php

namespace App\Http\Controllers\Admin;

use App\Host;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreHostsRequest;
use App\Http\Requests\Admin\UpdateHostsRequest;
use Yajra\DataTables\DataTables;
use App\Jobs\HostConfReadyCheck;
use App\Jobs\HostCaipyCheck;
use App\Jobs\HostServerCheck;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class HostsController extends Controller
{
    /**
     * Display a listing of Host.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('host_access')) {
            return abort(401);
        }

        if (request()->ajax()) {
            $query = Host::query();
            $query->with("group");
            $query->with("status");
            $query->with("instance");
            $query->with("rc");
            $query->with("ss_func");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {

            if (! Gate::allows('host_delete')) {
                return abort(401);
            }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'hosts.id',
                'hosts.name',
                'hosts.host',
                'hosts.server_exists',
                'hosts.caipy_is_setup',
                'hosts.ready_to_receive_conf',
                'hosts.last_received_conf',
                'hosts.configured',
                'hosts.notes',
                'hosts.cs_token',
                'hosts.group_id',
                'hosts.status_id',
                'hosts.instance_id',
                'hosts.rc_id',
                'hosts.ss_func_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'host_';
                $routeKey = 'admin.hosts';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('host', function ($row) {
                return $row->host ? $row->host : '';
            });
            $table->editColumn('server_exists', function ($row) {
                return \Form::checkbox("server_exists", 1, $row->server_exists == 1, ["disabled"]);
            });
            $table->editColumn('caipy_is_setup', function ($row) {
                return \Form::checkbox("caipy_is_setup", 1, $row->caipy_is_setup == 1, ["disabled"]);
            });
            $table->editColumn('ready_to_receive_conf', function ($row) {
                return \Form::checkbox("ready_to_receive_conf", 1, $row->ready_to_receive_conf == 1, ["disabled"]);
            });
            $table->editColumn('last_received_conf', function ($row) {
                return $row->last_received_conf ? $row->last_received_conf : '';
            });
            $table->editColumn('configured', function ($row) {
                return \Form::checkbox("configured", 1, $row->configured == 1, ["disabled"]);
            });
            $table->editColumn('notes', function ($row) {
                return $row->notes ? $row->notes : '';
            });
            $table->editColumn('cs_token', function ($row) {
                return $row->cs_token ? $row->cs_token : '';
            });
            $table->editColumn('group.group', function ($row) {
                return $row->group ? $row->group->group : '';
            });
            $table->editColumn('status.status', function ($row) {
                return $row->status ? $row->status->status : '';
            });
            $table->editColumn('instance.quantity_to_create', function ($row) {
                return $row->instance ? $row->instance->quantity_to_create : '';
            });
            $table->editColumn('rc.role_convention', function ($row) {
                return $row->rc ? $row->rc->role_convention : '';
            });
            $table->editColumn('ss_func.type', function ($row) {
                return $row->ss_func ? $row->ss_func->type : '';
            });

            $table->rawColumns(['actions','massDelete','server_exists','caipy_is_setup','ready_to_receive_conf','configured']);

            return $table->make(true);
        }

        $hosts = Host::all();

        foreach($hosts as $host){
            $host = Host::findOrFail($host);

            HostServerCheck::dispatchNow($host);
        }

        return view('admin.hosts.index');
    }

    /**
     * Show the form for creating new Host.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('host_create')) {
            return abort(401);
        }

        $groups = \App\Group::get()->pluck('group', 'id')->prepend(trans('global.app_please_select'), '');
        $statuses = \App\Status::get()->pluck('status', 'id')->prepend(trans('global.app_please_select'), '');
        $instances = \App\Instance::get()->pluck('quantity_to_create', 'id')->prepend(trans('global.app_please_select'), '');
        $rcs = \App\RoleConvention::get()->pluck('role_convention', 'id')->prepend(trans('global.app_please_select'), '');
        $ss_funcs = \App\SyncServerFunction::get()->pluck('type', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.hosts.create', compact('groups', 'statuses', 'instances', 'rcs', 'ss_funcs'));
    }

    /**
     * Store a newly created Host in storage.
     *
     * @param  \App\Http\Requests\StoreHostsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHostsRequest $request)
    {
        if (! Gate::allows('host_create')) {
            return abort(401);
        }
        $host = Host::create($request->all());


        HostConfReadyCheck::dispatch();
        HostCaipyCheck::dispatch();
        HostServerCheck::dispatch($host);



        return redirect()->route('admin.hosts.index');
    }


    /**
     * Show the form for editing Host.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('host_edit')) {
            return abort(401);
        }

        $groups = \App\Group::get()->pluck('group', 'id')->prepend(trans('global.app_please_select'), '');
        $statuses = \App\Status::get()->pluck('status', 'id')->prepend(trans('global.app_please_select'), '');
        $instances = \App\Instance::get()->pluck('quantity_to_create', 'id')->prepend(trans('global.app_please_select'), '');
        $rcs = \App\RoleConvention::get()->pluck('role_convention', 'id')->prepend(trans('global.app_please_select'), '');
        $ss_funcs = \App\SyncServerFunction::get()->pluck('type', 'id')->prepend(trans('global.app_please_select'), '');

        $host = Host::findOrFail($id);

        return view('admin.hosts.edit', compact('host', 'groups', 'statuses', 'instances', 'rcs', 'ss_funcs'));
    }

    /**
     * Update Host in storage.
     *
     * @param  \App\Http\Requests\UpdateHostsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHostsRequest $request, $id)
    {
        if (! Gate::allows('host_edit')) {
            return abort(401);
        }
        $host = Host::findOrFail($id);
        $host->update($request->all());



        return redirect()->route('admin.hosts.index');
    }


    /**
     * Display Host.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('host_view')) {
            return abort(401);
        }

        $groups = \App\Group::get()->pluck('group', 'id')->prepend(trans('global.app_please_select'), '');
        $statuses = \App\Status::get()->pluck('status', 'id')->prepend(trans('global.app_please_select'), '');
        $instances = \App\Instance::get()->pluck('quantity_to_create', 'id')->prepend(trans('global.app_please_select'), '');
        $rcs = \App\RoleConvention::get()->pluck('role_convention', 'id')->prepend(trans('global.app_please_select'), '');
        $ss_funcs = \App\SyncServerFunction::get()->pluck('type', 'id')->prepend(trans('global.app_please_select'), '');
        $statuses = \App\Status::where('host_id', $id)->get();
        $channel_servers = \App\ChannelServer::where('host_id', $id)->get();
        $instances = \App\Instance::whereHas('hosts',
                    function ($query) use ($id) {
                        $query->where('id', $id);
                    })->get();
        $aggregation_servers = \App\AggregationServer::where('host_id', $id)->get();
        $syncservers = \App\Syncserver::where('host_id', $id)->get();

        $host = Host::findOrFail($id);

        return view('admin.hosts.show', compact('host', 'statuses', 'channel_servers', 'instances', 'aggregation_servers', 'syncservers'));
    }


    /**
     * Remove Host from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('host_delete')) {
            return abort(401);
        }
        $host = Host::findOrFail($id);
        $host->delete();

        return redirect()->route('admin.hosts.index');
    }

    /**
     * Delete all selected Host at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('host_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Host::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Host from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('host_delete')) {
            return abort(401);
        }
        $host = Host::onlyTrashed()->findOrFail($id);
        $host->restore();

        return redirect()->route('admin.hosts.index');
    }

    /**
     * Permanently delete Host from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('host_delete')) {
            return abort(401);
        }
        $host = Host::onlyTrashed()->findOrFail($id);
        $host->forceDelete();

        return redirect()->route('admin.hosts.index');
    }
}
