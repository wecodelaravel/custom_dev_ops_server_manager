<?php

namespace App\Http\Controllers\Api\V1;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGroupsRequest;
use App\Http\Requests\Admin\UpdateGroupsRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class GroupsController extends Controller
{
    public function index()
    {
        return Group::all();
    }

    public function show($id)
    {
        return Group::findOrFail($id);
    }

    public function update(UpdateGroupsRequest $request, $id)
    {
        $group = Group::findOrFail($id);
        $group->update($request->all());
        

        return $group;
    }

    public function store(StoreGroupsRequest $request)
    {
        $group = Group::create($request->all());
        

        return $group;
    }

    public function destroy($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();
        return '';
    }
}
