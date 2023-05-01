<?php

namespace App\Http\Controllers\Admin;

use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreStatusesRequest;
use App\Http\Requests\Admin\UpdateStatusesRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class StatusesController extends Controller
{
    /**
     * Display a listing of Status.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('status_access')) {
            return abort(401);
        }



        if (request()->ajax()) {
            $query = Status::query();
            $query->with("host");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {

                if (! Gate::allows('status_delete')) {
                    return abort(401);
                }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'statuses.id',
                'statuses.status',
                'statuses.host_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'status_';
                $routeKey = 'admin.statuses';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });
            $table->editColumn('host.host', function ($row) {
                return $row->host ? $row->host->host : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.statuses.index');
    }

    /**
     * Show the form for creating new Status.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('status_create')) {
            return abort(401);
        }

        $hosts = \App\Host::get()->pluck('host', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.statuses.create', compact('hosts'));
    }

    /**
     * Store a newly created Status in storage.
     *
     * @param  \App\Http\Requests\StoreStatusesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStatusesRequest $request)
    {
        if (! Gate::allows('status_create')) {
            return abort(401);
        }
        $status = Status::create($request->all());



        return redirect()->route('admin.statuses.index');
    }


    /**
     * Show the form for editing Status.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('status_edit')) {
            return abort(401);
        }

        $hosts = \App\Host::get()->pluck('host', 'id')->prepend(trans('global.app_please_select'), '');

        $status = Status::findOrFail($id);

        return view('admin.statuses.edit', compact('status', 'hosts'));
    }

    /**
     * Update Status in storage.
     *
     * @param  \App\Http\Requests\UpdateStatusesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStatusesRequest $request, $id)
    {
        if (! Gate::allows('status_edit')) {
            return abort(401);
        }
        $status = Status::findOrFail($id);
        $status->update($request->all());



        return redirect()->route('admin.statuses.index');
    }


    /**
     * Display Status.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('status_view')) {
            return abort(401);
        }
        $status = Status::findOrFail($id);

        return view('admin.statuses.show', compact('status'));
    }


    /**
     * Remove Status from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('status_delete')) {
            return abort(401);
        }
        $status = Status::findOrFail($id);
        $status->delete();

        return redirect()->route('admin.statuses.index');
    }

    /**
     * Delete all selected Status at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('status_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Status::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Status from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('status_delete')) {
            return abort(401);
        }
        $status = Status::onlyTrashed()->findOrFail($id);
        $status->restore();

        return redirect()->route('admin.statuses.index');
    }

    /**
     * Permanently delete Status from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('status_delete')) {
            return abort(401);
        }
        $status = Status::onlyTrashed()->findOrFail($id);
        $status->forceDelete();

        return redirect()->route('admin.statuses.index');
    }
}
