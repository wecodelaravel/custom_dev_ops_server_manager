<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Host
 *
 * @package App
 * @property string $name
 * @property string $host
 * @property tinyInteger $server_exists
 * @property tinyInteger $caipy_is_setup
 * @property tinyInteger $ready_to_receive_conf
 * @property string $last_received_conf
 * @property tinyInteger $configured
 * @property text $notes
 * @property string $cs_token
 * @property string $group
 * @property string $status
 * @property string $instance
 * @property string $rc
 * @property string $ss_func
*/
class Host extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'host', 'server_exists', 'caipy_is_setup', 'ready_to_receive_conf', 'last_received_conf', 'configured', 'notes', 'cs_token', 'group_id', 'status_id', 'instance_id', 'rc_id', 'ss_func_id'];
    protected $hidden = [];
    public static $searchable = [
    ];

    public static function boot()
    {
        parent::boot();

        Host::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setLastReceivedConfAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['last_received_conf'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['last_received_conf'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getLastReceivedConfAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
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
    public function setStatusIdAttribute($input)
    {
        $this->attributes['status_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setInstanceIdAttribute($input)
    {
        $this->attributes['instance_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setRcIdAttribute($input)
    {
        $this->attributes['rc_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setSsFuncIdAttribute($input)
    {
        $this->attributes['ss_func_id'] = $input ? $input : null;
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id')->withTrashed();
    }

    public function channel_server()
    {
        return $this->hasOne(ChannelServer::class)->withTrashed();
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id')->withTrashed();
    }

    public function instance()
    {
        return $this->belongsTo(Instance::class, 'instance_id')->withTrashed();
    }

    public function rc()
    {
        return $this->belongsTo(RoleConvention::class, 'rc_id')->withTrashed();
    }

    public function ss_func()
    {
        return $this->belongsTo(SyncServerFunction::class, 'ss_func_id')->withTrashed();
    }

}
