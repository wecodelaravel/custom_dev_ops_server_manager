<?php

namespace App\Http\Controllers\Admin;

use App\Csi;
use App\Cso;
use App\ChannelServer;
use App\AggregationServer;
use App\SyncServer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreChannelServersRequest;
use App\Http\Requests\Admin\UpdateChannelServersRequest;
use Yajra\DataTables\DataTables;
use \DateTime;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreChannelRequest;
use App\Http\Requests\UpdateChannelRequest;
use GuzzleHttp\Client;
use Illuminate\Support\Arr;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Stream\Stream;
use App\Helpers\General;
use Illuminate\Support\Str;
use App\Jobs\GetDevChannels;
use App\Jobs\GetBetaChannels;
use App\Jobs\GetQAChannels;
use Illuminate\Support\Facades\Storage;
use File;
use App\Helpers\ChannelIDs;
use App\Protocol;
use App\Channel;


class ChannelServersController extends Controller
{

    /**
     * Display a listing of ChannelServer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('channel_server_access')) {
            return abort(401);
        }

        if (request()->ajax()) {
            $query = ChannelServer::query();
            $query->with("group");
            $query->with("host");
            $addtemplate = 'addTemplate';
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {

                if (! Gate::allows('channel_server_delete')) {
                    return abort(401);
                }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'channel_servers.id',
                'channel_servers.group_id',
                'channel_servers.cs_name',
                'channel_servers.cs_host',
                'channel_servers.cs_host_ip',
                'channel_servers.cs_token',
                'channel_servers.notes',
                'channel_servers.username',
                'channel_servers.password',
                'channel_servers.host_id',
                'channel_servers.license',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');

            $table->addColumn('add', '&nbsp;');
            $table->editColumn('add', function ($row) use ($addtemplate) {
                $addCsi = 'admin.csis.create';
                return view($addtemplate, compact('row','addCsi'));
            });

            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'channel_server_';
                $routeKey = 'admin.channel_servers';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });

            $table->editColumn('group.group', function ($row) {
                return $row->group ? $row->group->group : '';
            });
            $table->editColumn('cs_name', function ($row) {
                return $row->cs_name ? $row->cs_name : '';
            });
            $table->editColumn('cs_host', function ($row) {
                return $row->cs_host ? $row->cs_host : '';
            });
            $table->editColumn('cs_host_ip', function ($row) {
                return $row->cs_host_ip ? $row->cs_host_ip : '';
            });
            $table->editColumn('cs_token', function ($row) {
                return $row->cs_token ? $row->cs_token : '';
            });
            $table->editColumn('notes', function ($row) {
                return $row->notes ? $row->notes : '';
            });
            $table->editColumn('username', function ($row) {
                return $row->username ? $row->username : '';
            });
            $table->editColumn('password', function ($row) {
                return '---';
            });
            $table->editColumn('host.name', function ($row) {
                return $row->host ? $row->host->name : '';
            });
            $table->editColumn('license', function ($row) {
                return $row->license ? $row->license : '';
            });

            $table->rawColumns(['add', 'actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.channel_servers.index');
    }

    /**
     * Show the form for creating new ChannelServer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('channel_server_create')) {
            return abort(401);
        }

        $groups = \App\Group::get()->pluck('group', 'id')->prepend(trans('global.app_please_select'), '');
        $hosts = \App\Host::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.channel_servers.create', compact('groups', 'hosts'));
    }

    /**
     * Store a newly created ChannelServer in storage.
     *
     * @param  \App\Http\Requests\StoreChannelServersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChannelServersRequest $request)
    {
        if (! Gate::allows('channel_server_create')) {
            return abort(401);
        }

        $channel_server = ChannelServer::create($request->all());

                $str = $request->cs_name;

                if( strlen( $str ) < 40) {
                    $str = explode( "\n", wordwrap( $str, 30));
                    $str = $str[0] . '!';
                }

                $cs_license = "LIC=ChannelServer-AA-1.0-20991231-". date('Ymd', strtotime($instance->created_at)) . "-DISHCS!" . strtoupper(str_pad($str, 40, "0"));

                try{
                    $host = \App\Host::create([
                            'name'      => $request->cs_name,
                            'host'      => $request->cs_name.".imovetv.com",
                            'group_id'  => $request->group_id,
                            'status_id' => '2',
                            'rc_id'     =>'3',
                    ]);
                    flash()->success("Host Created: " . $request->cs_name.".imovetv.com");
                    \Log::info("Host Created: " . $request->cs_name.".imovetv.com");
                } catch (\Exception $e) {
                    flash()->error($request->cs_name.".imovetv.com Not Created: ". $e->getMessage());
                    \Log::error($request->cs_name.".imovetv.com Not Created: ". $e->getMessage());
                }

                try{
                    \App\ChannelServer::create([
                        'cs_name'  => $request->cs_name,
                        'cs_host'  => $request->cs_name.".imovetv.com",
                        'group_id' => $request->group_id,
                        'host_id'  => $host->id,
                        'license'  => $cs_license
                    ]);

                    flash()->info("Channel Server Created: " . $request->cs_name.".imovetv.com  SUCCESSFULL");

                    \Log::info("Channel Server Created: " .  $request->cs_name);
                } catch (\Exception $e) {
                    flash()->error( $request->cs_name.".imovetv.com  Not Created: ". $e->getMessage());
                    \Log::error( $request->cs_name.".imovetv.com  Not Created: ". $e->getMessage());
                }


        return redirect()->route('admin.channel_servers.index');
    }


    /**
     * Show the form for editing ChannelServer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('channel_server_edit')) {
            return abort(401);
        }

        $groups = \App\Group::get()->pluck('group', 'id')->prepend(trans('global.app_please_select'), '');
        $hosts = \App\Host::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $channel_server = ChannelServer::findOrFail($id);

        return view('admin.channel_servers.edit', compact('channel_server', 'groups', 'hosts'));
    }

    /**
     * Update ChannelServer in storage.
     *
     * @param  \App\Http\Requests\UpdateChannelServersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChannelServersRequest $request, $id)
    {
        if (! Gate::allows('channel_server_edit')) {
            return abort(401);
        }
        $channel_server = ChannelServer::findOrFail($id);
        $channel_server->update($request->all());

        return redirect()->route('admin.channel_servers.index');
    }


    /**
     * Display ChannelServer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('channel_server_view')) {
            return abort(401);
        }

        $groups = \App\Group::get()->pluck('group', 'id')->prepend(trans('global.app_please_select'), '');
        $hosts = \App\Host::get()->pluck('host', 'id')->prepend(trans('global.app_please_select'), '');
        $csis = \App\Csi::where('channel_server_id', $id)->get();
        $aggregation_servers = \App\AggregationServer::where('channel_server_id', $id)->get();
        $csos = \App\Cso::where('channel_server_id', $id)->get();
        $instances = \App\Instance::where('channel_server_id', $id)->get();
        $syncservers = \App\Syncserver::where('channel_server_id', $id)->get();


        $channel_server      = ChannelServer::findOrFail($id);

        return view('admin.channel_servers.show', compact('channel_server', 'csis', 'aggregation_servers', 'csos', 'instances', 'syncservers'));
    }


    /**
     * Remove ChannelServer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('channel_server_delete')) {
            return abort(401);
        }
        $channel_server = ChannelServer::findOrFail($id);
        $channel_server->delete();

        return redirect()->route('admin.channel_servers.index');
    }

    /**
     * Delete all selected ChannelServer at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('channel_server_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ChannelServer::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore ChannelServer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('channel_server_delete')) {
            return abort(401);
        }
        $channel_server = ChannelServer::onlyTrashed()->findOrFail($id);
        $channel_server->restore();

        return redirect()->route('admin.channel_servers.index');
    }

    /**
     * Permanently delete ChannelServer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('channel_server_delete')) {
            return abort(401);
        }
        $channel_server = ChannelServer::onlyTrashed()->findOrFail($id);
        $channel_server->forceDelete();

        return redirect()->route('admin.channel_servers.index');
    }


    public function generateChannelServer(ChannelServer $channel_server, $id, $contents = null)
    {
        $channel_server      = ChannelServer::findOrFail($id);
        $groups = \App\Group::get()->pluck('group', 'id')->prepend(trans('global.app_please_select'), '');
        $hosts = \App\Host::get()->pluck('host', 'id')->prepend(trans('global.app_please_select'), '');
        $csis = \App\Csi::where('channel_server_id', $id)->get();

        $aggregation_servers = \App\AggregationServer::where('channel_server_id', $id)->get();
        $csos = \App\Cso::where('channel_server_id', $id)->get();
        $instances = \App\Instance::where('channel_server_id', $id)->get();
        $syncservers = \App\Syncserver::where('channel_server_id', $id)->get();
        $channels = \App\Channel::where('id', $id)->get();
        $date = \Carbon\Carbon::now();
        // $select_aggregation_server_for_as = \App\AggregationServer::get()->pluck('as_host_url', 'id')->prepend(trans('global.app_please_select'), '');
        // $select_sync_server_for_as = \App\Syncserver::get()->pluck('ss_host_url', 'id')->prepend(trans('global.app_please_select'), '');
        // $select_aggregation_server_for_bs = \App\AggregationServer::get()->pluck('as_host_url', 'id')->prepend(trans('global.app_please_select'), '');
        // $select_sync_server_for_bs = \App\Syncserver::get()->pluck('ss_host_url', 'id')->prepend(trans('global.app_please_select'), '');

        $str = $channel_server->cs_name;

        if( strlen( $str ) < 40) {
            $str = explode( "\n", wordwrap( $str, 30));
            $str = $str[0] . '!';
        }


        $csis_count         = 0;
        $csos_count         = 0;


        $channelserverpath   = public_path('configs/cs/'. $channel_server->cs_host);

        File::isDirectory($channelserverpath) or File::makeDirectory($channelserverpath, 0777, true, true);

        if (file_exists($channelserverpath))
        {
            $contents   = [];
            $contents   = "[INPUT]\n";

            // if(count($csis) >= 0) {
            if($csis)  {
                foreach ($csis as $csi) {

                        if ($csi->protocol->protocol == 'UDP') {
                            $contents .= "CID" . $csis_count . "=" . @$csi->channel->id . "&PROTOCOL" . $csis_count . "=" . @$csi->protocol->protocol . "&URL" . $csis_count . "=" . @$csi->move_path . "\n";
                        } elseif ($csi->protocol->protocol == 'MOVE') {
                            $contents .= "CID" . $csis_count . "=" . @$csi->channel->id . "&PROTOCOL" . $csis_count . "=" . @$csi->protocol->protocol . "&URL" . $csis_count . "=" . @$csi->move_path . "\n";
                        // } else {
                            // $contents .= "CID" . $csis_count . "=" . @$csi->channel->id . "&PROTOCOL" . $csis_count . "=" . @$csi->protocol->protocol . "&SSM" . $csis_count . "=" . @$csi->channel->ssm . "&IMC" . $csis_count . "=" . @$csi->channel->imc . "&IP" . $csis_count . "=" . @$csi->channel->source_ip . "&PID" . $csis_count . "=" . @$csi->channel->pid . "\n";
                        }
                        $csis_count++;
                }
                foreach (range($csis->count(), 19) as $index) {
                    $contents .= "CID" . $index . "=&PROTOCOL" . $index . "=&SSM" . $index . "=&IMC" . $index . "=&IP" . $index . "=&PID" . $index . "="."\n";
                }
            }



            $contents .= "\n";


            $contents .= "[OUTPUT]\n";
            if(count($csos) > 0) {
                    foreach ($csos as $cso) {


                        if($cso->use_custom_a){
                            $contents .= 'OCLOUD_A_'.$csos_count.'='.$cso->ocloud_a .'&OCP_A_'.$csos_count.'='.$cso->ocp_a;
                        }
                        elseif($cso->use_sync_server_for_a){
                            $contents .= 'OCLOUD_A_'.$csos_count.'='.$cso->select_sync_server_for_a->ss_host_url .'&OCP_A_'.$csos_count.'=8080';
                        }
                        elseif($cso->use_as_for_a){
                            $contents .= 'OCLOUD_A_'.$csos_count.'='.$cso->select_aggregation_server_for_a->as_host_url .'&OCP_A_'.$csos_count.'=8080';
                        // }else{
                            // $contents .= 'OCLOUD_A_'.$csos_count.'=&OCP_A_'.$csos_count.'=';
                        }

                        if($cso->use_custom_a){
                            $contents .= '&OCLOUD_B_'.$csos_count.'='.$cso->ocloud_b .'&OCP_B_'.$csos_count.'='.$cso->ocp_b."\n";
                        }
                        elseif($cso->use_sync_server_for_b){
                            $contents .= '&OCLOUD_B_'.$csos_count.'='. $cso->select_sync_server_for_b->ss_host_url .'&OCP_B_'.$csos_count.'=8080'."\n";
                        }
                        elseif($cso->use_as_for_b){
                            $contents .= '&OCLOUD_B_'.$csos_count.'='. $cso->select_aggregation_server_for_b->as_host_url .'&OCP_B_'.$csos_count.'=8080'."\n";
                        // }else{
                            // $contents .= '&OCLOUD_B_'.$csos_count.'=&OCP_B_'.$csos_count.'='."\n";
                        }
                        $csos_count++;
                    }
                    foreach (range($csos->count(), 19) as $index2) {
                        $contents .= 'OCLOUD_A_'. $index2 . '=&OCP_A_'. $index2 . '=&OCLOUD_B_'. $index2 . '=&OCP_B_'. $index2 . '='."\n";
                    }

            }




            $contents .= "\n";
            $contents .= "[LICENSE]\n";
            $contents .= "LIC=ChannelServer-AA-1.0-20991231-". date('Ymd', strtotime($channel_server->created_at)) . "-DISHCS!" . strtoupper(str_pad($str, 40, "0")) . "\n";
            // $contents .= . "\n";
            $contents .= "\n";
            $contents .= "[PARAMETERS]\n";
            $contents .= "WAVINPUT=0\n";
            $contents .= "\n";

            File::put($channelserverpath . '/ChannelServer.conf', $contents);

        }

        return view('preview.cs.channel_server', compact('channel_server', 'csis', 'aggregation_servers', 'csos', 'instances', 'syncservers', 'date'));
    }

    public function generateModelChannelServer(ChannelServer $channel_server, $id, $contents = null)
    {

        $channel_server      = ChannelServer::findOrFail($id);
        $groups              = \App\Group::get()->pluck('group', 'id')->prepend(trans('global.app_please_select'), '');
        $hosts               = \App\Host::get()->pluck('host', 'id')->prepend(trans('global.app_please_select'), '');
        $csis                = \App\Csi::where('channel_server_id', $id)->get();

        $aggregation_servers = \App\AggregationServer::where('channel_server_id', $id)->get();
        $csos                = \App\Cso::where('channel_server_id', $id)->get();
        $instances           = \App\Instance::where('channel_server_id', $id)->get();
        $syncservers         = \App\Syncserver::where('channel_server_id', $id)->get();
        $channels            = \App\Channel::where('id', $id)->get();

        return view('preview.cs.modal-cs', compact('channel_server', 'csis', 'aggregation_servers', 'csos', 'instances', 'syncservers'));

    }


    public function generateChannelids(ChannelServer $channel_server, $id, $contents = null)
    {
        $channel_server      = ChannelServer::findOrFail($id);
        $csis                = Csi::where('channel_server_id', $id)->get();

        $csis_count          = 0;
        $channelserverpath   = public_path('configs/cs/'. $channel_server->cs_host);

        File::isDirectory($channelserverpath) or File::makeDirectory($channelserverpath, 0777, true, true);

        if (file_exists($channelserverpath))
        {
            $contents   = [];
            $contents   = '';
            foreach ($csis as $csi) {
                $contents .= $csi->channel->source_name. "," .$csi->channel->env ."\n";
            }

            // dd($contents);

            File::put($channelserverpath . '/ChannelIDs.conf', $contents);
        }
        return view('preview.cs.channelids', compact('channel_server', 'csis', 'aggregation_servers', 'csos', 'instances', 'syncservers'));

    }

    public function generateModelChannelids(ChannelServer $channel_server, $id, $contents = null)
    {
        $channel_server      = ChannelServer::findOrFail($id);
        $groups              = \App\Group::get()->pluck('group', 'id')->prepend(trans('global.app_please_select'), '');
        $hosts               = \App\Host::get()->pluck('host', 'id')->prepend(trans('global.app_please_select'), '');
        $csis                = \App\Csi::where('channel_server_id', $id)->get();

        $aggregation_servers = \App\AggregationServer::where('channel_server_id', $id)->get();
        $csos                = \App\Cso::where('channel_server_id', $id)->get();
        $instances           = \App\Instance::where('channel_server_id', $id)->get();
        $syncservers         = \App\Syncserver::where('channel_server_id', $id)->get();
        $channels            = \App\Channel::where('id', $id)->get();


        return view('preview.cs.modal-channelids', compact('channel_server', 'csis', 'aggregation_servers', 'csos', 'instances', 'syncservers'));
    }

    public function generateSettings(ChannelServer $channel_server, $id, $contents = null)
    {
        $csis                = \App\Csi::where('channel_server_id', $id)->get();
        $aggregation_servers = \App\AggregationServer::where('channel_server_id', $id)->get();
        $csos                = \App\Cso::where('channel_server_id', $id)->get();
        $instances           = \App\Instance::where('channel_server_id', $id)->get();
        $syncservers         = \App\Syncserver::where('channel_server_id', $id)->get();

        $channel_server      = ChannelServer::findOrFail($id);

        $settings_count      = 0;
        $channelserverpath   = public_path('configs/cs/'. $channel_server->cs_host);

        File::isDirectory($channelserverpath) or File::makeDirectory($channelserverpath, 0777, true, true);

        if (file_exists($channelserverpath))
        {
            $contents = [];
            $contents = "[AUTHENTIFICATION]\n";
            $contents .= "username=". $channel_server->username."\n";
            $contents .= "password=". $channel_server->password."\n";
            $contents .= "\n";

            File::put($channelserverpath . '/settings.conf', $contents);
        }

        return view('preview.cs.settings', compact('channel_server'));
    }

    public function generateModelSettings(ChannelServer $channel_server, $id, $contents = null)
    {
        $csis                = \App\Csi::where('channel_server_id', $id)->get();
        $aggregation_servers = \App\AggregationServer::where('channel_server_id', $id)->get();
        $csos                = \App\Cso::where('channel_server_id', $id)->get();
        $instances           = \App\Instance::where('channel_server_id', $id)->get();
        $syncservers         = \App\Syncserver::where('channel_server_id', $id)->get();

        $channel_server      = ChannelServer::findOrFail($id);

        $settings_count      = 0;
        $channelserverpath   = public_path('configs/cs/'. $channel_server->cs_host);

        return view('preview.cs.modal-settings', compact('channel_server', 'csis', 'aggregation_servers', 'csos', 'instances', 'syncservers'));
    }
}
