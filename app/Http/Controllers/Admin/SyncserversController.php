<?php

namespace App\Http\Controllers\Admin;

use App\Syncserver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSyncserversRequest;
use App\Http\Requests\Admin\UpdateSyncserversRequest;
use Yajra\DataTables\DataTables;
use Flash;
use Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Arr;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Stream\Stream;
use App\Helpers\General;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Support\Facades\Log;

class SyncserversController extends Controller
{
    /**
     * Display a listing of Syncserver.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('syncserver_access')) {
            return abort(401);
        }

        if (request()->ajax()) {
            $query = Syncserver::query();
            $query->with("ss_type");
            $query->with("group");
            $query->with("channel_server");
            $query->with("parent_as");
            $query->with("notification_server_type");
            $query->with("timezone");
            $query->with("filter_preset_for_ui");
            $query->with("video_server_type");
            $query->with("country");
            $query->with("host");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {

        if (! Gate::allows('syncserver_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'syncservers.id',
                'syncservers.ss_type_id',
                'syncservers.ss_name',
                'syncservers.ss_host_url',
                'syncservers.ss_hostip',
                'syncservers.group_id',
                'syncservers.channel_server_id',
                'syncservers.parent_as_id',
                'syncservers.grab_time',
                'syncservers.transcoding_server',
                'syncservers.max_upload_filesize',
                'syncservers.report_time',
                'syncservers.report_email',
                'syncservers.max_days_channel_history',
                'syncservers.notification_server_type_id',
                'syncservers.real_time_notification_url',
                'syncservers.basic_discovery_enabled',
                'syncservers.continuous_discovery_enabled',
                'syncservers.username',
                'syncservers.password',
                'syncservers.advanced_username',
                'syncservers.advanced_password',
                'syncservers.millisecond_precision',
                'syncservers.show_channel_button',
                'syncservers.show_clip_button',
                'syncservers.show_group_button',
                'syncservers.show_live_button',
                'syncservers.enable_evt',
                'syncservers.enable_excel',
                'syncservers.enable_evt_timing',
                'syncservers.timezone_id',
                'syncservers.filter_preset_for_ui_id',
                'syncservers.video_server_type_id',
                'syncservers.video_server_url',
                'syncservers.video_hls_shift',
                'syncservers.video_server_redirect',
                'syncservers.hls_shift_per_channel',
                'syncservers.country_id',
                'syncservers.cs_token',
                'syncservers.dai_ads_length',
                'syncservers.dai_notifications',
                'syncservers.dai_ad_lengths_per_channel',
                'syncservers.dai_offsets_per_channel',
                'syncservers.dai_min_per_hour_per_channel',
                'syncservers.dai_notify_gapper_channel',
                'syncservers.dai_ad_spacings_per_channel',
                'syncservers.dai_is_netlen_per_channel',
                'syncservers.license',
                'syncservers.host_id',
                'syncservers.imc',
                'syncservers.ip',
                'syncservers.itcpport',
                'syncservers.mobile',
                'syncservers.clips',
                'syncservers.rtclips',
                'syncservers.p1_match',
                'syncservers.doublef0_match',
                'syncservers.full_match',
                'syncservers.do_notify_url',
                'syncservers.record',
                'syncservers.clip_refresh_secs',
                'syncservers.threshold_nr_p1_matches_times_hundred',
                'syncservers.threshold_nr_doublef0_matches_times_hundred',
                'syncservers.threshold_nr_3smatches_times_hundred',
                'syncservers.threshold_nr_matches_times_hundred',
                'syncservers.clip_len_notify_secs',
                'syncservers.clip_notifyurl_script',
                'syncservers.clip_dir',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'syncserver_';
                $routeKey = 'admin.syncservers';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('ss_type.type', function ($row) {
                return $row->ss_type ? $row->ss_type->type : '';
            });
            $table->editColumn('ss_name', function ($row) {
                return $row->ss_name ? $row->ss_name : '';
            });
            $table->editColumn('ss_host_url', function ($row) {
                return $row->ss_host_url ? $row->ss_host_url : '';
            });
            $table->editColumn('ss_hostip', function ($row) {
                return $row->ss_hostip ? $row->ss_hostip : '';
            });
            $table->editColumn('group.group', function ($row) {
                return $row->group ? $row->group->group : '';
            });
            $table->editColumn('channel_server.cs_host', function ($row) {
                return $row->channel_server ? $row->channel_server->cs_host : '';
            });
            $table->editColumn('parent_as.as_host_url', function ($row) {
                return $row->parent_as ? $row->parent_as->as_host_url : '';
            });
            $table->editColumn('grab_time', function ($row) {
                return $row->grab_time ? $row->grab_time : '';
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
            $table->editColumn('video_server_type.video_server_type', function ($row) {
                return $row->video_server_type ? $row->video_server_type->video_server_type : '';
            });
            $table->editColumn('video_server_url', function ($row) {
                return $row->video_server_url ? $row->video_server_url : '';
            });
            $table->editColumn('video_hls_shift', function ($row) {
                return $row->video_hls_shift ? $row->video_hls_shift : '';
            });
            $table->editColumn('video_server_redirect', function ($row) {
                return $row->video_server_redirect ? $row->video_server_redirect : '';
            });
            $table->editColumn('hls_shift_per_channel', function ($row) {
                return $row->hls_shift_per_channel ? $row->hls_shift_per_channel : '';
            });
            $table->editColumn('country.title', function ($row) {
                return $row->country ? $row->country->title : '';
            });
            $table->editColumn('cs_token', function ($row) {
                return $row->cs_token ? $row->cs_token : '';
            });
            $table->editColumn('dai_ads_length', function ($row) {
                return $row->dai_ads_length ? $row->dai_ads_length : '';
            });
            $table->editColumn('dai_notifications', function ($row) {
                return $row->dai_notifications ? $row->dai_notifications : '';
            });
            $table->editColumn('dai_ad_lengths_per_channel', function ($row) {
                return $row->dai_ad_lengths_per_channel ? $row->dai_ad_lengths_per_channel : '';
            });
            $table->editColumn('dai_offsets_per_channel', function ($row) {
                return $row->dai_offsets_per_channel ? $row->dai_offsets_per_channel : '';
            });
            $table->editColumn('dai_min_per_hour_per_channel', function ($row) {
                return $row->dai_min_per_hour_per_channel ? $row->dai_min_per_hour_per_channel : '';
            });
            $table->editColumn('dai_notify_gapper_channel', function ($row) {
                return $row->dai_notify_gapper_channel ? $row->dai_notify_gapper_channel : '';
            });
            $table->editColumn('dai_ad_spacings_per_channel', function ($row) {
                return $row->dai_ad_spacings_per_channel ? $row->dai_ad_spacings_per_channel : '';
            });
            $table->editColumn('dai_is_netlen_per_channel', function ($row) {
                return $row->dai_is_netlen_per_channel ? $row->dai_is_netlen_per_channel : '';
            });
            $table->editColumn('license', function ($row) {
                return $row->license ? $row->license : '';
            });
            $table->editColumn('host.host', function ($row) {
                return $row->host ? $row->host->host : '';
            });
            $table->editColumn('imc', function ($row) {
                return $row->imc ? $row->imc : '';
            });
            $table->editColumn('ip', function ($row) {
                return $row->ip ? $row->ip : '';
            });
            $table->editColumn('itcpport', function ($row) {
                return $row->itcpport ? $row->itcpport : '';
            });
            $table->editColumn('mobile', function ($row) {
                return \Form::checkbox("mobile", 1, $row->mobile == 1, ["disabled"]);
            });
            $table->editColumn('clips', function ($row) {
                return \Form::checkbox("clips", 1, $row->clips == 1, ["disabled"]);
            });
            $table->editColumn('rtclips', function ($row) {
                return \Form::checkbox("rtclips", 1, $row->rtclips == 1, ["disabled"]);
            });
            $table->editColumn('p1_match', function ($row) {
                return \Form::checkbox("p1_match", 1, $row->p1_match == 1, ["disabled"]);
            });
            $table->editColumn('doublef0_match', function ($row) {
                return \Form::checkbox("doublef0_match", 1, $row->doublef0_match == 1, ["disabled"]);
            });
            $table->editColumn('full_match', function ($row) {
                return \Form::checkbox("full_match", 1, $row->full_match == 1, ["disabled"]);
            });
            $table->editColumn('do_notify_url', function ($row) {
                return \Form::checkbox("do_notify_url", 1, $row->do_notify_url == 1, ["disabled"]);
            });
            $table->editColumn('record', function ($row) {
                return \Form::checkbox("record", 1, $row->record == 1, ["disabled"]);
            });
            $table->editColumn('clip_refresh_secs', function ($row) {
                return $row->clip_refresh_secs ? $row->clip_refresh_secs : '';
            });
            $table->editColumn('threshold_nr_p1_matches_times_hundred', function ($row) {
                return $row->threshold_nr_p1_matches_times_hundred ? $row->threshold_nr_p1_matches_times_hundred : '';
            });
            $table->editColumn('threshold_nr_doublef0_matches_times_hundred', function ($row) {
                return $row->threshold_nr_doublef0_matches_times_hundred ? $row->threshold_nr_doublef0_matches_times_hundred : '';
            });
            $table->editColumn('threshold_nr_3smatches_times_hundred', function ($row) {
                return $row->threshold_nr_3smatches_times_hundred ? $row->threshold_nr_3smatches_times_hundred : '';
            });
            $table->editColumn('threshold_nr_matches_times_hundred', function ($row) {
                return $row->threshold_nr_matches_times_hundred ? $row->threshold_nr_matches_times_hundred : '';
            });
            $table->editColumn('clip_len_notify_secs', function ($row) {
                return $row->clip_len_notify_secs ? $row->clip_len_notify_secs : '';
            });
            $table->editColumn('clip_notifyurl_script', function ($row) {
                return $row->clip_notifyurl_script ? $row->clip_notifyurl_script : '';
            });
            $table->editColumn('clip_dir', function ($row) {
                return $row->clip_dir ? $row->clip_dir : '';
            });

            $table->rawColumns(['actions','massDelete','basic_discovery_enabled','continuous_discovery_enabled','millisecond_precision','show_channel_button','show_clip_button','show_group_button','show_live_button','enable_evt','enable_excel','mobile','clips','rtclips','p1_match','doublef0_match','full_match','do_notify_url','record']);

            return $table->make(true);
        }

        return view('admin.syncservers.index');
    }

    /**
     * Show the form for creating new Syncserver.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('syncserver_create')) {
            return abort(401);
        }

        $ss_types = \App\SyncServerFunction::get()->pluck('type', 'id')->prepend(trans('global.app_please_select'), '');

        $groups = \App\Group::get()->pluck('group', 'id')->prepend(trans('global.app_please_select'), '');

        $channel_servers = \App\ChannelServer::get()->pluck('cs_host', 'id')->prepend(trans('global.app_please_select'), '');
        $parent_as = \App\AggregationServer::get()->pluck('as_host_url', 'id')->prepend(trans('global.app_please_select'), '');
        $notification_server_types = \App\NotificationServerType::get()->pluck('notification_server_type', 'id')->prepend(trans('global.app_please_select'), '');
        $timezones = \App\Timezone::get()->pluck('timezone', 'id')->prepend(trans('global.app_please_select'), '');
        $filter_preset_for_uis = \App\Filter::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $countries = \App\Country::get()->pluck('title', 'id')->prepend(trans('global.app_please_select'), '');
        $video_server_types = \App\VideoServerType::get()->pluck('video_server_type', 'id')->prepend(trans('global.app_please_select'), '');
        $hosts = \App\Host::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.syncservers.create', compact('ss_types', 'groups', 'channel_servers', 'parent_as', 'notification_server_types', 'timezones', 'filter_preset_for_uis', 'countries', 'video_server_types', 'hosts', 'licenses'));
    }

    /**
     * Store a newly created Syncserver in storage.
     *
     * @param  \App\Http\Requests\StoreSyncserversRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSyncserversRequest $request)
    {
        if (! Gate::allows('syncserver_create')) {
            return abort(401);
        }

        $syncserver = Syncserver::create($request->all());


        return redirect()->route('admin.syncservers.index');
    }


    /**
     * Show the form for editing Syncserver.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('syncserver_edit')) {
            return abort(401);
        }

        $ss_types = \App\SyncServerFunction::get()->pluck('type', 'id')->prepend(trans('global.app_please_select'), '');
        $groups = \App\Group::get()->pluck('group', 'id')->prepend(trans('global.app_please_select'), '');
        $channel_servers = \App\ChannelServer::get()->pluck('cs_host', 'id')->prepend(trans('global.app_please_select'), '');
        $parent_as = \App\AggregationServer::get()->pluck('as_host_url', 'id')->prepend(trans('global.app_please_select'), '');
        $notification_server_types = \App\NotificationServerType::get()->pluck('notification_server_type', 'id')->prepend(trans('global.app_please_select'), '');
        $timezones = \App\Timezone::get()->pluck('timezone', 'id')->prepend(trans('global.app_please_select'), '');
        $filter_preset_for_uis = \App\Filter::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $video_server_types = \App\VideoServerType::get()->pluck('video_server_type', 'id')->prepend(trans('global.app_please_select'), '');
        $countries = \App\Country::get()->pluck('title', 'id')->prepend(trans('global.app_please_select'), '');
        $hosts = \App\Host::get()->pluck('host', 'id')->prepend(trans('global.app_please_select'), '');


        $syncserver = Syncserver::findOrFail($id);


        return view('admin.syncservers.edit', compact('ss_types', 'syncserver', 'groups', 'channel_servers', 'parent_as', 'notification_server_types', 'timezones', 'filter_preset_for_uis', 'countries', 'video_server_types', 'hosts'));
    }

    /**
     * Update Syncserver in storage.
     *
     * @param  \App\Http\Requests\UpdateSyncserversRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSyncserversRequest $request, $id)
    {
        if (! Gate::allows('syncserver_edit')) {
            return abort(401);
        }
        $syncserver = Syncserver::findOrFail($id);

        $syncserver->update($request->all());

        if($syncserver->ss_type->id == null){
            $clips = 0;
            $rtclips = 0;
            $p1_match = 0;
            $doublef0_match = 0;
            $full_match = 0;
            $do_notify_url = 0;
            $basic_discovery_enabled = 0;
            $continuous_discovery_enabled = 0;
            $servertype = '';
            flash()->success('BASIC RECORDING SERVER SETUP');
        }
        elseif($syncserver->ss_type->id == 1){
            $clips = 0;
            $rtclips = 0;
            $p1_match = 0;
            $doublef0_match = 0;
            $full_match = 0;
            $do_notify_url = 0;
            $basic_discovery_enabled = 0;
            $continuous_discovery_enabled = 0;
            $servertype = '';
            flash()->success('BASIC RECORDING SERVER SETUP');
        } elseif ($syncserver->ss_type->id == 2){
            $clips = 1;
            $rtclips = 0;
            $p1_match = 1;
            $doublef0_match = 1;
            $full_match = 1;
            $do_notify_url = 0;
            $basic_discovery_enabled = 0;
            $continuous_discovery_enabled = 0;
            $servertype = '';
            flash()->success('DETECTION SERVER SETUP');
        } elseif ($syncserver->ss_type->id == 3){
            $clips = 1;
            $rtclips = 0;
            $p1_match = 1;
            $doublef0_match = 1;
            $full_match = 1;
            $do_notify_url = 0;
            $basic_discovery_enabled = 1;
            $continuous_discovery_enabled = 1;
            $servertype = '';
            flash()->success('DISCOVERY SERVER SETUP');
        } elseif ($syncserver->ss_type->id == 4){
            $clips = 1;
            $rtclips = 1;
            $p1_match = 1;
            $doublef0_match = 1;
            $full_match = 1;
            $do_notify_url = 1;
            $basic_discovery_enabled = 1;
            $continuous_discovery_enabled = 1;
            if(empty($syncserver->notification_server_type->notification_server_type)){
                flash()->warning('NOTIFICATION SERVER TYPE NOT SELECTED SO NOTIFICATIONS WILL NOT WORK CORRECTLY');
            }else{
                $servertype = @$syncserver->notification_server_type->notification_server_type;
            }
            flash()->success('NOTIFICATION SERVER SETUP');
        }

        $syncserver->update([
            'clips' =>  $clips,
            'rtclips' => $rtclips,
            'p1_match' => $p1_match,
            'doublef0_match' => $doublef0_match,
            'full_match' =>  $full_match,
            'do_notify_url' =>  $do_notify_url,
            'basic_discovery_enabled' =>$basic_discovery_enabled,
            'continuous_discovery_enabled' => $continuous_discovery_enabled
        ]);


        try{
            $channel_server = \App\ChannelServer::findOrFail($syncserver->channel_server_id);
            $csis                = \App\Csi::where('channel_server_id', $channel_server->id)->get();
            $csis_count          = 0;
            $syncserverpath   = public_path('configs/ss/'. @$syncserver->ss_host_url);
            File::isDirectory($syncserverpath) or File::makeDirectory($syncserverpath, 0777, true, true);
            if (file_exists($syncserverpath))
            {
                $contents   = [];
                $contents   = '';
                foreach ($csis as $csi) {
                    $contents .= $csi->channel->source_name. "," .$csi->channel->env ."\n";
                }
                File::put($syncserverpath . '/ChannelIDs.conf', $contents);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

        try{
            $settings_count          = 0;
            $syncserverpath   = public_path('configs/ss/'. @$syncserver->ss_host_url);

            File::isDirectory($syncserverpath) or File::makeDirectory($syncserverpath, 0777, true, true);

            if (file_exists($syncserverpath))
            {
                $contents   = [];
                $contents   = "[CONFIGURATION]\n";
                $contents   .= "ftpserver=NOT_USED\n";
                $contents   .= "ftpdirectory=NOT_USED\n";
                $contents   .= "ftpusername=NOT_USED\n";
                $contents   .= "ftppassword=NOT_USED\n";
                $contents   .= "grabtime=\n";
                $contents   .= "reporttime=". @$syncserver->report_time."\n";
                $contents   .= "reportemail=". @$syncserver->report_email."\n";
                $contents   .= "notifyurl=". @$syncserver->real_time_notification_url."\n";
                $contents   .= "httpdownloadfolder=". @$syncserver->report_email."\n";
                $contents   .= "tocaiserver=". @$syncserver->transcoding_server."\n";
                $contents   .= "max_days_channel_history=". @$syncserver->max_days_channel_history."\n";
                $contents   .= "\n";
                $contents   .= "[DISCOVERY]\n";
                $contents   .= "basic_discovery_enabled=". @$basic_discovery_enabled."\n";
                $contents   .= "continuous_discovery_enabled=". @$continuous_discovery_enabled."\n";
                $contents   .= "\n";
                $contents   .= "[AUTHENTIFICATION]\n";
                $contents   .= "username=". @$syncserver->username."\n";
                $contents   .= "password=". @$syncserver->password."\n";
                $contents   .= "\n";
                $contents   .= "[REPORT]\n";
                $contents   .= "millisecsprecision=". ($syncserver->millisecond_precision ? 'true' : 'false') ."\n";
                $contents   .= "buttonchannel=". ($syncserver->show_channel_button ? 'true' : 'false') ."\n";
                $contents   .= "buttonclip=". ($syncserver->show_clip_button ? 'true' : 'false') ."\n";
                $contents   .= "buttonlive=". ($syncserver->show_live_button ? 'true' : 'false') ."\n";
                $contents   .= "buttongroup=". ($syncserver->show_group_button ? 'true' : 'false') ."\n";
                $contents   .= "evt=". ($syncserver->enable_evt ? 'true' : 'false') ."\n";
                $contents   .= "excel=". ($syncserver->enable_excel ? 'true' : 'false') ."\n";
                $contents   .= "evttiming=". ($syncserver->enable_evt_timing ? 'true' : 'false') ."\n";
                $contents   .= "timezone=". ($syncserver->timezone->timezone ?? '') ."\n";
                $contents   .= "gap=". @$syncserver->grab_time."\n";
                $contents   .= "adsminimumlength=\n";
                $contents   .= "filterpreset=". @$syncserver->filter_preset_for_uis ."\n";
                $contents   .= "\n";
                $contents   .= "[VIDEO]\n";
                $contents   .= "servertype=". @$syncserver->video_server_type."\n";
                $contents   .= "serverurl=". @$syncserver->video_server_url."\n";
                $contents   .= "hlsshift=". @$syncserver->video_hls_shift."\n";
                $contents   .= "serverredirect=". @$syncserver->video_server_redirect."\n";
                $contents   .= "hlsshiftperchannel=". @$syncserver->hls_shift_per_channel."\n";
                $contents   .= "\n";
                $contents   .= "[EPG]\n";
                $contents   .= "country=". @$syncserver->country->title ."\n";
                $contents   .= "\n";
                $contents   .= "[DAI]\n";
                $contents   .= "servertype=". @$servertype ."\n";
                $contents   .= "adslength=". @$syncserver->dai_ads_length."\n";
                $contents   .= "notifications=". @$syncserver->dai_notifications."\n";
                $contents   .= "adlengthsperchannel=". @$syncserver->dai_ad_lengths_per_channel."\n";
                $contents   .= "offsetsperchannel=". @$syncserver->dai_offsets_per_channel."\n";
                $contents   .= "minperhourperchannel=". @$syncserver->dai_min_per_hour_per_channel."\n";
                $contents   .= "notifygapperchannel=". @$syncserver->dai_notify_gapper_channel."\n";
                $contents   .= "adspacingsperchannel=". @$syncserver->dai_ad_spacings_per_channel."\n";
                $contents   .= "isnetlenperchannel=". @$syncserver->dai_is_netlen_per_channel."\n";

                $contents   .= "\n";
                $contents   .= "[AGGREGATION]\n";
                $contents   .= "aggregationserver=". @$syncserver->parent_as->as_host_url."\n";
                $contents   .= "babyservers=\n";
                $contents   .= "\n";
                $contents   .= "[CLIPDB]\n";
                $contents   .= "clipdburl=\n";
                $contents   .= "\n";
                $contents   .= "[ADMIN]\n";
                $contents   .= "username=". @$syncserver->advanced_username."\n";
                $contents   .= "password=". @$syncserver->advanced_password."\n";

                File::put($syncserverpath . '/settings.conf', $contents);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }


        try{
            $channel_server = \App\ChannelServer::findOrFail($syncserver->channel_server_id);
            // $csis                = \App\Csi::where('channel_server_id', $channel_server->id)->get();
            $syncserverpath   = public_path('configs/ss/'. @$syncserver->ss_host_url);

            File::isDirectory($syncserverpath) or File::makeDirectory($syncserverpath, 0777, true, true);

            $csis = \App\Csi::where('channel_server_id', $id)->get();
            $channelservers = \App\ChannelServer::where($syncserver->channel_server_id, $id)->get();

            $syncserver = \App\Syncserver::findOrFail($id);

            File::isDirectory($syncserverpath) or File::makeDirectory($syncserverpath, 0777, true, true);

            if (file_exists($syncserverpath))
            {
                $contents   = [];

                $contents   = "[INPUTMC]\n";
                $contents   .= "IMC0=&IP0=\n";
                $contents   .= "[INPUTTCP]\n";
                $contents   .= "[CS_ID]\n";
                $sscs_count = 1;

                foreach ($channelservers as $cs){

                    $str =  $cs->cs_host;

                    if( strlen( $str ) < 40) {
                        $str = explode( "\n", wordwrap( $str, 30));
                        $str = $str[0] . '!';
                    }
                    $contents   .= "CSID". $sscs_count ."=DISHCS!" . strtoupper(str_pad($str, 40, "0")) . "\n";
                    $sscs_count++;
                }

                $contents   .= "[LICENSE]\n";
                $contents   .= $syncserver->license."\n";
                $contents   .= "[PARAMETERS]\n";
                $contents   .= "MOBILE=0\n";
                $contents   .= "CLIPS=".@$clips."\n";
                $contents   .= "RTCLIPS=".@$rtclips."\n";
                $contents   .= "P1_MATCH=".@$p1_match."\n";
                $contents   .= "doubleF0_MATCH=".@$doublef0_match."\n";
                $contents   .= "FULL_MATCH=".@$full_match."\n";
                $contents   .= "DO_NOTIFY_URL=".@$do_notify_url."\n";
                $contents   .= "RECORD=1\n";
                $contents   .= "CLIP_REFRESH_SECS=20\n";
                $contents   .= "THRESHOLD_NR_P1_MATCHES_TIMES_HUNDRED=60\n";
                $contents   .= "THRESHOLD_NR_doubleF0_MATCHES_TIMES_HUNDRED=60\n";
                $contents   .= "THRESHOLD_NR_3SMATCHES_TIMES_HUNDRED=70\n";
                $contents   .= "THRESHOLD_NR_MATCHES_TIMES_HUNDRED=60\n";
                $contents   .= "CLIP_LEN_NOTIFY_SECS=3\n";
                $contents   .= "CLIP_NOTIFYURL_SCRIPT=/var/www/ftp/sh/notifyurl.sh\n";
                $contents   .= "CLIP_DIR=/var/www/ftp/downloads\n";
                $contents   = "\n";
            }

            File::put($syncserverpath . '/SyncServer.conf', $contents);

        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }









        return redirect()->route('admin.syncservers.index');
    }


    /**
     * Display Syncserver.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('syncserver_view')) {
            return abort(401);
        }

        // $hosts = \App\Host::get()->pluck('host', 'id')->prepend(trans('global.app_please_select'), '');
        $ss_types = \App\SyncServerFunction::get()->pluck('type', 'id')->prepend(trans('global.app_please_select'), '');
        $channel_servers = \App\ChannelServer::get()->pluck('cs_host', 'id')->prepend(trans('global.app_please_select'), '');
        $groups = \App\Group::get()->pluck('group', 'id')->prepend(trans('global.app_please_select'), '');
        $parent_as = \App\AggregationServer::get()->pluck('as_host_url', 'id')->prepend(trans('global.app_please_select'), '');
        $notification_server_types = \App\NotificationServerType::get()->pluck('notification_server_type', 'id')->prepend(trans('global.app_please_select'), '');
        $timezones = \App\Timezone::get()->pluck('timezone', 'id')->prepend(trans('global.app_please_select'), '');
        $filter_preset_for_uis = \App\Filter::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $countries = \App\Country::get()->pluck('title', 'id')->prepend(trans('global.app_please_select'), '');
        $video_server_types = \App\VideoServerType::get()->pluck('video_server_type', 'id')->prepend(trans('global.app_please_select'), '');
        $hosts = \App\Host::get()->pluck('host', 'id')->prepend(trans('global.app_please_select'), '');
        $csos = \App\Cso::where('select_sync_server_for_a_id', $id)->get();
        $csos = \App\Cso::where('select_sync_server_for_b_id', $id)->get();

        $hosts = \App\Host::where('group_id', $id)->get();
        $license = \App\ChannelServer::get()->pluck('license', 'id')->prepend(trans('global.app_please_select'), '');
        $csis = \App\Csi::where('channel_server_id', $id)->get();

        $aggregation_servers = \App\AggregationServer::where('channel_server_id', $id)->get();
        $csos = \App\Cso::where('channel_server_id', $id)->get();
        $instances = \App\Instance::where('channel_server_id', $id)->get();

        $syncserver = Syncserver::findOrFail($id);

        if($syncserver->ss_type == null){
            $clips = 0;
            $rtclips = 0;
            $p1_match = 0;
            $doublef0_match = 0;
            $full_match = 0;
            $do_notify_url = 0;
            \Log::info('SS MODAL BASIC RECORDING SERVER SETUP');
        }
        elseif($syncserver->ss_type->id == 1){
            $clips = 0;
            $rtclips = 0;
            $p1_match = 0;
            $doublef0_match = 0;
            $full_match = 0;
            $do_notify_url = 0;
            \Log::info('SS MODAL BASIC RECORDING SERVER SETUP');
        } elseif ($syncserver->ss_type->id == 2){
            $clips = 1;
            $rtclips = 0;
            $p1_match = 1;
            $doublef0_match = 1;
            $full_match = 1;
            $do_notify_url = 0;
            \Log::info('SS MODAL DETECTION SERVER SETUP');
        } elseif ($syncserver->ss_type->id == 3){
            $clips = 1;
            $rtclips = 0;
            $p1_match = 1;
            $doublef0_match = 1;
            $full_match = 1;
            $do_notify_url = 0;
            \Log::info('SS MODAL DISCOVERY SERVER SETUP');
        } elseif ($syncserver->ss_type->id == 4){
            $clips = 1;
            $rtclips = 1;
            $p1_match = 1;
            $doublef0_match = 1;
            $full_match = 1;
            $do_notify_url = 1;
            \Log::info('SS MODAL NOTIFICATION SERVER SETUP');
        }

        $syncserver->update([
            'clips' =>  $clips,
            'rtclips' => $rtclips,
            'p1_match' => $p1_match,
            'doublef0_match' => $doublef0_match,
            'full_match' =>  $full_match,
            'do_notify_url' =>  $do_notify_url
        ]);

        $csis = \App\Csi::where('channel_server_id', $id)->get();
        $channelservers = \App\ChannelServer::where('id', $syncserver->channel_server_id)->get();
        $csis                = \App\Csi::where('channel_server_id', $syncserver->channel_server_id)->get();

        $syncserverpath   = public_path('configs/ss/'. @$syncserver->ss_host_url);

        $this->generateSyncServer($syncserver, $id);
        $this->generateSSSettings($syncserver, $id);
        $this->generateSSChannelids($syncserver, $id);


        return view('admin.syncservers.show', compact('channelservers','syncserver', 'csos', 'csis', 'hosts', 'notification_server_types', 'license', 'instances', 'aggregation_servers' ));
    }


    /**
     * Remove Syncserver from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('syncserver_delete')) {
            return abort(401);
        }
        $syncserver = Syncserver::findOrFail($id);
        $syncserver->delete();

        return redirect()->route('admin.syncservers.index');
    }

    /**
     * Delete all selected Syncserver at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('syncserver_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Syncserver::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Syncserver from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('syncserver_delete')) {
            return abort(401);
        }
        $syncserver = Syncserver::onlyTrashed()->findOrFail($id);
        $syncserver->restore();

        return redirect()->route('admin.syncservers.index');
    }

    /**
     * Permanently delete Syncserver from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('syncserver_delete')) {
            return abort(401);
        }
        $syncserver = Syncserver::onlyTrashed()->findOrFail($id);
        $syncserver->forceDelete();

        return redirect()->route('admin.syncservers.index');
    }

    public function generateSyncServer(SyncServer $syncserver, $id, $contents = null)
    {
        \Log::info("generateSyncServer fired");
        $ss_types = \App\SyncServerFunction::get()->pluck('type', 'id')->prepend(trans('global.app_please_select'), '');
        $channel_servers = \App\ChannelServer::get()->pluck('cs_host', 'id')->prepend(trans('global.app_please_select'), '');
        $groups = \App\Group::get()->pluck('group', 'id')->prepend(trans('global.app_please_select'), '');
        $parent_as = \App\AggregationServer::get()->pluck('as_host_url', 'id')->prepend(trans('global.app_please_select'), '');
        $notification_server_types = \App\NotificationServerType::get()->pluck('notification_server_type', 'id')->prepend(trans('global.app_please_select'), '');
        $timezones = \App\Timezone::get()->pluck('timezone', 'id')->prepend(trans('global.app_please_select'), '');
        $filter_preset_for_uis = \App\Filter::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $countries = \App\Country::get()->pluck('title', 'id')->prepend(trans('global.app_please_select'), '');
        $video_server_types = \App\VideoServerType::get()->pluck('video_server_type', 'id')->prepend(trans('global.app_please_select'), '');
        $hosts = \App\Host::get()->pluck('host', 'id')->prepend(trans('global.app_please_select'), '');
        $csos = \App\Cso::where('select_sync_server_for_a_id', $id)->get();
        $csos = \App\Cso::where('select_sync_server_for_b_id', $id)->get();
        $aggregation_servers = \App\AggregationServer::where('channel_server_id', $id)->get();

        $hosts = \App\Host::where('group_id', $id)->get();

        // $licenses = \App\ChannelServer::get()->pluck('license', 'id')->prepend(trans('global.app_please_select'), '');

        $csis = \App\Csi::where('channel_server_id', $syncserver->channel_server_id)->get();
        $syncserver = \App\Syncserver::findOrFail($id);




        if($syncserver->ss_type == null){
            $clips = 0;
            $rtclips = 0;
            $p1_match = 0;
            $doublef0_match = 0;
            $full_match = 0;
            $do_notify_url = 0;
            \Log::info('SS BASIC RECORDING SERVER SETUP');
        }
        elseif($syncserver->ss_type->id == 1){
            $clips = 0;
            $rtclips = 0;
            $p1_match = 0;
            $doublef0_match = 0;
            $full_match = 0;
            $do_notify_url = 0;
            \Log::info('SS BASIC RECORDING SERVER SETUP');
        } elseif ($syncserver->ss_type->id == 2){
            $clips = 1;
            $rtclips = 0;
            $p1_match = 1;
            $doublef0_match = 1;
            $full_match = 1;
            $do_notify_url = 0;
            \Log::info('SS DETECTION SERVER SETUP');
        } elseif ($syncserver->ss_type->id == 3){
            $clips = 1;
            $rtclips = 0;
            $p1_match = 1;
            $doublef0_match = 1;
            $full_match = 1;
            $do_notify_url = 0;
            \Log::info('SS DISCOVERY SERVER SETUP');
        } elseif ($syncserver->ss_type->id == 4){
            $clips = 1;
            $rtclips = 1;
            $p1_match = 1;
            $doublef0_match = 1;
            $full_match = 1;
            $do_notify_url = 1;
            \Log::info('SS NOTIFICATION SERVER SETUP');
        }
        $syncserver->update([
            'clips' =>  $clips,
            'rtclips' => $rtclips,
            'p1_match' => $p1_match,
            'doublef0_match' => $doublef0_match,
            'full_match' =>  $full_match,
            'do_notify_url' =>  $do_notify_url
        ]);

        $channelservers = \App\ChannelServer::where('id', $syncserver->channel_server_id)->get();

        $syncserverpath   = public_path('configs/ss/'. @$syncserver->ss_host_url);

        File::isDirectory($syncserverpath) or File::makeDirectory($syncserverpath, 0777, true, true);

        $contents   = [];

        if (file_exists($syncserverpath))
        {

            $contents    = "[INPUTMC]\n";
            $contents   .= "IMC0=&IP0=\n";
            $contents   .= "[INPUTTCP]\n";
            $contents   .= "[CS_ID]\n";
                $sscs_count = 1;

                foreach ($channelservers as $cs){
                    // dd($cs->cs_host);
                    $str =  $cs->cs_host;


                    if( strlen( $str ) < 40) {
                        $str = explode( "\n", wordwrap( $str, 30));
                        $str = $str[0] . '!';
                    }
                    $contents   .= "CSID". $sscs_count ."=DISHCS!" . strtoupper(str_pad($str, 40, "0")) . "\n";
                    $sscs_count++;
                }

            $contents   .= "[LICENSE]\n";
            $contents   .= $syncserver->license."\n";
            $contents   .= "[PARAMETERS]\n";
            $contents   .= "MOBILE=0\n";
            $contents   .= "CLIPS=". $clips."\n";
            $contents   .= "RTCLIPS=".@$rtclips."\n";
            $contents   .= "P1_MATCH=".@$p1_match."\n";
            $contents   .= "doubleF0_MATCH=".@$doublef0_match."\n";
            $contents   .= "FULL_MATCH=".@$full_match."\n";
            $contents   .= "DO_NOTIFY_URL=".@$do_notify_url."\n";
            $contents   .= "RECORD=1\n";
            $contents   .= "CLIP_REFRESH_SECS=20\n";
            $contents   .= "THRESHOLD_NR_P1_MATCHES_TIMES_HUNDRED=60\n";
            $contents   .= "THRESHOLD_NR_doubleF0_MATCHES_TIMES_HUNDRED=60\n";
            $contents   .= "THRESHOLD_NR_3SMATCHES_TIMES_HUNDRED=70\n";
            $contents   .= "THRESHOLD_NR_MATCHES_TIMES_HUNDRED=60\n";
            $contents   .= "CLIP_LEN_NOTIFY_SECS=3\n";
            $contents   .= "CLIP_NOTIFYURL_SCRIPT=/var/www/ftp/sh/notifyurl.sh\n";
            $contents   .= "CLIP_DIR=/var/www/ftp/downloads\n";
            $contents   .= "\n";

        }

        File::put($syncserverpath . '/SyncServer.conf', $contents);


        return view('preview.ss.sync_server', compact('contents', 'groups', 'channel_servers', 'parent_as', 'notification_server_types', 'timezones', 'filter_preset_for_uis', 'countries', 'video_server_types', 'hosts', 'csos', 'csos', 'hosts', 'syncserver', 'contents'));
    }

    public function generateModalSyncServer(SyncServer $syncserver, $id, $contents = null)
    {
        \Log::info("generateModalSyncServer fired");
        $ss_types = \App\SyncServerFunction::get()->pluck('type', 'id')->prepend(trans('global.app_please_select'), '');
        $channel_servers = \App\ChannelServer::get()->pluck('cs_host', 'id')->prepend(trans('global.app_please_select'), '');
        $groups = \App\Group::get()->pluck('group', 'id')->prepend(trans('global.app_please_select'), '');
        $parent_as = \App\AggregationServer::get()->pluck('as_host_url', 'id')->prepend(trans('global.app_please_select'), '');
        $notification_server_types = \App\NotificationServerType::get()->pluck('notification_server_type', 'id')->prepend(trans('global.app_please_select'), '');
        $timezones = \App\Timezone::get()->pluck('timezone', 'id')->prepend(trans('global.app_please_select'), '');
        $filter_preset_for_uis = \App\Filter::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $countries = \App\Country::get()->pluck('title', 'id')->prepend(trans('global.app_please_select'), '');
        $video_server_types = \App\VideoServerType::get()->pluck('video_server_type', 'id')->prepend(trans('global.app_please_select'), '');
        $hosts = \App\Host::get()->pluck('host', 'id')->prepend(trans('global.app_please_select'), '');
        $csos = \App\Cso::where('select_sync_server_for_a_id', $id)->get();
        $csos = \App\Cso::where('select_sync_server_for_b_id', $id)->get();
        $aggregation_servers = \App\AggregationServer::where('channel_server_id', $id)->get();

        $hosts = \App\Host::where('group_id', $id)->get();
        $licenses = \App\ChannelServer::get()->pluck('license', 'id')->prepend(trans('global.app_please_select'), '');

        if($syncserver->ss_type == null){
            $clips = 0;
            $rtclips = 0;
            $p1_match = 0;
            $doublef0_match = 0;
            $full_match = 0;
            $do_notify_url = 0;
            \Log::info('SS MODAL BASIC RECORDING SERVER SETUP');
        }
        elseif($syncserver->ss_type->id == 1){
            $clips = 0;
            $rtclips = 0;
            $p1_match = 0;
            $doublef0_match = 0;
            $full_match = 0;
            $do_notify_url = 0;
            \Log::info('SS MODAL BASIC RECORDING SERVER SETUP');
        } elseif ($syncserver->ss_type->id == 2){
            $clips = 1;
            $rtclips = 0;
            $p1_match = 1;
            $doublef0_match = 1;
            $full_match = 1;
            $do_notify_url = 0;
            \Log::info('SS MODAL DETECTION SERVER SETUP');
        } elseif ($syncserver->ss_type->id == 3){
            $clips = 1;
            $rtclips = 0;
            $p1_match = 1;
            $doublef0_match = 1;
            $full_match = 1;
            $do_notify_url = 0;
            \Log::info('SS MODAL DISCOVERY SERVER SETUP');
        } elseif ($syncserver->ss_type->id == 4){
            $clips = 1;
            $rtclips = 1;
            $p1_match = 1;
            $doublef0_match = 1;
            $full_match = 1;
            $do_notify_url = 1;
            \Log::info('SS MODAL NOTIFICATION SERVER SETUP');
        }
        $syncserver->update([
            'clips' =>  $clips,
            'rtclips' => $rtclips,
            'p1_match' => $p1_match,
            'doublef0_match' => $doublef0_match,
            'full_match' =>  $full_match,
            'do_notify_url' =>  $do_notify_url
        ]);

        $csis = \App\Csi::where('channel_server_id', $syncserver->channel_server_id)->get();
        $channelservers = \App\ChannelServer::where('id', $syncserver->channel_server_id)->get();
        $sscs_count          = 0;
        $syncserverpath   = public_path('configs/ss/'. @$syncserver->ss_host_url);
        File::isDirectory($syncserverpath) or File::makeDirectory($syncserverpath, 0777, true, true);

        $syncserver = \App\Syncserver::findOrFail($id);

        $cs_id = [];

        foreach ($channelservers as $cs){

            $str =  $cs->cs_host;

            if( strlen( $str ) < 40) {
                $str = explode( "\n", wordwrap( $str, 30));
                $str = $str[0] . '!';
            }
            $cs_id   = "CSID". $sscs_count ."=DISHCS!" . strtoupper(str_pad($str, 40, "0"));
            $sscs_count++;
        }

        $contents   = [];

        if (file_exists($syncserverpath))
        {
            $contents    = "[INPUTMC]\n";
            $contents   .= "IMC0=&IP0=\n";
            $contents   .= "[INPUTTCP]\n";
            $contents   .= "[CS_ID]\n";
                $sscs_count = 1;
                foreach ($channelservers as $cs){

                    $str =  $cs->cs_host;

                    if( strlen( $str ) < 40) {
                        $str = explode( "\n", wordwrap( $str, 30));
                        $str = $str[0] . '!';
                    }
                    $contents   .= "CSID". $sscs_count ."=DISHCS!" . strtoupper(str_pad($str, 40, "0")) . "\n";
                    $sscs_count++;
                }

            $contents   .= "[LICENSE]\n";
            $contents   .= $syncserver->license."\n";
            $contents   .= "[PARAMETERS]\n";
            $contents   .= "MOBILE=0\n";
            $contents   .= "CLIPS=".@$clips."\n";
            $contents   .= "RTCLIPS=".@$rtclips."\n";
            $contents   .= "P1_MATCH=".@$p1_match."\n";
            $contents   .= "doubleF0_MATCH=".@$doublef0_match."\n";
            $contents   .= "FULL_MATCH=".@$full_match."\n";
            $contents   .= "DO_NOTIFY_URL=".@$do_notify_url."\n";
            $contents   .= "RECORD=1\n";
            $contents   .= "CLIP_REFRESH_SECS=20\n";
            $contents   .= "THRESHOLD_NR_P1_MATCHES_TIMES_HUNDRED=60\n";
            $contents   .= "THRESHOLD_NR_doubleF0_MATCHES_TIMES_HUNDRED=60\n";
            $contents   .= "THRESHOLD_NR_3SMATCHES_TIMES_HUNDRED=70\n";
            $contents   .= "THRESHOLD_NR_MATCHES_TIMES_HUNDRED=60\n";
            $contents   .= "CLIP_LEN_NOTIFY_SECS=3\n";
            $contents   .= "CLIP_NOTIFYURL_SCRIPT=/var/www/ftp/sh/notifyurl.sh\n";
            $contents   .= "CLIP_DIR=/var/www/ftp/downloads\n";
            $contents   .= "\n";

        }


        return view('preview.ss.modal-ss', compact( 'contents', 'groups', 'channel_servers', 'parent_as',  'timezones', 'filter_preset_for_uis', 'countries', 'video_server_types', 'hosts', 'csos', 'csos', 'hosts',
            'syncserver','clips','rtclips','p1_match','doublef0_match','full_match','do_notify_url', 'cs_id'));

    }

    public function generateSSChannelids(Syncserver $syncserver, $id, $contents = null)
    {
        flash()->info("generateSSChannelids fired");
        \Log::info("generateSSChannelids fired");
        $groups = \App\Group::get()->pluck('group', 'id')->prepend(trans('global.app_please_select'), '');
        $channel_server = \App\ChannelServer::get()->pluck('cs_host', 'id')->prepend(trans('global.app_please_select'), '');
        $parent_as = \App\AggregationServer::get()->pluck('as_host_url', 'id')->prepend(trans('global.app_please_select'), '');
        $notification_server_types = \App\NotificationServerType::get()->pluck('notification_server_type', 'id')->prepend(trans('global.app_please_select'), '');
        $timezones = \App\Timezone::get()->pluck('timezone', 'id')->prepend(trans('global.app_please_select'), '');
        $filter_preset_for_uis = \App\Filter::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $countries = \App\Country::get()->pluck('title', 'id')->prepend(trans('global.app_please_select'), '');
        $video_server_types = \App\VideoServerType::get()->pluck('video_server_type', 'id')->prepend(trans('global.app_please_select'), '');
        $hosts = \App\Host::get()->pluck('host', 'id')->prepend(trans('global.app_please_select'), '');
        $csos = \App\Cso::where('select_sync_server_for_a_id', $id)->get();
        $csos = \App\Cso::where('select_sync_server_for_b_id', $id)->get();
        $aggregation_servers = \App\AggregationServer::where('channel_server_id', $id)->get();

        $syncserver = \App\Syncserver::findOrFail($id);
        $channel_server = \App\ChannelServer::where('id', $syncserver->channel_server_id)->get();
        $csis = \App\Csi::where('channel_server_id', $syncserver->channel_server_id)->get();
        $csis_count          = 0;
        $syncserverpath   = public_path('configs/ss/'. @$syncserver->ss_host_url);

        File::isDirectory($syncserverpath) or File::makeDirectory($syncserverpath, 0777, true, true);

        if (file_exists($syncserverpath))
        {
            $contents   = [];
            $contents   = '';
            foreach ($csis as $csi) {

                $contents .= $csi->channel->source_name. "," .$csi->channel->env ."\n";
                \Log::info($csi->channel->source_name);
            }

            File::put($syncserverpath . '/ChannelIDs.conf', $contents);

        }
        return view('preview.ss.channelids', compact('channel_server', 'csis', 'aggregation_servers', 'csos',  'syncserver', 'contents'));


    }

    public function generateSSModalChannelids(Syncserver $syncserver, $id, $contents = null)
    {
        $ss_types = \App\SyncServerFunction::get()->pluck('type', 'id')->prepend(trans('global.app_please_select'), '');
        $channel_servers = \App\ChannelServer::get()->pluck('cs_host', 'id')->prepend(trans('global.app_please_select'), '');
        $groups = \App\Group::get()->pluck('group', 'id')->prepend(trans('global.app_please_select'), '');
        $parent_as = \App\AggregationServer::get()->pluck('as_host_url', 'id')->prepend(trans('global.app_please_select'), '');
        $notification_server_types = \App\NotificationServerType::get()->pluck('notification_server_type', 'id')->prepend(trans('global.app_please_select'), '');
        $timezones = \App\Timezone::get()->pluck('timezone', 'id')->prepend(trans('global.app_please_select'), '');
        $filter_preset_for_uis = \App\Filter::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $countries = \App\Country::get()->pluck('title', 'id')->prepend(trans('global.app_please_select'), '');
        $video_server_types = \App\VideoServerType::get()->pluck('video_server_type', 'id')->prepend(trans('global.app_please_select'), '');
        $hosts = \App\Host::get()->pluck('host', 'id')->prepend(trans('global.app_please_select'), '');
        $csos = \App\Cso::where('select_sync_server_for_a_id', $id)->get();
        $csos = \App\Cso::where('select_sync_server_for_b_id', $id)->get();
        $aggregation_servers = \App\AggregationServer::where('channel_server_id', $id)->get();

        $hosts = \App\Host::where('group_id', $id)->get();
        $licenses = \App\ChannelServer::get()->pluck('license', 'id')->prepend(trans('global.app_please_select'), '');
        $csis = \App\Csi::where('channel_server_id', $id)->get();

        $syncserver = \App\Syncserver::findOrFail($id);
        $channel_server = \App\ChannelServer::findOrFail($syncserver->channel_server_id);
        $csis                = \App\Csi::where('channel_server_id', $id)->get();
        $csis_count          = 0;
        $syncserverpath   = public_path('configs/ss/'. @$syncserver->ss_host_url);

        File::isDirectory($syncserverpath) or File::makeDirectory($syncserverpath, 0777, true, true);

        if (file_exists($syncserverpath))
        {
            $contents   = [];
            $contents   = '';
            foreach ($csis as $csi) {
                $contents .= $csi->channel->source_name. "," .$csi->channel->env ."\n";
            }

            // dd($contents);

            File::put($syncserverpath . '/ChannelIDs.conf', $contents);
        }

        return view('preview.ss.modal-channelids', compact('channel_server', 'csis', 'aggregation_servers', 'csos',   'syncserver', 'contents'));
    }

    public function generateSSSettings(Syncserver $syncserver, $id, $contents = null)
    {
        $ss_types = \App\SyncServerFunction::get()->pluck('type', 'id')->prepend(trans('global.app_please_select'), '');
        $channel_servers = \App\ChannelServer::get()->pluck('cs_host', 'id')->prepend(trans('global.app_please_select'), '');
        $groups = \App\Group::get()->pluck('group', 'id')->prepend(trans('global.app_please_select'), '');
        $parent_as = \App\AggregationServer::get()->pluck('as_host_url', 'id')->prepend(trans('global.app_please_select'), '');
        $notification_server_types = \App\NotificationServerType::get()->pluck('notification_server_type', 'id')->prepend(trans('global.app_please_select'), '');
        $timezones = \App\Timezone::get()->pluck('timezone', 'id')->prepend(trans('global.app_please_select'), '');
        $filter_preset_for_uis = \App\Filter::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $countries = \App\Country::get()->pluck('title', 'id')->prepend(trans('global.app_please_select'), '');
        $video_server_types = \App\VideoServerType::get()->pluck('video_server_type', 'id')->prepend(trans('global.app_please_select'), '');
        $hosts = \App\Host::get()->pluck('host', 'id')->prepend(trans('global.app_please_select'), '');
        $csos = \App\Cso::where('select_sync_server_for_a_id', $id)->get();
        $csos = \App\Cso::where('select_sync_server_for_b_id', $id)->get();

        $hosts = \App\Host::where('group_id', $id)->get();
        $licenses = \App\ChannelServer::get()->pluck('license', 'id')->prepend(trans('global.app_please_select'), '');
        $csis = \App\Csi::where('channel_server_id', $id)->get();

        $syncserver = \App\Syncserver::findOrFail($id);

        if($syncserver->ss_type == null){
            $clips = 0;
            $rtclips = 0;
            $p1_match = 0;
            $doublef0_match = 0;
            $full_match = 0;
            $do_notify_url = 0;
            $basic_discovery_enabled = 0;
            $continuous_discovery_enabled = 0;
            $servertype = '';
            \Log::info('SS MODAL BASIC RECORDING SERVER SETUP');
        } elseif($syncserver->ss_type->id == 1){
            $clips = 0;
            $rtclips = 0;
            $p1_match = 0;
            $doublef0_match = 0;
            $full_match = 0;
            $do_notify_url = 0;
            $basic_discovery_enabled = 0;
            $continuous_discovery_enabled = 0;
            $servertype = '';
        } elseif ($syncserver->ss_type->id == 2){
            $clips = 1;
            $rtclips = 0;
            $p1_match = 1;
            $doublef0_match = 1;
            $full_match = 1;
            $do_notify_url = 0;
            $basic_discovery_enabled = 0;
            $continuous_discovery_enabled = 0;
            $servertype = '';
        } elseif ($syncserver->ss_type->id == 3){
            $clips = 1;
            $rtclips = 0;
            $p1_match = 1;
            $doublef0_match = 1;
            $full_match = 1;
            $do_notify_url = 0;
            $basic_discovery_enabled = 1;
            $continuous_discovery_enabled = 1;
            $servertype = '';
        } elseif ($syncserver->ss_type->id == 4){
            $clips = 1;
            $rtclips = 1;
            $p1_match = 1;
            $doublef0_match = 1;
            $full_match = 1;
            $do_notify_url = 1;
            $basic_discovery_enabled = 1;
            $continuous_discovery_enabled = 1;
            if(empty($syncserver->notification_server_type->notification_server_type)){
                flash()->warning('NOTIFICATION SERVER TYPE NOT SELECTED SO NOTIFICATIONS WILL NOT WORK CORRECTLY');
            }else{
                $servertype = @$syncserver->notification_server_type->notification_server_type;
            }
        }

        $syncserver->update([
            'clips' =>  $clips,
            'rtclips' => $rtclips,
            'p1_match' => $p1_match,
            'doublef0_match' => $doublef0_match,
            'full_match' =>  $full_match,
            'do_notify_url' =>  $do_notify_url,
            'basic_discovery_enabled' =>$basic_discovery_enabled,
            'continuous_discovery_enabled' => $continuous_discovery_enabled
        ]);

        $settings_count          = 0;
        $syncserverpath   = public_path('configs/ss/'. @$syncserver->ss_host_url);

        File::isDirectory($syncserverpath) or File::makeDirectory($syncserverpath, 0777, true, true);

        if (file_exists($syncserverpath))
        {
            $contents   = [];


                $contents   = "[CONFIGURATION]\n";
                $contents   .= "ftpserver=NOT_USED\n";
                $contents   .= "ftpdirectory=NOT_USED\n";
                $contents   .= "ftpusername=NOT_USED\n";
                $contents   .= "ftppassword=NOT_USED\n";
                $contents   .= "grabtime=\n";
                $contents   .= "reporttime=". @$syncserver->report_time."\n";
                $contents   .= "reportemail=". @$syncserver->report_email."\n";
                $contents   .= "notifyurl=". @$syncserver->real_time_notification_url."\n";
                $contents   .= "httpdownloadfolder=". @$syncserver->report_email."\n";
                $contents   .= "tocaiserver=". @$syncserver->transcoding_server."\n";
                $contents   .= "max_days_channel_history=". @$syncserver->max_days_channel_history."\n";
                $contents   .= "\n";
                $contents   .= "[DISCOVERY]\n";
                $contents   .= "basic_discovery_enabled=". @$basic_discovery_enabled."\n";
                $contents   .= "continuous_discovery_enabled=". @$continuous_discovery_enabled."\n";
                $contents   .= "\n";
                $contents   .= "[AUTHENTIFICATION]\n";
                $contents   .= "username=". @$syncserver->username."\n";
                $contents   .= "password=". @$syncserver->password."\n";
                $contents   .= "\n";
                $contents   .= "[REPORT]\n";
                $contents   .= "millisecsprecision=". ($syncserver->millisecond_precision ? 'true' : 'false') ."\n";
                $contents   .= "buttonchannel=". ($syncserver->show_channel_button ? 'true' : 'false') ."\n";
                $contents   .= "buttonclip=". ($syncserver->show_clip_button ? 'true' : 'false') ."\n";
                $contents   .= "buttonlive=". ($syncserver->show_live_button ? 'true' : 'false') ."\n";
                $contents   .= "buttongroup=". ($syncserver->show_group_button ? 'true' : 'false') ."\n";
                $contents   .= "evt=". ($syncserver->enable_evt ? 'true' : 'false') ."\n";
                $contents   .= "excel=". ($syncserver->enable_excel ? 'true' : 'false') ."\n";
                $contents   .= "evttiming=". ($syncserver->enable_evt_timing ? 'true' : 'false') ."\n";
                $contents   .= "timezone=". ($syncserver->timezone->timezone ?? '') ."\n";
                $contents   .= "gap=". @$syncserver->grab_time."\n";
                $contents   .= "adsminimumlength=\n";
                $contents   .= "filterpreset=". @$syncserver->filter_preset_for_uis ."\n";
                $contents   .= "\n";
                $contents   .= "[VIDEO]\n";
                $contents   .= "servertype=". @$syncserver->video_server_type."\n";
                $contents   .= "serverurl=". @$syncserver->video_server_url."\n";
                $contents   .= "hlsshift=". @$syncserver->video_hls_shift."\n";
                $contents   .= "serverredirect=". @$syncserver->video_server_redirect."\n";
                $contents   .= "hlsshiftperchannel=". @$syncserver->hls_shift_per_channel."\n";
                $contents   .= "\n";
                $contents   .= "[EPG]\n";
                $contents   .= "country=". @$syncserver->country->title ."\n";
                $contents   .= "\n";
                $contents   .= "[DAI]\n";
                $contents   .= "servertype=". @$servertype ."\n";
                $contents   .= "adslength=". @$syncserver->dai_ads_length."\n";
                $contents   .= "notifications=". @$syncserver->dai_notifications."\n";
                $contents   .= "adlengthsperchannel=". @$syncserver->dai_ad_lengths_per_channel."\n";
                $contents   .= "offsetsperchannel=". @$syncserver->dai_offsets_per_channel."\n";
                $contents   .= "minperhourperchannel=". @$syncserver->dai_min_per_hour_per_channel."\n";
                $contents   .= "notifygapperchannel=". @$syncserver->dai_notify_gapper_channel."\n";
                $contents   .= "adspacingsperchannel=". @$syncserver->dai_ad_spacings_per_channel."\n";
                $contents   .= "isnetlenperchannel=". @$syncserver->dai_is_netlen_per_channel."\n";

                $contents   .= "\n";
                $contents   .= "[AGGREGATION]\n";
                $contents   .= "aggregationserver=". @$syncserver->parent_as->as_host_url."\n";
                $contents   .= "babyservers=\n";
                $contents   .= "\n";
                $contents   .= "[CLIPDB]\n";
                $contents   .= "clipdburl=\n";
                $contents   .= "\n";
                $contents   .= "[ADMIN]\n";
                $contents   .= "username=". @$syncserver->advanced_username."\n";
                $contents   .= "password=". @$syncserver->advanced_password."\n";


            File::put($syncserverpath . '/settings.conf', $contents);
        }

        return view('preview.ss.settings', compact('groups', 'channel_servers', 'parent_as', 'notification_server_types', 'timezones', 'filter_preset_for_uis', 'countries', 'video_server_types', 'hosts', 'csos', 'csos', 'hosts', 'syncserver', 'contents'));
    }

    public function generateSSModalSettings(Syncserver $syncserver, $id, $contents = null)
    {
        $ss_types = \App\SyncServerFunction::get()->pluck('type', 'id')->prepend(trans('global.app_please_select'), '');
        $channel_servers = \App\ChannelServer::get()->pluck('cs_host', 'id')->prepend(trans('global.app_please_select'), '');
        $groups = \App\Group::get()->pluck('group', 'id')->prepend(trans('global.app_please_select'), '');
        $parent_as = \App\AggregationServer::get()->pluck('as_host_url', 'id')->prepend(trans('global.app_please_select'), '');
        $notification_server_types = \App\NotificationServerType::get()->pluck('notification_server_type', 'id')->prepend(trans('global.app_please_select'), '');
        $timezones = \App\Timezone::get()->pluck('timezone', 'id')->prepend(trans('global.app_please_select'), '');
        $filter_preset_for_uis = \App\Filter::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $countries = \App\Country::get()->pluck('title', 'id')->prepend(trans('global.app_please_select'), '');
        $video_server_types = \App\VideoServerType::get()->pluck('video_server_type', 'id')->prepend(trans('global.app_please_select'), '');
        $hosts = \App\Host::get()->pluck('host', 'id')->prepend(trans('global.app_please_select'), '');
        $csos = \App\Cso::where('select_sync_server_for_a_id', $id)->get();
        $csos = \App\Cso::where('select_sync_server_for_b_id', $id)->get();

        $hosts = \App\Host::where('group_id', $id)->get();
        $licenses = \App\ChannelServer::get()->pluck('license', 'id')->prepend(trans('global.app_please_select'), '');
        $csis = \App\Csi::where('channel_server_id', $id)->get();

        $syncserver = \App\Syncserver::findOrFail($id);

        if($syncserver->ss_type == null){
            $clips = 0;
            $rtclips = 0;
            $p1_match = 0;
            $doublef0_match = 0;
            $full_match = 0;
            $do_notify_url = 0;
            $basic_discovery_enabled = 0;
            $continuous_discovery_enabled = 0;
            $servertype = '';
            \Log::info('SS MODAL BASIC RECORDING SERVER SETUP');
        } elseif($syncserver->ss_type->id == 1){
            $clips = 0;
            $rtclips = 0;
            $p1_match = 0;
            $doublef0_match = 0;
            $full_match = 0;
            $do_notify_url = 0;
            $basic_discovery_enabled = 0;
            $continuous_discovery_enabled = 0;
            $servertype = '';
        } elseif ($syncserver->ss_type->id == 2){
            $clips = 1;
            $rtclips = 0;
            $p1_match = 1;
            $doublef0_match = 1;
            $full_match = 1;
            $do_notify_url = 0;
            $basic_discovery_enabled = 0;
            $continuous_discovery_enabled = 0;
            $servertype = '';
        } elseif ($syncserver->ss_type->id == 3){
            $clips = 1;
            $rtclips = 0;
            $p1_match = 1;
            $doublef0_match = 1;
            $full_match = 1;
            $do_notify_url = 0;
            $basic_discovery_enabled = 1;
            $continuous_discovery_enabled = 1;
            $servertype = '';
        } elseif ($syncserver->ss_type->id == 4){
            $clips = 1;
            $rtclips = 1;
            $p1_match = 1;
            $doublef0_match = 1;
            $full_match = 1;
            $do_notify_url = 1;
            $basic_discovery_enabled = 1;
            $continuous_discovery_enabled = 1;
            if(empty($syncserver->notification_server_type->notification_server_type)){
                flash()->warning('NOTIFICATION SERVER TYPE NOT SELECTED SO NOTIFICATIONS WILL NOT WORK CORRECTLY');
            }else{
                $servertype = @$syncserver->notification_server_type->notification_server_type;
            }
        }


        $syncserver->update([
            'clips' =>  $clips,
            'rtclips' => $rtclips,
            'p1_match' => $p1_match,
            'doublef0_match' => $doublef0_match,
            'full_match' =>  $full_match,
            'do_notify_url' =>  $do_notify_url,
            'basic_discovery_enabled' =>$basic_discovery_enabled,
            'continuous_discovery_enabled' => $continuous_discovery_enabled
        ]);

        $settings_count          = 0;
        $syncserverpath   = public_path('configs/ss/'. @$syncserver->ss_host_url);

        File::isDirectory($syncserverpath) or File::makeDirectory($syncserverpath, 0777, true, true);

        if (file_exists($syncserverpath))
        {
            $contents   = [];


            $contents   = "[CONFIGURATION]\n";
            $contents   .= "ftpserver=NOT_USED\n";
            $contents   .= "ftpdirectory=NOT_USED\n";
            $contents   .= "ftpusername=NOT_USED\n";
            $contents   .= "ftppassword=NOT_USED\n";
            $contents   .= "grabtime=\n";
            $contents   .= "reporttime=". ($syncserver->report_time ?? '')."\n";
            $contents   .= "reportemail=". ($syncserver->report_email ?? '')."\n";
            $contents   .= "notifyurl=". ($syncserver->real_time_notification_url ?? '')."\n";
            $contents   .= "httpdownloadfolder=". ($syncserver->report_email ?? '')."\n";
            $contents   .= "tocaiserver=". ($syncserver->transcoding_server ?? '')."\n";
            $contents   .= "max_days_channel_history=". ($syncserver->max_days_channel_history ?? '')."\n";
            $contents   .= "\n";
            $contents   .= "[DISCOVERY]\n";
            $contents   .= "basic_discovery_enabled=". @$basic_discovery_enabled."\n";
            $contents   .= "continuous_discovery_enabled=". @$continuous_discovery_enabled."\n";
            $contents   .= "\n";
            $contents   .= "[AUTHENTIFICATION]\n";
            $contents   .= "username=". ($syncserver->username ?? '')."\n";
            $contents   .= "password=". ($syncserver->password ?? '')."\n";
            $contents   .= "\n";
            $contents   .= "[REPORT]\n";
            $contents   .= "millisecsprecision=". ($syncserver->millisecond_precision ? 'true' : 'false') ."\n";
            $contents   .= "buttonchannel=". ($syncserver->show_channel_button ? 'true' : 'false') ."\n";
            $contents   .= "buttonclip=". ($syncserver->show_clip_button ? 'true' : 'false') ."\n";
            $contents   .= "buttonlive=". ($syncserver->show_live_button ? 'true' : 'false') ."\n";
            $contents   .= "buttongroup=". ($syncserver->show_group_button ? 'true' : 'false') ."\n";
            $contents   .= "evt=". ($syncserver->enable_evt ? 'true' : 'false') ."\n";
            $contents   .= "excel=". ($syncserver->enable_excel ? 'true' : 'false') ."\n";
            $contents   .= "evttiming=". ($syncserver->enable_evt_timing ? 'true' : 'false') ."\n";
            $contents   .= "timezone=". ($syncserver->timezone->timezone ?? '') ."\n";
            $contents   .= "gap=". ($syncserver->grab_time)."\n";
            $contents   .= "adsminimumlength=\n";
            $contents   .= "filterpreset=". @$syncserver->filter_preset_for_uis ."\n";
            $contents   .= "\n";
            $contents   .= "[VIDEO]\n";
            $contents   .= "servertype=". ($syncserver->video_server_type ?? '')."\n";
            $contents   .= "serverurl=". ($syncserver->video_server_url ?? '')."\n";
            $contents   .= "hlsshift=". ($syncserver->video_hls_shift ?? '')."\n";
            $contents   .= "serverredirect=". ($syncserver->video_server_redirect ?? '')."\n";
            $contents   .= "hlsshiftperchannel=". ($syncserver->hls_shift_per_channel ?? '')."\n";
            $contents   .= "\n";
            $contents   .= "[EPG]\n";
            $contents   .= "country=". ($syncserver->country->title ?? '') ."\n";
            $contents   .= "\n";
            $contents   .= "[DAI]\n";
            $contents   .= "servertype=". @$servertype ."\n";
            $contents   .= "adslength=". ($syncserver->dai_ads_length ?? '')."\n";
            $contents   .= "notifications=". ($syncserver->dai_notifications ?? '')."\n";
            $contents   .= "adlengthsperchannel=". ($syncserver->dai_ad_lengths_per_channel ?? '')."\n";
            $contents   .= "offsetsperchannel=". ($syncserver->dai_offsets_per_channel ?? '')."\n";
            $contents   .= "minperhourperchannel=". ($syncserver->dai_min_per_hour_per_channel ??'')."\n";
            $contents   .= "notifygapperchannel=". ($syncserver->dai_notify_gapper_channel ??'')."\n";
            $contents   .= "adspacingsperchannel=". ($syncserver->dai_ad_spacings_per_channel ??'')."\n";
            $contents   .= "isnetlenperchannel=". ($syncserver->dai_is_netlen_per_channel ??'')."\n";

            $contents   .= "\n";
            $contents   .= "[AGGREGATION]\n";
            $contents   .= "aggregationserver=". ($syncserver->parent_as->as_host_url ??'')."\n";
            $contents   .= "babyservers=\n";
            $contents   .= "\n";
            $contents   .= "[CLIPDB]\n";
            $contents   .= "clipdburl=\n";
            $contents   .= "\n";
            $contents   .= "[ADMIN]\n";
            $contents   .= "username=". ($syncserver->advanced_username ??'')."\n";
            $contents   .= "password=". ($syncserver->advanced_password ??'')."\n";


            File::put($syncserverpath . '/settings.conf', $contents);
        }


        return view('preview.ss.modal-settings', compact('contents', 'groups', 'channel_servers', 'parent_as', 'notification_server_types', 'timezones', 'filter_preset_for_uis', 'countries', 'video_server_types', 'hosts', 'csos', 'csos', 'hosts', 'syncserver', 'syncserver','base_discovery_enabled',
            'continuous_discovery_enabled', 'servertype'));
    }

}
