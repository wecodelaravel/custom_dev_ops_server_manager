<?php

namespace App\Http\Controllers;

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
use Illuminate\Support\Arr;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Stream\Stream;
use App\Channel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Blade;
use App\Jobs\GetDevChannels;
use App\Jobs\GetBetaChannels;
use App\Jobs\GetQAChannels;

class HomeController extends Controller
{
    protected $groups;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Group $groups)
    {
        $this->middleware('auth');
        $this->group = $groups;

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $channelservers = \App\ChannelServer::latest()->limit(5)->get();
        $channels = \App\Channel::latest()->limit(5)->get();
        $csis = \App\Csi::latest()->limit(5)->get();


        try {
            \Log::info("I am dispatching in the background the update for dev channels.");

            GetDevChannels::dispatch()->onQueue('processing');
        } catch (\Exception $e) {
            Log::alert($e);
        }

        try {
            GetBetaChannels::dispatch()->onQueue('processing');
        } catch (\Exception $e) {
            Log::warning($e);
        }

        try {
            GetQAChannels::dispatch()->onQueue('processing');
        } catch (\Exception $e) {
            Log::warning($e);
        }

        return view('home', compact( 'channelservers', 'channels', 'csis' ));
    }


    function insert(Request $request)
    {
        if($request->ajax())
        {
            $rules = [];
            $error = \Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }
            $now = Carbon::now();

            $channel_server_id = $request->channel_server_id;
            $channel_id = $request->channel_id;
            $move_path = $request->move_path;
            $protocol_id  = $request->protocol_id;

            for($count = 0; $count < count($move_path); $count++)
            {
                $data = array(
                    'channel_server_id' => $channel_server_id[$count],
                    'channel_id' => $channel_id[$count],
                    'move_path' => $move_path[$count],
                    'protocol_id'  => $protocol_id[$count],
                    'updated_at' => $now,
                    'created_at' => $now
                );

                Csi::insert($data);
            }

            foreach($request->channel_server_id as $key => $v)
            {
                $data = array(
                    'channel_server_id' => $channel_server_id[$key],
                    'channel_id' => $channel_id[$key],
                    'updated_at' => $now,
                    'created_at' => $now
                );
                Cso::insert($data);
            }

            return response()->json([
                'success'  => 'CSI Data Added successfully.'
            ]);
            flash()->success("Successfully added channel server inputs and outputs");

        }
    }

    public function global(Request $request, $id = '')
    {
        $groups = \App\Group::orderBy('group','asc')->pluck('group', 'id');
        // $groups = \App\Group::get()->pluck('group_id', 'id')->prepend(trans('global.app_please_select'), '');
        $group = '';

        $client = new Client([
            'headers' => ['content-type' => 'application/json', 'Accept'  => 'application/json'],
        ]);

        // \Session::pull('group');
        if($request->session()->has('group')){
            // $request->session()->get('group');
            $group = Group::findOrFail($request->session()->get('group'));
            // dd($group);
        }

        $hosts = \App\Host::all();

        if (Input::get('group')) {
            $group = Group::findOrFail(Input::get('group'));
            $search_params['group'] = Input::get('group');
            $group_id = $group->id;

            \Session::put(['group' => $group]);
        }

        if(isset($group))
        {
            $group = Group::findOrFail($group->id);
            $id = $group->id;
            $instances = \App\Instance::where('group_id', $id)->get();
            $channel_servers = \App\ChannelServer::where('group_id', $id)->get();
            $aggregation_servers = \App\AggregationServer::where('group_id', $id)->get();
            $syncservers = \App\Syncserver::where('group_id', $id)->get();
            $hosts = \App\Host::where('group_id', $id)->get();

            // \Session::put(['group' => $group->group]);

            // $group= \App\Group::find(Input::get('group'))->group_id;
            // $name = $request->input('name');
            // $roles = \App\Role::whereHas('permission', function ($query) use ($id) { $query->where('id', $id); })->get();

            $cs_confs ="";

            foreach($channel_servers as $channel_server)
            {
                    // $host = ChannelServer::with('host')->get();
                    // $host = \App\Host::has('channel_server', 'host_id')->get();
                $host = DB::table('hosts')->where('id', $channel_server->host_id)->value('host');

                $channelserverconf = File::get(public_path('configs/cs/'. $channel_server->cs_host.'/ChannelServer.conf'));
                $cschannelidsconf = File::get(public_path('configs/cs/'. $channel_server->cs_host.'/ChannelIDs.conf'));
                $cssettingsconf = File::get(public_path('configs/cs/'. $channel_server->cs_host.'/settings.conf'));

                    // dd($host);

                $cs_config_files = [
                    "ChannelIDs" => $channelserverconf,
                    "ChannelServer" => $cschannelidsconf,
                    "Settings" => $cssettingsconf,
                ];

                foreach ($cs_config_files as $key => $filename)
                {
                    $cs_confs .= "@CAIPYCFG=" . $key . PHP_EOL;
                    $cs_confs .= $filename . PHP_EOL;
                }

                    //  $body = fopen('/path/to/file', 'r');
                $body = $cs_confs;
                // var_dump($body);
              //  $r = $client->request('POST', "http://" . $host, ['body' => $body]);
            }

            $ss_confs ="";

            foreach($syncservers as $syncserver)
            {
                $host = DB::table('hosts')->where('id', $syncserver->host_id)->value('host');

                $syncserverconf = File::get(public_path('configs/ss/'. $syncserver->ss_host_url.'/SyncServer.conf'));
                $sschannelidsconf = File::get(public_path('configs/ss/'. $syncserver->ss_host_url.'/ChannelIDs.conf'));
                $ssettingsconf = File::get(public_path('configs/ss/'. $syncserver->ss_host_url.'/settings.conf'));

                $ss_config_files = [
                    "ChannelIDs" => $sschannelidsconf,
                    "SyncServer" => $syncserverconf,
                    "Settings" => $ssettingsconf,
                ];

                foreach ($ss_config_files as $key => $filename)
                {
                    $ss_confs .= "@CAIPYCFG=" . $key . PHP_EOL;
                    $ss_confs .= $filename . PHP_EOL;
                }

                    //  $body = fopen('/path/to/file', 'r');
                $body = $ss_confs;

                // $r = $client->request('POST', "http://" . $host, ['body' => $body]);

            }

            return view('global', compact('id','group', 'groups', 'instances', 'channel_servers', 'aggregation_servers', 'syncservers', 'hosts', 'channelserverconf', 'cschannelidsconf', 'cssettingsconf', 'cs_confs', 'client', 'ss_confs'));

        }
        else
        {
            return view('global', compact('id','group', 'groups', 'instances', 'channel_servers', 'aggregation_servers', 'syncservers', 'hosts', 'channelserverconf', 'cschannelidsconf', 'cssettingsconf', 'cs_confs', 'client', 'ss_cons'));

        }


//

            // dd($cs_confs);

        // $group = Group::findOrFail($id);

}

    public function tuts()
    {

        $channelservers = \App\ChannelServer::latest()->limit(5)->get();
        $channels = \App\Channel::latest()->limit(5)->get();
        $csis = \App\Csi::latest()->limit(5)->get();


        return view('tuts', compact( 'channelservers', 'channels', 'csis' ));
    }
}
