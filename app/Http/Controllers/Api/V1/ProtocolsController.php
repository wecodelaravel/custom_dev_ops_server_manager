<?php

namespace App\Http\Controllers\Api\V1;

use App\Protocol;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProtocolsRequest;
use App\Http\Requests\Admin\UpdateProtocolsRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class ProtocolsController extends Controller
{
    public function index()
    {
        return Protocol::all();
    }

    public function show($id)
    {
        return Protocol::findOrFail($id);
    }

    public function update(UpdateProtocolsRequest $request, $id)
    {
        $protocol = Protocol::findOrFail($id);
        $protocol->update($request->all());
        

        return $protocol;
    }

    public function store(StoreProtocolsRequest $request)
    {
        $protocol = Protocol::create($request->all());
        

        return $protocol;
    }

    public function destroy($id)
    {
        $protocol = Protocol::findOrFail($id);
        $protocol->delete();
        return '';
    }
}
