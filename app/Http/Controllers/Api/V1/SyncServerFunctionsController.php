<?php

namespace App\Http\Controllers\Api\V1;

use App\SyncServerFunction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSyncServerFunctionsRequest;
use App\Http\Requests\Admin\UpdateSyncServerFunctionsRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class SyncServerFunctionsController extends Controller
{
    public function index()
    {
        return SyncServerFunction::all();
    }

    public function show($id)
    {
        return SyncServerFunction::findOrFail($id);
    }

    public function update(UpdateSyncServerFunctionsRequest $request, $id)
    {
        $sync_server_function = SyncServerFunction::findOrFail($id);
        $sync_server_function->update($request->all());
        

        return $sync_server_function;
    }

    public function store(StoreSyncServerFunctionsRequest $request)
    {
        $sync_server_function = SyncServerFunction::create($request->all());
        

        return $sync_server_function;
    }

    public function destroy($id)
    {
        $sync_server_function = SyncServerFunction::findOrFail($id);
        $sync_server_function->delete();
        return '';
    }
}
