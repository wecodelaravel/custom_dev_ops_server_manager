<?php

namespace App\Http\Controllers\Admin;

use App\NotificationServerType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreNotificationServerTypesRequest;
use App\Http\Requests\Admin\UpdateNotificationServerTypesRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class NotificationServerTypesController extends Controller
{
    /**
     * Display a listing of NotificationServerType.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('notification_server_type_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = NotificationServerType::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('notification_server_type_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'notification_server_types.id',
                'notification_server_types.notification_server_type',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'notification_server_type_';
                $routeKey = 'admin.notification_server_types';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('notification_server_type', function ($row) {
                return $row->notification_server_type ? $row->notification_server_type : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.notification_server_types.index');
    }

    /**
     * Show the form for creating new NotificationServerType.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('notification_server_type_create')) {
            return abort(401);
        }
        return view('admin.notification_server_types.create');
    }

    /**
     * Store a newly created NotificationServerType in storage.
     *
     * @param  \App\Http\Requests\StoreNotificationServerTypesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNotificationServerTypesRequest $request)
    {
        if (! Gate::allows('notification_server_type_create')) {
            return abort(401);
        }
        $notification_server_type = NotificationServerType::create($request->all());



        return redirect()->route('admin.notification_server_types.index');
    }


    /**
     * Show the form for editing NotificationServerType.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('notification_server_type_edit')) {
            return abort(401);
        }
        $notification_server_type = NotificationServerType::findOrFail($id);

        return view('admin.notification_server_types.edit', compact('notification_server_type'));
    }

    /**
     * Update NotificationServerType in storage.
     *
     * @param  \App\Http\Requests\UpdateNotificationServerTypesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNotificationServerTypesRequest $request, $id)
    {
        if (! Gate::allows('notification_server_type_edit')) {
            return abort(401);
        }
        $notification_server_type = NotificationServerType::findOrFail($id);
        $notification_server_type->update($request->all());



        return redirect()->route('admin.notification_server_types.index');
    }


    /**
     * Display NotificationServerType.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('notification_server_type_view')) {
            return abort(401);
        }
        $aggregation_servers = \App\AggregationServer::where('notification_server_type_id', $id)->get();$syncservers = \App\Syncserver::where('notification_server_type_id', $id)->get();

        $notification_server_type = NotificationServerType::findOrFail($id);

        return view('admin.notification_server_types.show', compact('notification_server_type', 'aggregation_servers', 'syncservers'));
    }


    /**
     * Remove NotificationServerType from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('notification_server_type_delete')) {
            return abort(401);
        }
        $notification_server_type = NotificationServerType::findOrFail($id);
        $notification_server_type->delete();

        return redirect()->route('admin.notification_server_types.index');
    }

    /**
     * Delete all selected NotificationServerType at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('notification_server_type_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = NotificationServerType::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore NotificationServerType from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('notification_server_type_delete')) {
            return abort(401);
        }
        $notification_server_type = NotificationServerType::onlyTrashed()->findOrFail($id);
        $notification_server_type->restore();

        return redirect()->route('admin.notification_server_types.index');
    }

    /**
     * Permanently delete NotificationServerType from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('notification_server_type_delete')) {
            return abort(401);
        }
        $notification_server_type = NotificationServerType::onlyTrashed()->findOrFail($id);
        $notification_server_type->forceDelete();

        return redirect()->route('admin.notification_server_types.index');
    }
}
