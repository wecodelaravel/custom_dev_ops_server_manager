<?php

namespace App\Http\Controllers\Api\V1;

use App\Instance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreInstancesRequest;
use App\Http\Requests\Admin\UpdateInstancesRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class InstancesController extends Controller
{
    public function index()
    {
        return Instance::all();
    }

    public function show($id)
    {
        return Instance::findOrFail($id);
    }

    public function update(UpdateInstancesRequest $request, $id)
    {
        $instance = Instance::findOrFail($id);
        $instance->update($request->all());
        

        return $instance;
    }

    public function store(StoreInstancesRequest $request)
    {
        $instance = Instance::create($request->all());
        

        return $instance;
    }

    public function destroy($id)
    {
        $instance = Instance::findOrFail($id);
        $instance->delete();
        return '';
    }
}
