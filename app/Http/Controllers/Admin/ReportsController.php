<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Host;
use App\Instance;
use App\ChannelServer;
use App\Csi;
use Carbon\Carbon;

class ReportsController extends Controller
{
    public function noteSure(Request $request)
    {
         if ($request->has('date_filter')) {
              $parts = explode(' - ' , $request->input('date_filter'));
              $date_from = Carbon::createFromFormat(config('app.date_format'), $parts[0])->format('Y-m-d');
              $date_to = Carbon::createFromFormat(config('app.date_format'), $parts[1])->format('Y-m-d');
         } else {
              $date_from = new Carbon('last Monday');
              $date_to = new Carbon('this Sunday');
         }
        $reportTitle = 'note sure';
        $reportLabel = 'COUNT';
        $chartType   = 'pie';

        $results = Host::where('created_at', '>=', $date_from)->where('created_at', '<=', $date_to)->get()->sortBy('created_at')->groupBy(function ($entry) {
            if ($entry->created_at instanceof \Carbon\Carbon) {
                return \Carbon\Carbon::parse($entry->created_at)->format('Y-m-d');
            }
            try {
               return \Carbon\Carbon::createFromFormat(config('app.date_format'), $entry->created_at)->format('Y-m-d');
            } catch (\Exception $e) {
                 return \Carbon\Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $entry->created_at)->format('Y-m-d');
            }        })->map(function ($entries, $group) {
            return $entries->sum(function ($entry) {
                return Instance::where('hosts_id', $entry->id)->count('id');
            });
        });

        return view('admin.reports', compact('reportTitle', 'results', 'chartType', 'reportLabel'));
    }

    public function channelServers(Request $request)
    {
         if ($request->has('date_filter')) {
              $parts = explode(' - ' , $request->input('date_filter'));
              $date_from = Carbon::createFromFormat(config('app.date_format'), $parts[0])->format('Y-m-d');
              $date_to = Carbon::createFromFormat(config('app.date_format'), $parts[1])->format('Y-m-d');
         } else {
              $date_from = new Carbon('last Monday');
              $date_to = new Carbon('this Sunday');
         }
        $reportTitle = 'Channel Servers';
        $reportLabel = 'SUM';
        $chartType   = 'line';

        $results = ChannelServer::where('created_at', '>=', $date_from)->where('created_at', '<=', $date_to)->get()->sortBy('created_at')->groupBy(function ($entry) {
            if ($entry->created_at instanceof \Carbon\Carbon) {
                return \Carbon\Carbon::parse($entry->created_at)->format('Y-m-d');
            }
            try {
               return \Carbon\Carbon::createFromFormat(config('app.date_format'), $entry->created_at)->format('Y-m-d');
            } catch (\Exception $e) {
                 return \Carbon\Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $entry->created_at)->format('Y-m-d');
            }        })->map(function ($entries, $group) {
            return $entries->sum(function ($entry) {
                return Csi::where('channel_server_id', $entry->id)->sum('id');
            });
        });

        return view('admin.reports', compact('reportTitle', 'results', 'chartType', 'reportLabel'));
    }

}
