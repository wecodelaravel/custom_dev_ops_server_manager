<?php

namespace App\Http\Controllers\Api\V1;

use App\Filter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFiltersRequest;
use App\Http\Requests\Admin\UpdateFiltersRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class FiltersController extends Controller
{
    public function index()
    {
        return Filter::all();
    }

    public function show($id)
    {
        return Filter::findOrFail($id);
    }

    public function update(UpdateFiltersRequest $request, $id)
    {
        $filter = Filter::findOrFail($id);
        $filter->update($request->all());
        

        return $filter;
    }

    public function store(StoreFiltersRequest $request)
    {
        $filter = Filter::create($request->all());
        

        return $filter;
    }

    public function destroy($id)
    {
        $filter = Filter::findOrFail($id);
        $filter->delete();
        return '';
    }
}
