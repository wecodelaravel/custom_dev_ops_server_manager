<?php

namespace App\Http\Controllers\Api\V1;

use App\Environment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEnvironmentsRequest;
use App\Http\Requests\Admin\UpdateEnvironmentsRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class EnvironmentsController extends Controller
{
    public function index()
    {
        return Environment::all();
    }

    public function show($id)
    {
        return Environment::findOrFail($id);
    }

    public function update(UpdateEnvironmentsRequest $request, $id)
    {
        $environment = Environment::findOrFail($id);
        $environment->update($request->all());
        

        return $environment;
    }

    public function store(StoreEnvironmentsRequest $request)
    {
        $environment = Environment::create($request->all());
        

        return $environment;
    }

    public function destroy($id)
    {
        $environment = Environment::findOrFail($id);
        $environment->delete();
        return '';
    }
}
