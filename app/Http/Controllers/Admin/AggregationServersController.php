<?php

namespace App\Http\Controllers\Admin;

use App\AggregationServer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAggregationServersRequest;
use App\Http\Requests\Admin\UpdateAggregationServersRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AggregationServersController extends Controller
{
    /**
     * Display a listing of AggregationServer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('aggregation_server_access')) {
            return abort(401);
        }

        if (request()->ajax()) {
            $query = AggregationServer::query();
            $query->with("group");
            $query->with("channel_server");
            $query->with("notification_server_type");
            $query->with("timezone");
            $query->with("filter_preset_for_ui");
            $query->with("country");
            $query->with("video_server_type");
            $query->with("host");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {

        if (! Gate::allows('aggregation_server_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'aggregation_servers.id',
                'aggregation_servers.group_id',
                'aggregation_servers.channel_server_id',
                'aggregation_servers.as_name',
                'aggregation_servers.as_host_url',
                'aggregation_servers.as_hostip',
                'aggregation_servers.transcoding_server',
                'aggregation_servers.max_upload_filesize',
                'aggregation_servers.report_time',
                'aggregation_servers.report_email',
                'aggregation_servers.max_days_channel_history',
                'aggregation_servers.notification_server_type_id',
                'aggregation_servers.real_time_notification_url',
                'aggregation_servers.basic_discovery_enabled',
                'aggregation_servers.continuous_discovery_enabled',
                'aggregation_servers.username',
                'aggregation_servers.password',
                'aggregation_servers.advanced_username',
                'aggregation_servers.advanced_password',
                'aggregation_servers.millisecond_precision',
                'aggregation_servers.show_channel_button',
                'aggregation_servers.show_clip_button',
                'aggregation_servers.show_group_button',
                'aggregation_servers.show_live_button',
                'aggregation_servers.enable_evt',
                'aggregation_servers.enable_excel',
                'aggregation_servers.enable_evt_timing',
                'aggregation_servers.timezone_id',
                'aggregation_servers.filter_preset_for_ui_id',
                'aggregation_servers.country_id',
                'aggregation_servers.video_server_type_id',
                'aggregation_servers.video_server_url',
                'aggregation_servers.video_server_redirect',
                'aggregation_servers.video_hls_shift',
                'aggregation_servers.cs_token',
                'aggregation_servers.host_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'aggregation_server_';
                $routeKey = 'admin.aggregation_servers';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('group.group', function ($row) {
                return $row->group ? $row->group->group : '';
            });
            $table->editColumn('channel_server.cs_host', function ($row) {
                return $row->channel_server ? $row->channel_server->cs_host : '';
            });
            $table->editColumn('as_name', function ($row) {
                return $row->as_name ? $row->as_name : '';
            });
            $table->editColumn('as_host_url', function ($row) {
                return $row->as_host_url ? $row->as_host_url : '';
            });
            $table->editColumn('as_hostip', function ($row) {
                return $row->as_hostip ? $row->as_hostip : '';
            });
            $table->editColumn('transcoding_server', function ($row) {
                return $row->transcoding_server ? $row->transcoding_server : '';
            });
            $table->editColumn('max_upload_filesize', function ($row) {
                return $row->max_upload_filesize ? $row->max_upload_filesize : '';
            });
            $table->editColumn('report_time', function ($row) {
                return $row->report_time ? $row->report_time : '';
            });
            $table->editColumn('report_email', function ($row) {
                return $row->report_email ? $row->report_email : '';
            });
            $table->editColumn('max_days_channel_history', function ($row) {
                return $row->max_days_channel_history ? $row->max_days_channel_history : '';
            });
            $table->editColumn('notification_server_type.notification_server_type', function ($row) {
                return $row->notification_server_type ? $row->notification_server_type->notification_server_type : '';
            });
            $table->editColumn('real_time_notification_url', function ($row) {
                return $row->real_time_notification_url ? $row->real_time_notification_url : '';
            });
            $table->editColumn('basic_discovery_enabled', function ($row) {
                return \Form::checkbox("basic_discovery_enabled", 1, $row->basic_discovery_enabled == 1, ["disabled"]);
            });
            $table->editColumn('continuous_discovery_enabled', function ($row) {
                return \Form::checkbox("continuous_discovery_enabled", 1, $row->continuous_discovery_enabled == 1, ["disabled"]);
            });
            $table->editColumn('username', function ($row) {
                return $row->username ? $row->username : '';
            });
            $table->editColumn('password', function ($row) {
                return '---';
            });
            $table->editColumn('advanced_username', function ($row) {
                return $row->advanced_username ? $row->advanced_username : '';
            });
            $table->editColumn('advanced_password', function ($row) {
                return '---';
            });
            $table->editColumn('millisecond_precision', function ($row) {
                return \Form::checkbox("millisecond_precision", 1, $row->millisecond_precision == 1, ["disabled"]);
            });
            $table->editColumn('show_channel_button', function ($row) {
                return \Form::checkbox("show_channel_button", 1, $row->show_channel_button == 1, ["disabled"]);
            });
            $table->editColumn('show_clip_button', function ($row) {
                return \Form::checkbox("show_clip_button", 1, $row->show_clip_button == 1, ["disabled"]);
            });
            $table->editColumn('show_group_button', function ($row) {
                return \Form::checkbox("show_group_button", 1, $row->show_group_button == 1, ["disabled"]);
            });
            $table->editColumn('show_live_button', function ($row) {
                return \Form::checkbox("show_live_button", 1, $row->show_live_button == 1, ["disabled"]);
            });
            $table->editColumn('enable_evt', function ($row) {
                return \Form::checkbox("enable_evt", 1, $row->enable_evt == 1, ["disabled"]);
            });
            $table->editColumn('enable_excel', function ($row) {
                return \Form::checkbox("enable_excel", 1, $row->enable_excel == 1, ["disabled"]);
            });
            $table->editColumn('enable_evt_timing', function ($row) {
                return $row->enable_evt_timing ? $row->enable_evt_timing : '';
            });
            $table->editColumn('timezone.timezone', function ($row) {
                return $row->timezone ? $row->timezone->timezone : '';
            });
            $table->editColumn('filter_preset_for_ui.name', function ($row) {
                return $row->filter_preset_for_ui ? $row->filter_preset_for_ui->name : '';
            });
            $table->editColumn('country.title', function ($row) {
                return $row->country ? $row->country->title : '';
            });
            $table->editColumn('video_server_type.video_server_type', function ($row) {
                return $row->video_server_type ? $row->video_server_type->video_server_type : '';
            });
            $table->editColumn('video_server_url', function ($row) {
                return $row->video_server_url ? $row->video_server_url : '';
            });
            $table->editColumn('video_server_redirect', function ($row) {
                return $row->video_server_redirect ? $row->video_server_redirect : '';
            });
            $table->editColumn('video_hls_shift', function ($row) {
                return $row->video_hls_shift ? $row->video_hls_shift : '';
            });
            $table->editColumn('cs_token', function ($row) {
                return $row->cs_token ? $row->cs_token : '';
            });
            $table->editColumn('host.host', function ($row) {
                return $row->host ? $row->host->host : '';
            });

            $table->rawColumns(['actions','massDelete','basic_discovery_enabled','continuous_discovery_enabled','millisecond_precision','show_channel_button','show_clip_button','show_group_button','show_live_button','enable_evt','enable_excel']);

            return $table->make(true);
        }

        return view('admin.aggregation_servers.index');
    }

    /**
     * Show the form for creating new AggregationServer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('aggregation_server_create')) {
            return abort(401);
        }

        $groups = \App\Group::get()->pluck('group', 'id')->prepend(trans('global.app_please_select'), '');
        $channel_servers = \App\ChannelServer::get()->pluck('cs_host', 'id')->prepend(trans('global.app_please_select'), '');
        $notification_server_types = \App\NotificationServerType::get()->pluck('notification_server_type', 'id')->prepend(trans('global.app_please_select'), '');
        $timezones = \App\Timezone::get()->pluck('timezone', 'id')->prepend(trans('global.app_please_select'), '');
        $filter_preset_for_uis = \App\Filter::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $countries = \App\Country::get()->pluck('title', 'id')->prepend(trans('global.app_please_select'), '');
        $video_server_types = \App\VideoServerType::get()->pluck('video_server_type', 'id')->prepend(trans('global.app_please_select'), '');
        $hosts = \App\Host::get()->pluck('host', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.aggregation_servers.create', compact('groups', 'channel_servers', 'notification_server_types', 'timezones', 'filter_preset_for_uis', 'countries', 'video_server_types', 'hosts'));
    }

    /**
     * Store a newly created AggregationServer in storage.
     *
     * @param  \App\Http\Requests\StoreAggregationServersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAggregationServersRequest $request)
    {
        if (! Gate::allows('aggregation_server_create')) {
            return abort(401);
        }
        $aggregation_server = AggregationServer::create($request->all());



        return redirect()->route('admin.aggregation_servers.index');
    }


    /**
     * Show the form for editing AggregationServer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('aggregation_server_edit')) {
            return abort(401);
        }

        $groups = \App\Group::get()->pluck('group', 'id')->prepend(trans('global.app_please_select'), '');
        $channel_servers = \App\ChannelServer::get()->pluck('cs_host', 'id')->prepend(trans('global.app_please_select'), '');
        $notification_server_types = \App\NotificationServerType::get()->pluck('notification_server_type', 'id')->prepend(trans('global.app_please_select'), '');
        $timezones = \App\Timezone::get()->pluck('timezone', 'id')->prepend(trans('global.app_please_select'), '');
        $filter_preset_for_uis = \App\Filter::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $countries = \App\Country::get()->pluck('title', 'id')->prepend(trans('global.app_please_select'), '');
        $video_server_types = \App\VideoServerType::get()->pluck('video_server_type', 'id')->prepend(trans('global.app_please_select'), '');
        $hosts = \App\Host::get()->pluck('host', 'id')->prepend(trans('global.app_please_select'), '');

        $aggregation_server = AggregationServer::findOrFail($id);

        return view('admin.aggregation_servers.edit', compact('aggregation_server', 'groups', 'channel_servers', 'notification_server_types', 'timezones', 'filter_preset_for_uis', 'countries', 'video_server_types', 'hosts'));
    }

    /**
     * Update AggregationServer in storage.
     *
     * @param  \App\Http\Requests\UpdateAggregationServersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAggregationServersRequest $request, $id)
    {
        if (! Gate::allows('aggregation_server_edit')) {
            return abort(401);
        }
        $aggregation_server = AggregationServer::findOrFail($id);
        $aggregation_server->update($request->all());



        return redirect()->route('admin.aggregation_servers.index');
    }


    /**
     * Display AggregationServer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('aggregation_server_view')) {
            return abort(401);
        }

        $groups = \App\Group::get()->pluck('group', 'id')->prepend(trans('global.app_please_select'), '');
        $channel_servers = \App\ChannelServer::get()->pluck('cs_host', 'id')->prepend(trans('global.app_please_select'), '');
        $notification_server_types = \App\NotificationServerType::get()->pluck('notification_server_type', 'id')->prepend(trans('global.app_please_select'), '');
        $timezones = \App\Timezone::get()->pluck('timezone', 'id')->prepend(trans('global.app_please_select'), '');
        $filter_preset_for_uis = \App\Filter::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $countries = \App\Country::get()->pluck('title', 'id')->prepend(trans('global.app_please_select'), '');
        $video_server_types = \App\VideoServerType::get()->pluck('video_server_type', 'id')->prepend(trans('global.app_please_select'), '');
        $hosts = \App\Host::get()->pluck('host', 'id')->prepend(trans('global.app_please_select'), '');$csos = \App\Cso::where('select_aggregation_server_for_a_id', $id)->get();$instances = \App\Instance::where('aggregation_server_id', $id)->get();$syncservers = \App\Syncserver::where('parent_as_id', $id)->get();$csos = \App\Cso::where('select_aggregation_server_for_b_id', $id)->get();

        $aggregation_server = AggregationServer::findOrFail($id);

        return view('admin.aggregation_servers.show', compact('aggregation_server', 'csos', 'instances', 'syncservers', 'csos'));
    }


    /**
     * Remove AggregationServer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('aggregation_server_delete')) {
            return abort(401);
        }
        $aggregation_server = AggregationServer::findOrFail($id);
        $aggregation_server->delete();

        return redirect()->route('admin.aggregation_servers.index');
    }

    /**
     * Delete all selected AggregationServer at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('aggregation_server_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = AggregationServer::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore AggregationServer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('aggregation_server_delete')) {
            return abort(401);
        }
        $aggregation_server = AggregationServer::onlyTrashed()->findOrFail($id);
        $aggregation_server->restore();

        return redirect()->route('admin.aggregation_servers.index');
    }

    /**
     * Permanently delete AggregationServer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('aggregation_server_delete')) {
            return abort(401);
        }
        $aggregation_server = AggregationServer::onlyTrashed()->findOrFail($id);
        $aggregation_server->forceDelete();

        return redirect()->route('admin.aggregation_servers.index');
    }

    public function generateAggregationSyncServer(AggregationSyncServer $aggregation_server, $id, $contents = null)
    {


        $aggregation_server = AggregationServer::findOrFail($id);

        $settings_count          = 0;
        $asserverpath   = public_path('configs/as/'. $aggregation_server->as_host_url);

        File::isDirectory($asserverpath) or File::makeDirectory($asserverpath, 0777, true, true);

        if (file_exists($asserverpath))
        {
            $contents   = [];
            $contents   = "[AUTHENTIFICATION]\n";
            $contents  .= "username=". $aggregation_server->username."\n";
            $contents  .= "password=". $aggregation_server->password."\n";
            $contents  .= "username=". $aggregation_server->advanced_username."\n";
            $contents  .= "password=". $aggregation_server->advanced_password."\n";
            $contents  .= "\n";

            File::put($asserverpath . '/settings.conf', $contents);
        }

        return view('preview.as.settings', compact('aggregation_server'));





    }

    public function generateModelAggregationSyncServer(AggregationSyncServer $aggregation_server, $id, $contents = null)
    {
        $aggregation_server = AggregationServer::findOrFail($id);

    }

    public function generateChannelids(ChannelServer $aggregation_server, $id, $contents = null)
    {
        $aggregation_server = AggregationServer::findOrFail($id);


    }

    public function generateModelChannelids(ChannelServer $aggregation_server, $id, $contents = null)
    {
        $aggregation_server = AggregationServer::findOrFail($id);


    }

    public function generateSettings(ChannelServer $aggregation_server, $id, $contents = null)
    {
        $aggregation_server = AggregationServer::findOrFail($id);

        $settings_count          = 0;
        $asserverpath   = public_path('configs/as/'. $aggregation_server->as_host_url);

        File::isDirectory($asserverpath) or File::makeDirectory($asserverpath, 0777, true, true);

        if (file_exists($asserverpath))
        {
            $contents   = [];
            $contents   = "[AUTHENTIFICATION]\n";
            $contents  .= "username=". $aggregation_server->username."\n";
            $contents  .= "password=". $aggregation_server->password."\n";
            $contents  .= "username=". $aggregation_server->advanced_username."\n";
            $contents  .= "password=". $aggregation_server->advanced_password."\n";
            $contents  .= "\n";

            File::put($asserverpath . '/settings.conf', $contents);
        }

        return view('preview.as.settings', compact('aggregation_server'));
    }



    public function generateModelSettings(ChannelServer $aggregation_server, $id, $contents = null)
    {
        $aggregation_server = AggregationServer::findOrFail($id);

        $settings_count          = 0;
        $asserverpath   = public_path('configs/as/'. $aggregation_server->as_host_url);

        File::isDirectory($asserverpath) or File::makeDirectory($asserverpath, 0777, true, true);

        if (file_exists($asserverpath))
        {
            $contents   = [];
            $contents   = "[AUTHENTIFICATION]\n";
            $contents  .= "username=". $aggregation_server->username."\n";
            $contents  .= "password=". $aggregation_server->password."\n";
            $contents  .= "username=". $aggregation_server->advanced_username."\n";
            $contents  .= "password=". $aggregation_server->advanced_password."\n";
            $contents  .= "\n";

            File::put($asserverpath . '/settings.conf', $contents);
        }

        return view('preview.as.settings', compact('aggregation_server'));
    }


}
