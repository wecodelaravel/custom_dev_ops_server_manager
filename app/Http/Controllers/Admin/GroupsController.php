<?php

namespace App\Http\Controllers\Admin;

use App\ChannelServer;
use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGroupsRequest;
use App\Http\Requests\Admin\UpdateGroupsRequest;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use GuzzleHttp\TransferStats;
use Illuminate\Support\Arr;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Stream\Stream;
use App\Channel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Jobs\ServerExistsCheck;
use App\Jobs\CaipyIsSetupCheck;
use App\Jobs\CheckIfReadyForConfs;


class GroupsController extends Controller
{

    /**
     * Display Group.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        if (! Gate::allows('group_view')) {
            return abort(401);
        }

        $instances = \App\Instance::where('group_id', $id)->get();
        $channel_servers = \App\ChannelServer::where('group_id', $id)->get();
        $aggregation_servers = \App\AggregationServer::where('group_id', $id)->get();
        $syncservers = \App\Syncserver::where('group_id', $id)->get();
        $hosts = \App\Host::where('group_id', $id)->get();
        $group = \App\Group::findOrFail($id);

        ServerExistsCheck::dispatchNow($group->id);
        CaipyIsSetupCheck::dispatchNow($group->id);
        CheckIfReadyForConfs::dispatchNow($group->id);


        $cs_confs ="";

        foreach($channel_servers as $channel_server)
        {
            $host = DB::table('hosts')->where('id', $channel_server->host_id)->value('host');

            if (! file_exists(public_path().'/configs/cs/'. $host)) {
              $contents = "";
              File::makeDirectory(public_path().'/configs/cs/'. $host. '/',0777, true);
              // File::put(public_path().'/configs/cs/'. $host .'/ChannelServer.conf', $contents);
              // File::put(public_path().'/configs/cs/'. $host .'/ChannelIDs.conf', $contents);
              // File::put(public_path().'/configs/cs/'. $host .'/settings.conf', $contents);

              $channelserverconf = public_path('configs/cs/'. $channel_server->cs_host.'/ChannelServer.conf');
              $cschannelidsconf = public_path('configs/cs/'. $channel_server->cs_host.'/ChannelIDs.conf');
              $cssettingsconf = public_path('configs/cs/'. $channel_server->cs_host.'/settings.conf');

                //dd($cssettingsconf);

              $cs_config_files = [
                    "ChannelIDs" => (file_exists($channelserverconf) ? File::get($channelserverconf): ''),
                    "ChannelServer" => (file_exists($cschannelidsconf) ? File::get($cschannelidsconf): ''),
                    "Settings" => (file_exists($cssettingsconf) ? File::get($cssettingsconf): ''),
              ];
              foreach ($cs_config_files as $key => $filename)
              {
                  $cs_confs .= "@CAIPYCFG=" . $key . PHP_EOL;
                  $cs_confs .= $filename . PHP_EOL;
              }
            }
            $cs_body = $cs_confs;
            // dd($cs_body);
        }

        $ss_confs ="";

        foreach($syncservers as $syncserver)
        {
            $host = DB::table('hosts')->where('id', $syncserver->host_id)->value('host');

            if (! file_exists(public_path().'/configs/ss/'. $host)) {
              $contents = "";
              File::makeDirectory(public_path().'/configs/ss/'. $host. '/',0777, true);
              // File::put(public_path().'/configs/ss/'. $host .'/SyncServer.conf', $contents);
              // File::put(public_path().'/configs/ss/'. $host .'/ChannelIDs.conf', $contents);
              // File::put(public_path().'/configs/ss/'. $host .'/settings.conf', $contents);

              $syncserverconf = public_path('configs/ss/'. $syncserver->ss_host_url.'/SyncServer.conf');
              $ss_channelids_conf = public_path('configs/ss/'. $syncserver->ss_host_url.'/ChannelIDs.conf');
              $ss_settings_conf = public_path('configs/ss/'. $syncserver->ss_host_url.'/settings.conf');
              $ss_config_files = [
                  "ChannelIDs" => File::get($syncserverconf),
                  "SyncServer" => File::get($ss_channelids_conf),
                  "Settings" => File::get($ss_settings_conf),
              ];
              foreach ($ss_config_files as $key => $filename)
              {
                  $ss_confs .= "@CAIPYCFG=" . $key . PHP_EOL;
                  $ss_confs .= $filename . PHP_EOL;
              }

            }


        }

        $as_confs = [];

        foreach($aggregation_servers as $aggregation_server)
        {
            $host = DB::table('hosts')->where('id', $aggregation_server->host_id)->value('host');
            if (! file_exists(public_path().'/configs/as/'. $host)) {
              $contents = "";
              File::makeDirectory(public_path().'/configs/as/'. $host. '/',0777, true);
              // File::put(public_path().'/configs/as/'. $host .'/SyncServer.conf', $contents);
              // File::put(public_path().'/configs/as/'. $host .'/ChannelIDs.conf', $contents);
              // File::put(public_path().'/configs/as/'. $host .'/settings.conf', $contents);
              $aggregation_serverconf = public_path('/configs/as/'. $host .'/SyncServer.conf');
              $as_channelids_conf = public_path('/configs/as/'. $host .'/ChannelIDs.conf');
              $as_settings_conf = public_path('/configs/as/'. $host .'/settings.conf');
              $as_config_files = [
                  "ChannelIDs" => File::get($aggregation_serverconf),
                  "SyncServer" => File::get($as_channelids_conf),
                  "Settings" => File::get($as_settings_conf),
              ];
              foreach ($as_config_files as $key => $filename)
              {
                  $as_confs .= "@CAIPYCFG=" . $key . PHP_EOL;
                  $as_confs .= $filename . PHP_EOL;
              }
            }
            /**
             * check to see if server exists
             */
            // if(UR_exists("http://" . $host)) { DB::table('hosts')->where('id', $aggregation_server->host_id)->update(['server_exists' => '1']); }else{ DB::table('hosts')->where('id', $aggregation_server->host_id)->update(['server_exists' => '0']); }
            // if(UR_exists("http://" . $host. '/ftp/php/phpcheck.php?json')) { DB::table('hosts')->where('id', $aggregation_server->host_id)->update(['caipy_is_setup' => '1']); }else{ DB::table('hosts')->where('id', $aggregation_server->host_id)->update(['caipy_is_setup' => '0']); }
            // if(UR_exists("http://" . $host. '/ftp/php/config.php')) { DB::table('hosts')->where('id', $aggregation_server->host_id)->update(['ready_to_receive_conf' => '1']); }else{ DB::table('hosts')->where('id', $aggregation_server->host_id)->update(['ready_to_receive_conf' => '0']); }
        }










        return view('admin.groups.show', compact('group', 'instances', 'channel_servers', 'aggregation_servers', 'syncservers', 'hosts', 'channelserverconf', 'cschannelidsconf', 'cssettingsconf', 'cs_confs', 'client', 'cs_body', 'ss_confs', 'as_confs'));
    }



















    /**
     * Display a listing of Group.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
   {
       if (! Gate::allows('group_access')) {
           return abort(401);
       }

       if (request()->ajax()) {
           $query = Group::query();
           $template = 'actionsTemplate';
           if(request('show_deleted') == 1) {

               if (! Gate::allows('group_delete')) {
                   return abort(401);
               }
               $query->onlyTrashed();
               $template = 'restoreTemplate';
           }
           $query->select([
               'groups.id',
               'groups.group',
               'groups.cs_token',
               'groups.details',
               'groups.notes',
           ]);
           $table = Datatables::of($query);

           $table->setRowAttr([
               'data-entry-id' => '{{$id}}',
           ]);
           $table->addColumn('massDelete', '&nbsp;');
           $table->addColumn('actions', '&nbsp;');
           $table->editColumn('actions', function ($row) use ($template) {
               $gateKey  = 'group_';
               $routeKey = 'admin.groups';

               return view($template, compact('row', 'gateKey', 'routeKey'));
           });
           $table->editColumn('group', function ($row) {
               return $row->group ? $row->group : '';
           });
           $table->editColumn('cs_token', function ($row) {
               return $row->cs_token ? $row->cs_token : '';
           });
           $table->editColumn('details', function ($row) {
               return $row->details ? $row->details : '';
           });
           $table->editColumn('notes', function ($row) {
               return $row->notes ? $row->notes : '';
           });

           $table->rawColumns(['actions','massDelete']);

           return $table->make(true);
       }

       return view('admin.groups.index');
   }

    /**
     * Show the form for creating new Group.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('group_create')) {
            return abort(401);
        }
        return view('admin.groups.create');
    }

    /**
     * Store a newly created Group in storage.
     *
     * @param  \App\Http\Requests\StoreGroupsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupsRequest $request)
    {
        if (! Gate::allows('group_create')) {
            return abort(401);
        }
        $group = Group::create($request->all());

        \Session::put(['group' => $group->group]);

        return redirect()->route('admin.groups.index');
    }


    /**
     * Show the form for editing Group.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('group_edit')) {
            return abort(401);
        }
        $group = Group::findOrFail($id);

        return view('admin.groups.edit', compact('group'));
    }

    /**
     * Update Group in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupsRequest $request, $id)
    {
        if (! Gate::allows('group_edit')) {
            return abort(401);
        }
        $group = Group::findOrFail($id);
        $group->update($request->all());



        return redirect()->route('admin.groups.index');
    }




    /**
     * Remove Group from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('group_delete')) {
            return abort(401);
        }
        $group = Group::findOrFail($id);
        $group->delete();

        return redirect()->route('admin.groups.index');
    }

    /**
     * Delete all selected Group at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('group_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Group::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Group from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('group_delete')) {
            return abort(401);
        }
        $group = Group::onlyTrashed()->findOrFail($id);
        $group->restore();

        return redirect()->route('admin.groups.index');
    }

    /**
     * Permanently delete Group from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('group_delete')) {
            return abort(401);
        }
        $group = Group::onlyTrashed()->findOrFail($id);
        $group->forceDelete();

        return redirect()->route('admin.groups.index');
    }
}
