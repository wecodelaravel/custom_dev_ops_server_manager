<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Hash;
use Illuminate\Database\Eloquent\SoftDeletes;



/**
 * Class Syncserver
 *
 * @package App
 * @property string $ss_type
 * @property string $ss_name
 * @property string $ss_host_url
 * @property string $ss_hostip
 * @property string $group
 * @property string $channel_server
 * @property string $parent_as
 * @property string $grab_time
 * @property string $transcoding_server
 * @property integer $max_upload_filesize
 * @property time $report_time
 * @property string $report_email
 * @property integer $max_days_channel_history
 * @property string $notification_server_type
 * @property string $real_time_notification_url
 * @property tinyInteger $basic_discovery_enabled
 * @property tinyInteger $continuous_discovery_enabled
 * @property string $username
 * @property string $password
 * @property string $advanced_username
 * @property string $advanced_password
 * @property tinyInteger $millisecond_precision
 * @property tinyInteger $show_channel_button
 * @property tinyInteger $show_clip_button
 * @property tinyInteger $show_group_button
 * @property tinyInteger $show_live_button
 * @property tinyInteger $enable_evt
 * @property tinyInteger $enable_excel
 * @property string $enable_evt_timing
 * @property string $timezone
 * @property string $filter_preset_for_ui
 * @property string $video_server_type
 * @property string $video_server_url
 * @property integer $video_hls_shift
 * @property string $video_server_redirect
 * @property string $hls_shift_per_channel
 * @property string $country
 * @property string $cs_token
 * @property string $dai_ads_length
 * @property string $dai_notifications
 * @property string $dai_ad_lengths_per_channel
 * @property string $dai_offsets_per_channel
 * @property string $dai_min_per_hour_per_channel
 * @property string $dai_notify_gapper_channel
 * @property string $dai_ad_spacings_per_channel
 * @property string $dai_is_netlen_per_channel
 * @property string $license
 * @property string $host
 * @property string $imc
 * @property string $ip
 * @property string $itcpport
 * @property tinyInteger $mobile
 * @property tinyInteger $clips
 * @property tinyInteger $rtclips
 * @property tinyInteger $p1_match
 * @property tinyInteger $doublef0_match
 * @property tinyInteger $full_match
 * @property tinyInteger $do_notify_url
 * @property tinyInteger $record
 * @property string $clip_refresh_secs
 * @property string $threshold_nr_p1_matches_times_hundred
 * @property string $threshold_nr_doublef0_matches_times_hundred
 * @property string $threshold_nr_3smatches_times_hundred
 * @property string $threshold_nr_matches_times_hundred
 * @property string $clip_len_notify_secs
 * @property string $clip_notifyurl_script
 * @property string $clip_dir
*/
class Syncserver extends Model
{
    use SoftDeletes;

    protected $fillable = ['ss_name', 'ss_host_url', 'ss_hostip', 'grab_time', 'transcoding_server', 'max_upload_filesize', 'report_time', 'report_email', 'max_days_channel_history', 'real_time_notification_url', 'basic_discovery_enabled', 'continuous_discovery_enabled', 'username', 'password', 'advanced_username', 'advanced_password', 'millisecond_precision', 'show_channel_button', 'show_clip_button', 'show_group_button', 'show_live_button', 'enable_evt', 'enable_excel', 'enable_evt_timing', 'video_server_url', 'video_hls_shift', 'video_server_redirect', 'hls_shift_per_channel', 'cs_token', 'dai_ads_length', 'dai_notifications', 'dai_ad_lengths_per_channel', 'dai_offsets_per_channel', 'dai_min_per_hour_per_channel', 'dai_notify_gapper_channel', 'dai_ad_spacings_per_channel', 'dai_is_netlen_per_channel', 'license', 'imc', 'ip', 'itcpport', 'mobile', 'clips', 'rtclips', 'p1_match', 'doublef0_match', 'full_match', 'do_notify_url', 'record', 'clip_refresh_secs', 'threshold_nr_p1_matches_times_hundred', 'threshold_nr_doublef0_matches_times_hundred', 'threshold_nr_3smatches_times_hundred', 'threshold_nr_matches_times_hundred', 'clip_len_notify_secs', 'clip_notifyurl_script', 'clip_dir', 'ss_type_id', 'group_id', 'channel_server_id', 'parent_as_id', 'notification_server_type_id', 'timezone_id', 'filter_preset_for_ui_id', 'video_server_type_id', 'country_id', 'host_id'];

    protected $hidden = [];

    public static $searchable = [
        'ss_name',
        'ss_host_url',
        'ss_hostip',
    ];

    public static function boot()
    {
        parent::boot();

        Syncserver::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setSsTypeIdAttribute($input)
    {
        $this->attributes['ss_type_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setGroupIdAttribute($input)
    {
        $this->attributes['group_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setChannelServerIdAttribute($input)
    {
        $this->attributes['channel_server_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setParentAsIdAttribute($input)
    {
        $this->attributes['parent_as_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setMaxUploadFilesizeAttribute($input)
    {
        $this->attributes['max_upload_filesize'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setReportTimeAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['report_time'] = Carbon::createFromFormat('H:i:s', $input)->format('H:i:s');
        } else {
            $this->attributes['report_time'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getReportTimeAttribute($input)
    {
        if ($input != null && $input != '') {
            return Carbon::createFromFormat('H:i:s', $input)->format('H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setMaxDaysChannelHistoryAttribute($input)
    {
        $this->attributes['max_days_channel_history'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setNotificationServerTypeIdAttribute($input)
    {
        $this->attributes['notification_server_type_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setTimezoneIdAttribute($input)
    {
        $this->attributes['timezone_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setFilterPresetForUiIdAttribute($input)
    {
        $this->attributes['filter_preset_for_ui_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCountryIdAttribute($input)
    {
        $this->attributes['country_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setVideoServerTypeIdAttribute($input)
    {
        $this->attributes['video_server_type_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setVideoHlsShiftAttribute($input)
    {
        $this->attributes['video_hls_shift'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setHostIdAttribute($input)
    {
        $this->attributes['host_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setLicenseIdAttribute($input)
    {
        $this->attributes['license_id'] = $input ? $input : null;
    }

    public function ss_type()
    {
        return $this->belongsTo(SyncServerFunction::class, 'ss_type_id')->withTrashed();
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id')->withTrashed();
    }

    public function channel_server()
    {
        return $this->belongsTo(ChannelServer::class, 'channel_server_id')->withTrashed();
    }

    public function parent_as()
    {
        return $this->belongsTo(AggregationServer::class, 'parent_as_id')->withTrashed();
    }

    public function notification_server_type()
    {
        return $this->belongsTo(NotificationServerType::class, 'notification_server_type_id')->withTrashed();
    }

    public function timezone()
    {
        return $this->belongsTo(Timezone::class, 'timezone_id')->withTrashed();
    }

    public function filter_preset_for_ui()
    {
        return $this->belongsTo(Filter::class, 'filter_preset_for_ui_id')->withTrashed();
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id')->withTrashed();
    }

    public function video_server_type()
    {
        return $this->belongsTo(VideoServerType::class, 'video_server_type_id')->withTrashed();
    }

    public function host()
    {
        return $this->belongsTo(Host::class, 'host_id')->withTrashed();
    }

    public function csis()
    {
        return $this->hasMany(Csi::class);
    }

    public function license()
    {
        return $this->belongsTo(ChannelServer::class, 'license_id')->withTrashed();
    }
}
