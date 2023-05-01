<?php

namespace App\Http\Controllers\Api\V1;

use App\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreStatusesRequest;
use App\Http\Requests\Admin\UpdateStatusesRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class StatusesController extends Controller
{
    public function index()
    {
        return Status::all();
    }

    public function show($id)
    {
        return Status::findOrFail($id);
    }

    public function update(UpdateStatusesRequest $request, $id)
    {
        $status = Status::findOrFail($id);
        $status->update($request->all());
        

        return $status;
    }

    public function store(StoreStatusesRequest $request)
    {
        $status = Status::create($request->all());
        

        return $status;
    }

    public function destroy($id)
    {
        $status = Status::findOrFail($id);
        $status->delete();
        return '';
    }
}
