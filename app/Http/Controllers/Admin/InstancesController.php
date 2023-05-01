<?php

namespace App\Http\Controllers\Admin;

use App\Instance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreInstancesRequest;
use App\Http\Requests\Admin\UpdateInstancesRequest;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use File;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class InstancesController extends Controller
{
    /**
     * Display a listing of Instance.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('instance_access')) {
            return abort(401);
        }

        if (request()->ajax()) {
            $query = Instance::query();
            $query->with("group");
            $query->with("role_convention");
            $query->with("channel_server");
            $query->with("aggregation_server");
            $query->with("env");
            $query->with("hosts");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {

                if (! Gate::allows('instance_delete')) {
                    return abort(401);
                }

                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }

            $query->select([
                'instances.id',
                'instances.group_id',
                'instances.quantity_to_create',
                'instances.role_convention_id',
                'instances.channel_server_id',
                'instances.aggregation_server_id',
                'instances.env_id',
                'instances.details',
                'instances.notes',
                'instances.cs_token',
            ]);

            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'instance_';
                $routeKey = 'admin.instances';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('group.group', function ($row) {
                return $row->group ? $row->group->group : '';
            });
            $table->editColumn('quantity_to_create', function ($row) {
                return $row->quantity_to_create ? $row->quantity_to_create : '';
            });
            $table->editColumn('role_convention.role_convention', function ($row) {
                return $row->role_convention ? $row->role_convention->role_convention : '';
            });
            $table->editColumn('channel_server.cs_host', function ($row) {
                return $row->channel_server ? $row->channel_server->cs_host : '';
            });
            $table->editColumn('aggregation_server.as_host_url', function ($row) {
                return $row->aggregation_server ? $row->aggregation_server->as_host_url : '';
            });
            $table->editColumn('env.environment', function ($row) {
                return $row->env ? $row->env->environment : '';
            });
            $table->editColumn('details', function ($row) {
                return $row->details ? $row->details : '';
            });
            $table->editColumn('notes', function ($row) {
                return $row->notes ? $row->notes : '';
            });
            $table->editColumn('cs_token', function ($row) {
                return $row->cs_token ? $row->cs_token : '';
            });
            $table->editColumn('hosts.host', function ($row) {
                if(count($row->hosts) == 0) {
                    return '';
                }

                return '<span class="label label-info label-many">' . implode('</span><span class="label label-info label-many"> ',
                        $row->hosts->pluck('host')->toArray()) . '</span>';
            });

            $table->rawColumns(['actions','massDelete','hosts.host']);

            return $table->make(true);
        }

        return view('admin.instances.index');
    }

    /**
     * Show the form for creating new Instance.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('instance_create')) {
            return abort(401);
        }

        $groups = \App\Group::get()->pluck('group', 'id')->prepend(trans('global.app_please_select'), '');
        $role_conventions = \App\RoleConvention::get()->pluck('role_convention', 'id')->prepend(trans('global.app_please_select'), '');
        $channel_servers = \App\ChannelServer::get()->pluck('cs_host', 'id')->prepend(trans('global.app_please_select'), '');
        $aggregation_servers = \App\AggregationServer::get()->pluck('as_host_url', 'id')->prepend(trans('global.app_please_select'), '');
        $envs = \App\Environment::get()->pluck('environment', 'id')->prepend(trans('global.app_please_select'), '');
        $status = \App\Status::get()->pluck('status', 'id')->prepend(trans('global.app_please_select'), '');
        $hosts = \App\Host::get()->pluck('host', 'id');


        // flash()->info("Create Instances of servers you need created in this order. Channel Server > Aggergation Server > SyncServers. This will save alot of time in configuring them.");

        return view('admin.instances.create', compact('groups', 'role_conventions', 'channel_servers', 'aggregation_servers', 'envs', 'status'));
    }

    /**
     * Store a newly created Instance in storage.
     *
     * @param  \App\Http\Requests\StoreInstancesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstancesRequest $request)
    {
        if (! Gate::allows('instance_create')) {
            return abort(401);
        }

        $instance = Instance::create($request->all());
        $instance->hosts()->sync(array_filter((array) $request->input('hosts')));


        $group = \App\Group::findOrFail($instance->group_id);

        $cs_count =  DB::table('hosts')->where('group_id', $instance->group_id)->where('rc_id', '3')->count();
        $as_count =  DB::table('hosts')->where('group_id', $instance->group_id)->where('rc_id', '2')->count();
        $ss_count =  DB::table('hosts')->where('group_id', $instance->group_id)->where('rc_id', '1')->count();
        $csas_count = DB::table('hosts')->where('group_id', $instance->group_id)->where('rc_id', '4')->count();


        if($instance->channel_server_id) {
            $channel_server = \App\ChannelServer::findOrFail($instance->channel_server_id);

        }

        if($instance->aggregation_server_id) {
            $aggregation_server = \App\AggregationServer::findOrFail($instance->aggregation_server_id);
        }

        /**
         * channel server instance creation
         * @var [type]
         */
        if($instance->role_convention->role_convention_value == "cs"){


            if ($cs_count == 0){
                $quantity_to_create = $instance->quantity_to_create;
                $cs_count++;
            }else{
                $quantity_to_create = $cs_count + $instance->quantity_to_create;
            }


            for($a=$cs_count; $a <= $quantity_to_create; $a++){
            // dd($cs_count); die();
                $str = $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a;

                if( strlen( $str ) < 40) {
                    $str = explode( "\n", wordwrap( $str, 30));
                    $str = $str[0] . '!';
                }

                $cs_license = "LIC=ChannelServer-AA-1.0-20991231-". date('Ymd', strtotime($instance->created_at)) . "-DISHCS!" . strtoupper(str_pad($str, 40, "0"));

                try{
                    $host = \App\Host::create([
                            'name' => $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a,
                            'host' => $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a.".imovetv.com",
                            'group_id' => $request->group_id,
                            'status_id' => '2',
                            'cs_token' => $group->cs_token,
                            'channel_server_id' =>'',
                            'aggregation_server_id' =>'',
                            'sync_server_id' =>'',
                            'rc_id' =>'3',
                    ]);
                    flash()->success("Host Created: " . $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a);
                    \Log::info("Host Created: " . $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a);
                } catch (\Exception $e) {
                    flash()->error($instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a . "Not Created: ". $e->getMessage());
                    \Log::error($instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a . "Not Created: ". $e->getMessage());
                }

                try{
                    \App\ChannelServer::create([
                        'cs_name' => $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a,
                        'cs_host' => $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a.".imovetv.com",
                        'group_id' => $request->group_id,
                        'cs_token' => $group->cs_token,
                        'host_id' => $host->id,
                        'license' => $cs_license
                    ]);

                    $contents = "";
                    $cs_host = $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a.".imovetv.com";
                    $channel_server_path   = public_path('configs/cs/'. $cs_host);
                    File::isDirectory($channel_server_path) or File::makeDirectory($channel_server_path, 0777, true, true);
                    File::put($channel_server_path . '/ChannelServer.conf', $contents);
                    File::put($channel_server_path . '/ChannelIDs.conf', $contents);
                    File::put($channel_server_path . '/settings.conf', $contents);

                    flash()->info("Channel Server Created: " . $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a. " SUCCESSFULL");
                    // $request->session()->put('channel_server', $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a.".imovetv.com");
                    \Log::info("Channel Server Created: " . $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a);
                } catch (\Exception $e) {
                    flash()->error($instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a . "Not Created: ". $e->getMessage());
                    \Log::error($instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a . "Not Created: ". $e->getMessage());
                }
            }
        }

        /**
         * sync server instance creation
         * @var [type]
         */
        if($instance->role_convention->role_convention_value == "ss"){
            if ($ss_count == 0){
                $quantity_to_create = $instance->quantity_to_create;
                $ss_count++;
            }else{
                $quantity_to_create = $ss_count + $instance->quantity_to_create;
            }



            for($a=$ss_count; $a <= $quantity_to_create; $a++){
                // dd($ss_count); die();
                $str = $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a;

                if( strlen( $str ) < 40) {
                    $str = explode( "\n", wordwrap( $str, 30));
                    $str = $str[0] . '!';
                }

                $cs_license = "LIC=ChannelServer-AA-1.0-20991231-". date('Ymd', strtotime($instance->created_at)) . "-DISHCS!" . strtoupper(str_pad($str, 40, "0"));

                try{
                    $host = \App\Host::create([
                        'name' => $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a,
                        'host' => $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a.".imovetv.com",
                        'group_id' => $request->group_id,
                        'status_id' => '2',
                        'cs_token' => $group->cs_token,
                        'channel_server_id' => @$channel_server->id,
                        'aggregation_server_id' => @$aggregation_server->id,
                        'sync_server_id' =>'',
                        'rc_id' =>'1',
                    ]);
                    flash()->success("Host Created: " . $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a. " SUCCESSFULL");
                    \Log::info("Host Created: " . $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a);
                } catch (\Exception $e) {
                    flash()->error($instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a . "Not Created: ". $e->getMessage());
                    \Log::error($instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a . "Not Created: ". $e->getMessage());
                }

                try{
                 \App\Syncserver::create([
                        'ss_name' => $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a,
                        'ss_host_url' => $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a.".imovetv.com",
                        'group_id' => $request->group_id,
                        'cs_token' => $group->cs_token,
                        'channel_server_id' => @$channel_server->id,
                        'parent_as_id' => @$aggregation_server->id,
                        'host_id' => $host->id,
                        'license' => $cs_license
                    ]);


                    $contents = "";
                    $ss_host_url = $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a.".imovetv.com";
                    $syncserverpath   = public_path('configs/ss/'. $ss_host_url);
                    File::isDirectory($syncserverpath) or File::makeDirectory($syncserverpath, 0777, true, true);
                    File::put($syncserverpath . '/SyncServer.conf', $contents);
                    File::put($syncserverpath . '/ChannelIDs.conf', $contents);
                    File::put($syncserverpath . '/settings.conf', $contents);





                    flash()->info("Sync Server Created: " . $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a ." SUCCESSFULL");

                    \Log::info("Sync Server Created: " . $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a);
                } catch (\Exception $e) {
                    flash()->error($instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a . "Not Created: ". $e->getMessage());
                    \Log::error($instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a . "Not Created: ". $e->getMessage());
                }
            }
        }


        /**
         * aggregation server instance creation
         * @var [type]
         */
        if($instance->role_convention->role_convention_value == "as"){

            if ($as_count == 0){
                $quantity_to_create = $instance->quantity_to_create;
                $as_count++;
            }else{
                $quantity_to_create = $as_count + $instance->quantity_to_create;
            }

            for($a=$as_count; $a <= $quantity_to_create; $a++){
                // dd($as_count); die();
                $str = $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a;

                if( strlen( $str ) < 40) {
                    $str = explode( "\n", wordwrap( $str, 30));
                    $str = $str[0] . '!';
                }

                $cs_license = "LIC=ChannelServer-AA-1.0-20991231-". date('Ymd', strtotime($instance->created_at)) . "-DISHCS!" . strtoupper(str_pad($str, 40, "0"));

                try{
                $host = \App\Host::create([
                        'name' => $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a,
                        'host' => $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a.".imovetv.com",
                        'group_id' => $request->group_id,
                        'status_id' => '2',
                        'cs_token' => $group->cs_token,
                        'channel_server_id' => @$channel_server->id,
                        'aggregation_server_id' => @$aggregation_server->id,
                        'sync_server_id' =>'',
                        'rc_id' =>'2',
                    ]);
                    flash()->success("Host Created: " . $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a . " SUCCESSFULL");
                    \Log::info("Host Created: " . $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a);
                } catch (\Exception $e) {
                    flash()->error($instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a . "Not Created: ". $e->getMessage());
                    \Log::error($instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a . "Not Created: ". $e->getMessage());
                }

                try{
                    \App\AggregationServer::create([
                        'as_name' => $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a,
                        'as_host_url' => $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a.".imovetv.com",
                        'group_id' => $request->group_id,
                        'cs_token' => $group->cs_token,
                        'channel_server_id' => @$channel_server->id,
                        'host_id' => $host->id,
                        'license' => $cs_license
                    ]);

                    $contents = "";
                    $ss_host_url = $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a.".imovetv.com";
                    $aggregation_serverpath   = public_path('configs/as/'. $ss_host_url);
                    File::isDirectory($aggregation_serverpath) or File::makeDirectory($aggregation_serverpath, 0777, true, true);
                    File::put($aggregation_serverpath . '/SyncServer.conf', $contents);
                    File::put($aggregation_serverpath . '/ChannelIDs.conf', $contents);
                    File::put($aggregation_serverpath . '/settings.conf', $contents);


                    flash()->info("Aggregation Server Created: " . $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a . " SUCCESSFULL");

                    \Log::info("Aggregation Server Created: " . $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a);

                } catch (\Exception $e) {
                    flash()->error($instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a . "Not Created: ". $e->getMessage());
                    \Log::error($instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a . "Not Created: ". $e->getMessage());
                }
            }
        }


        if(!$instance->details){
            $details = [];
            for($a=1; $a <= $instance->quantity_to_create; $a++){
                $details[] .= $instance->env->env_value . "-gp2-aa" . $instance->role_convention->role_convention_value . $instance->group->group ."-" . $a.".imovetv.com\n";
            }
            $fulldetails = $details;
            $instance->update(['details' => $fulldetails, 'cs_token' => $group->cs_token]);
        }

        // $data = $request->session()->all();

        return redirect()->route('admin.instances.index');
    }


    /**
     * Show the form for editing Instance.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('instance_edit')) {
            return abort(401);
        }

        $groups = \App\Group::get()->pluck('group', 'id')->prepend(trans('global.app_please_select'), '');
        $role_conventions = \App\RoleConvention::get()->pluck('role_convention', 'id')->prepend(trans('global.app_please_select'), '');
        $channel_servers = \App\ChannelServer::get()->pluck('cs_host', 'id')->prepend(trans('global.app_please_select'), '');
        $aggregation_servers = \App\AggregationServer::get()->pluck('as_host_url', 'id')->prepend(trans('global.app_please_select'), '');
        $envs = \App\Environment::get()->pluck('environment', 'id')->prepend(trans('global.app_please_select'), '');
        $status = \App\Status::get()->pluck('status', 'id')->prepend(trans('global.app_please_select'), '');
        $hosts = \App\Host::get()->pluck('host', 'id');

        $instance = Instance::findOrFail($id);

        return view('admin.instances.edit', compact('instance', 'groups', 'role_conventions', 'channel_servers', 'aggregation_servers', 'envs', 'hosts', 'status'));
    }

    /**
     * Update Instance in storage.
     *
     * @param  \App\Http\Requests\UpdateInstancesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInstancesRequest $request, $id)
    {
        if (! Gate::allows('instance_edit')) {
            return abort(401);
        }
        $instance = Instance::findOrFail($id);
        $instance->update($request->all());
        $instance->hosts()->sync(array_filter((array)$request->input('hosts')));



























        return redirect()->route('admin.instances.index');
    }


    /**
     * Display Instance.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('instance_view')) {
            return abort(401);
        }
        $instance = Instance::findOrFail($id);
        $groups = \App\Group::get()->pluck('group', 'id')->prepend(trans('global.app_please_select'), '');
        $role_conventions = \App\RoleConvention::get()->pluck('role_convention', 'id')->prepend(trans('global.app_please_select'), '');
        $channel_servers = \App\ChannelServer::get()->pluck('cs_host', 'id')->prepend(trans('global.app_please_select'), '');
        $aggregation_servers = \App\AggregationServer::get()->pluck('as_host_url', 'id')->prepend(trans('global.app_please_select'), '');
        $envs = \App\Environment::get()->pluck('environment', 'id')->prepend(trans('global.app_please_select'), '');
        $status = \App\Status::get()->pluck('status', 'id')->prepend(trans('global.app_please_select'), '');
        $hosts = \App\Host::get()->pluck('host', 'id');

        return view('admin.instances.show', compact('instance'));
    }


    /**
     * Remove Instance from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('instance_delete')) {
            return abort(401);
        }
        $instance = Instance::findOrFail($id);
        $instance->delete();

        return redirect()->route('admin.instances.index');
    }

    /**
     * Delete all selected Instance at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('instance_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Instance::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Instance from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('instance_delete')) {
            return abort(401);
        }
        $instance = Instance::onlyTrashed()->findOrFail($id);
        $instance->restore();

        return redirect()->route('admin.instances.index');
    }

    /**
     * Permanently delete Instance from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('instance_delete')) {
            return abort(401);
        }
        $instance = Instance::onlyTrashed()->findOrFail($id);
        $instance->forceDelete();

        return redirect()->route('admin.instances.index');
    }
}
