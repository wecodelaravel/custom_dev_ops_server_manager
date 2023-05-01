<?php

namespace App\Http\Controllers\Admin;

use App\Timezone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTimezonesRequest;
use App\Http\Requests\Admin\UpdateTimezonesRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class TimezonesController extends Controller
{
    /**
     * Display a listing of Timezone.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('timezone_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Timezone::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('timezone_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'timezones.id',
                'timezones.timezone',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'timezone_';
                $routeKey = 'admin.timezones';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('timezone', function ($row) {
                return $row->timezone ? $row->timezone : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.timezones.index');
    }

    /**
     * Show the form for creating new Timezone.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('timezone_create')) {
            return abort(401);
        }
        return view('admin.timezones.create');
    }

    /**
     * Store a newly created Timezone in storage.
     *
     * @param  \App\Http\Requests\StoreTimezonesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTimezonesRequest $request)
    {
        if (! Gate::allows('timezone_create')) {
            return abort(401);
        }
        $timezone = Timezone::create($request->all());



        return redirect()->route('admin.timezones.index');
    }


    /**
     * Show the form for editing Timezone.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('timezone_edit')) {
            return abort(401);
        }
        $timezone = Timezone::findOrFail($id);

        return view('admin.timezones.edit', compact('timezone'));
    }

    /**
     * Update Timezone in storage.
     *
     * @param  \App\Http\Requests\UpdateTimezonesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTimezonesRequest $request, $id)
    {
        if (! Gate::allows('timezone_edit')) {
            return abort(401);
        }
        $timezone = Timezone::findOrFail($id);
        $timezone->update($request->all());



        return redirect()->route('admin.timezones.index');
    }


    /**
     * Display Timezone.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('timezone_view')) {
            return abort(401);
        }
        $aggregation_servers = \App\AggregationServer::where('timezone_id', $id)->get();$syncservers = \App\Syncserver::where('timezone_id', $id)->get();

        $timezone = Timezone::findOrFail($id);

        return view('admin.timezones.show', compact('timezone', 'aggregation_servers', 'syncservers'));
    }


    /**
     * Remove Timezone from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('timezone_delete')) {
            return abort(401);
        }
        $timezone = Timezone::findOrFail($id);
        $timezone->delete();

        return redirect()->route('admin.timezones.index');
    }

    /**
     * Delete all selected Timezone at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('timezone_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Timezone::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Timezone from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('timezone_delete')) {
            return abort(401);
        }
        $timezone = Timezone::onlyTrashed()->findOrFail($id);
        $timezone->restore();

        return redirect()->route('admin.timezones.index');
    }

    /**
     * Permanently delete Timezone from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('timezone_delete')) {
            return abort(401);
        }
        $timezone = Timezone::onlyTrashed()->findOrFail($id);
        $timezone->forceDelete();

        return redirect()->route('admin.timezones.index');
    }
}
