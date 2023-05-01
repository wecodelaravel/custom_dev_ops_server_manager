<?php

namespace App\Http\Controllers\Admin;

use App\RoleConvention;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRoleConventionsRequest;
use App\Http\Requests\Admin\UpdateRoleConventionsRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class RoleConventionsController extends Controller
{
    /**
     * Display a listing of RoleConvention.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('role_convention_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = RoleConvention::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('role_convention_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'role_conventions.id',
                'role_conventions.role_convention',
                'role_conventions.role_convention_value',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'role_convention_';
                $routeKey = 'admin.role_conventions';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('role_convention', function ($row) {
                return $row->role_convention ? $row->role_convention : '';
            });
            $table->editColumn('role_convention_value', function ($row) {
                return $row->role_convention_value ? $row->role_convention_value : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.role_conventions.index');
    }

    /**
     * Show the form for creating new RoleConvention.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('role_convention_create')) {
            return abort(401);
        }
        return view('admin.role_conventions.create');
    }

    /**
     * Store a newly created RoleConvention in storage.
     *
     * @param  \App\Http\Requests\StoreRoleConventionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleConventionsRequest $request)
    {
        if (! Gate::allows('role_convention_create')) {
            return abort(401);
        }
        $role_convention = RoleConvention::create($request->all());



        return redirect()->route('admin.role_conventions.index');
    }


    /**
     * Show the form for editing RoleConvention.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('role_convention_edit')) {
            return abort(401);
        }
        $role_convention = RoleConvention::findOrFail($id);

        return view('admin.role_conventions.edit', compact('role_convention'));
    }

    /**
     * Update RoleConvention in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleConventionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleConventionsRequest $request, $id)
    {
        if (! Gate::allows('role_convention_edit')) {
            return abort(401);
        }
        $role_convention = RoleConvention::findOrFail($id);
        $role_convention->update($request->all());



        return redirect()->route('admin.role_conventions.index');
    }


    /**
     * Display RoleConvention.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('role_convention_view')) {
            return abort(401);
        }
        $instances = \App\Instance::where('role_convention_id', $id)->get();

        $role_convention = RoleConvention::findOrFail($id);

        return view('admin.role_conventions.show', compact('role_convention', 'instances'));
    }


    /**
     * Remove RoleConvention from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('role_convention_delete')) {
            return abort(401);
        }
        $role_convention = RoleConvention::findOrFail($id);
        $role_convention->delete();

        return redirect()->route('admin.role_conventions.index');
    }

    /**
     * Delete all selected RoleConvention at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('role_convention_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = RoleConvention::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore RoleConvention from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('role_convention_delete')) {
            return abort(401);
        }
        $role_convention = RoleConvention::onlyTrashed()->findOrFail($id);
        $role_convention->restore();

        return redirect()->route('admin.role_conventions.index');
    }

    /**
     * Permanently delete RoleConvention from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('role_convention_delete')) {
            return abort(401);
        }
        $role_convention = RoleConvention::onlyTrashed()->findOrFail($id);
        $role_convention->forceDelete();

        return redirect()->route('admin.role_conventions.index');
    }
}
