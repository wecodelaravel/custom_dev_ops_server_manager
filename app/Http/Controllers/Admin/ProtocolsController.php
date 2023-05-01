<?php

namespace App\Http\Controllers\Admin;

use App\Protocol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProtocolsRequest;
use App\Http\Requests\Admin\UpdateProtocolsRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class ProtocolsController extends Controller
{
    /**
     * Display a listing of Protocol.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('protocol_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Protocol::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('protocol_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'protocols.id',
                'protocols.protocol',
                'protocols.real_name',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'protocol_';
                $routeKey = 'admin.protocols';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('protocol', function ($row) {
                return $row->protocol ? $row->protocol : '';
            });
            $table->editColumn('real_name', function ($row) {
                return $row->real_name ? $row->real_name : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.protocols.index');
    }

    /**
     * Show the form for creating new Protocol.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('protocol_create')) {
            return abort(401);
        }
        return view('admin.protocols.create');
    }

    /**
     * Store a newly created Protocol in storage.
     *
     * @param  \App\Http\Requests\StoreProtocolsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProtocolsRequest $request)
    {
        if (! Gate::allows('protocol_create')) {
            return abort(401);
        }
        $protocol = Protocol::create($request->all());



        return redirect()->route('admin.protocols.index');
    }


    /**
     * Show the form for editing Protocol.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('protocol_edit')) {
            return abort(401);
        }
        $protocol = Protocol::findOrFail($id);

        return view('admin.protocols.edit', compact('protocol'));
    }

    /**
     * Update Protocol in storage.
     *
     * @param  \App\Http\Requests\UpdateProtocolsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProtocolsRequest $request, $id)
    {
        if (! Gate::allows('protocol_edit')) {
            return abort(401);
        }
        $protocol = Protocol::findOrFail($id);
        $protocol->update($request->all());



        return redirect()->route('admin.protocols.index');
    }


    /**
     * Display Protocol.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('protocol_view')) {
            return abort(401);
        }
        $csis = \App\Csi::where('protocol_id', $id)->get();

        $protocol = Protocol::findOrFail($id);

        return view('admin.protocols.show', compact('protocol', 'csis'));
    }


    /**
     * Remove Protocol from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('protocol_delete')) {
            return abort(401);
        }
        $protocol = Protocol::findOrFail($id);
        $protocol->delete();

        return redirect()->route('admin.protocols.index');
    }

    /**
     * Delete all selected Protocol at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('protocol_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Protocol::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Protocol from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('protocol_delete')) {
            return abort(401);
        }
        $protocol = Protocol::onlyTrashed()->findOrFail($id);
        $protocol->restore();

        return redirect()->route('admin.protocols.index');
    }

    /**
     * Permanently delete Protocol from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('protocol_delete')) {
            return abort(401);
        }
        $protocol = Protocol::onlyTrashed()->findOrFail($id);
        $protocol->forceDelete();

        return redirect()->route('admin.protocols.index');
    }
}
