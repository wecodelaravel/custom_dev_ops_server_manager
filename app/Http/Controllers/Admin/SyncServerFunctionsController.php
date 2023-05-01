<?php

namespace App\Http\Controllers\Admin;

use App\SyncServerFunction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSyncServerFunctionsRequest;
use App\Http\Requests\Admin\UpdateSyncServerFunctionsRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class SyncServerFunctionsController extends Controller
{
    /**
     * Display a listing of SyncServerFunction.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('sync_server_function_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = SyncServerFunction::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('sync_server_function_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'sync_server_functions.id',
                'sync_server_functions.type',
                'sync_server_functions.description',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'sync_server_function_';
                $routeKey = 'admin.sync_server_functions';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('type', function ($row) {
                return $row->type ? $row->type : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.sync_server_functions.index');
    }

    /**
     * Show the form for creating new SyncServerFunction.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('sync_server_function_create')) {
            return abort(401);
        }
        return view('admin.sync_server_functions.create');
    }

    /**
     * Store a newly created SyncServerFunction in storage.
     *
     * @param  \App\Http\Requests\StoreSyncServerFunctionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSyncServerFunctionsRequest $request)
    {
        if (! Gate::allows('sync_server_function_create')) {
            return abort(401);
        }
        $sync_server_function = SyncServerFunction::create($request->all());



        return redirect()->route('admin.sync_server_functions.index');
    }


    /**
     * Show the form for editing SyncServerFunction.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('sync_server_function_edit')) {
            return abort(401);
        }
        $sync_server_function = SyncServerFunction::findOrFail($id);

        return view('admin.sync_server_functions.edit', compact('sync_server_function'));
    }

    /**
     * Update SyncServerFunction in storage.
     *
     * @param  \App\Http\Requests\UpdateSyncServerFunctionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSyncServerFunctionsRequest $request, $id)
    {
        if (! Gate::allows('sync_server_function_edit')) {
            return abort(401);
        }
        $sync_server_function = SyncServerFunction::findOrFail($id);
        $sync_server_function->update($request->all());



        return redirect()->route('admin.sync_server_functions.index');
    }


    /**
     * Display SyncServerFunction.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('sync_server_function_view')) {
            return abort(401);
        }
        $syncservers = \App\Syncserver::where('ss_type_id', $id)->get();

        $sync_server_function = SyncServerFunction::findOrFail($id);

        return view('admin.sync_server_functions.show', compact('sync_server_function', 'syncservers'));
    }


    /**
     * Remove SyncServerFunction from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('sync_server_function_delete')) {
            return abort(401);
        }
        $sync_server_function = SyncServerFunction::findOrFail($id);
        $sync_server_function->delete();

        return redirect()->route('admin.sync_server_functions.index');
    }

    /**
     * Delete all selected SyncServerFunction at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('sync_server_function_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = SyncServerFunction::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore SyncServerFunction from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('sync_server_function_delete')) {
            return abort(401);
        }
        $sync_server_function = SyncServerFunction::onlyTrashed()->findOrFail($id);
        $sync_server_function->restore();

        return redirect()->route('admin.sync_server_functions.index');
    }

    /**
     * Permanently delete SyncServerFunction from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('sync_server_function_delete')) {
            return abort(401);
        }
        $sync_server_function = SyncServerFunction::onlyTrashed()->findOrFail($id);
        $sync_server_function->forceDelete();

        return redirect()->route('admin.sync_server_functions.index');
    }
}
