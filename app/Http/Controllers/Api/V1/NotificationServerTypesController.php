<?php

namespace App\Http\Controllers\Api\V1;

use App\NotificationServerType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreNotificationServerTypesRequest;
use App\Http\Requests\Admin\UpdateNotificationServerTypesRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class NotificationServerTypesController extends Controller
{
    public function index()
    {
        return NotificationServerType::all();
    }

    public function show($id)
    {
        return NotificationServerType::findOrFail($id);
    }

    public function update(UpdateNotificationServerTypesRequest $request, $id)
    {
        $notification_server_type = NotificationServerType::findOrFail($id);
        $notification_server_type->update($request->all());
        

        return $notification_server_type;
    }

    public function store(StoreNotificationServerTypesRequest $request)
    {
        $notification_server_type = NotificationServerType::create($request->all());
        

        return $notification_server_type;
    }

    public function destroy($id)
    {
        $notification_server_type = NotificationServerType::findOrFail($id);
        $notification_server_type->delete();
        return '';
    }
}
