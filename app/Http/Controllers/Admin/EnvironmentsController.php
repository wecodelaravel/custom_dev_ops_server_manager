<?php

namespace App\Http\Controllers\Admin;

use App\Environment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEnvironmentsRequest;
use App\Http\Requests\Admin\UpdateEnvironmentsRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EnvironmentsController extends Controller
{
    /**
     * Display a listing of Environment.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('environment_access')) {
            return abort(401);
        }



        if (request()->ajax()) {
            $query = Environment::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {

        if (! Gate::allows('environment_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'environments.id',
                'environments.environment',
                'environments.env_value',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'environment_';
                $routeKey = 'admin.environments';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('environment', function ($row) {
                return $row->environment ? $row->environment : '';
            });
            $table->editColumn('env_value', function ($row) {
                return $row->env_value ? $row->env_value : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.environments.index');
    }

    /**
     * Show the form for creating new Environment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('environment_create')) {
            return abort(401);
        }
        return view('admin.environments.create');
    }

    /**
     * Store a newly created Environment in storage.
     *
     * @param  \App\Http\Requests\StoreEnvironmentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEnvironmentsRequest $request)
    {
        if (! Gate::allows('environment_create')) {
            return abort(401);
        }
        $environment = Environment::create($request->all());



        return redirect()->route('admin.environments.index');
    }


    /**
     * Show the form for editing Environment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('environment_edit')) {
            return abort(401);
        }
        $environment = Environment::findOrFail($id);

        return view('admin.environments.edit', compact('environment'));
    }

    /**
     * Update Environment in storage.
     *
     * @param  \App\Http\Requests\UpdateEnvironmentsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEnvironmentsRequest $request, $id)
    {
        if (! Gate::allows('environment_edit')) {
            return abort(401);
        }
        $environment = Environment::findOrFail($id);
        $environment->update($request->all());



        return redirect()->route('admin.environments.index');
    }


    /**
     * Display Environment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('environment_view')) {
            return abort(401);
        }
        $instances = \App\Instance::where('env_id', $id)->get();

        $environment = Environment::findOrFail($id);

        return view('admin.environments.show', compact('environment', 'instances'));
    }


    /**
     * Remove Environment from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('environment_delete')) {
            return abort(401);
        }
        $environment = Environment::findOrFail($id);
        $environment->delete();

        return redirect()->route('admin.environments.index');
    }

    /**
     * Delete all selected Environment at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('environment_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Environment::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Environment from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('environment_delete')) {
            return abort(401);
        }
        $environment = Environment::onlyTrashed()->findOrFail($id);
        $environment->restore();

        return redirect()->route('admin.environments.index');
    }

    /**
     * Permanently delete Environment from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('environment_delete')) {
            return abort(401);
        }
        $environment = Environment::onlyTrashed()->findOrFail($id);
        $environment->forceDelete();

        return redirect()->route('admin.environments.index');
    }
}
