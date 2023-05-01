<?php

namespace App\Http\Controllers\Api\V1;

use App\Syncserver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSyncserversRequest;
use App\Http\Requests\Admin\UpdateSyncserversRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class SyncserversController extends Controller
{
    public function index()
    {
        return Syncserver::all();
    }

    public function show($id)
    {
        return Syncserver::findOrFail($id);
    }

    public function update(UpdateSyncserversRequest $request, $id)
    {
        $syncserver = Syncserver::findOrFail($id);
        $syncserver->update($request->all());
        

        return $syncserver;
    }

    public function store(StoreSyncserversRequest $request)
    {
        $syncserver = Syncserver::create($request->all());
        

        return $syncserver;
    }

    public function destroy($id)
    {
        $syncserver = Syncserver::findOrFail($id);
        $syncserver->delete();
        return '';
    }
}
