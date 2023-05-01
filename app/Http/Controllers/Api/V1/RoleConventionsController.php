<?php

namespace App\Http\Controllers\Api\V1;

use App\RoleConvention;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRoleConventionsRequest;
use App\Http\Requests\Admin\UpdateRoleConventionsRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class RoleConventionsController extends Controller
{
    public function index()
    {
        return RoleConvention::all();
    }

    public function show($id)
    {
        return RoleConvention::findOrFail($id);
    }

    public function update(UpdateRoleConventionsRequest $request, $id)
    {
        $role_convention = RoleConvention::findOrFail($id);
        $role_convention->update($request->all());
        

        return $role_convention;
    }

    public function store(StoreRoleConventionsRequest $request)
    {
        $role_convention = RoleConvention::create($request->all());
        

        return $role_convention;
    }

    public function destroy($id)
    {
        $role_convention = RoleConvention::findOrFail($id);
        $role_convention->delete();
        return '';
    }
}
