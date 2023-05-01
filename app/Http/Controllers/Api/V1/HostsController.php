<?php

namespace App\Http\Controllers\Api\V1;

use App\Host;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreHostsRequest;
use App\Http\Requests\Admin\UpdateHostsRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class HostsController extends Controller
{
    public function index()
    {
        return Host::all();
    }

    public function show($id)
    {
        return Host::findOrFail($id);
    }

    public function update(UpdateHostsRequest $request, $id)
    {
        $host = Host::findOrFail($id);
        $host->update($request->all());
        

        return $host;
    }

    public function store(StoreHostsRequest $request)
    {
        $host = Host::create($request->all());
        

        return $host;
    }

    public function destroy($id)
    {
        $host = Host::findOrFail($id);
        $host->delete();
        return '';
    }
}
