<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cso
 *
 * @package App
 * @property tinyInteger $use_channel_server_localhost
 * @property string $channel_server
 * @property string $channel
 * @property tinyInteger $use_as_for_a
 * @property string $select_aggregation_server_for_a
 * @property tinyInteger $use_sync_server_for_a
 * @property string $select_sync_server_for_a
 * @property tinyInteger $use_custom_a
 * @property string $ocloud_a
 * @property integer $ocp_a
 * @property tinyInteger $use_as_for_b
 * @property string $select_aggregation_server_for_b
 * @property tinyInteger $use_sync_server_for_b
 * @property string $select_sync_server_for_b
 * @property tinyInteger $use_custom_for_b
 * @property string $ocloud_b
 * @property string $ocp_b
*/
class Cso extends Model
{
    use SoftDeletes;

    protected $fillable = ['use_channel_server_localhost', 'use_as_for_a', 'use_sync_server_for_a', 'use_custom_a', 'ocloud_a', 'ocp_a', 'use_as_for_b', 'use_sync_server_for_b', 'use_custom_for_b', 'ocloud_b', 'ocp_b', 'channel_server_id', 'channel_id', 'select_aggregation_server_for_a_id', 'select_sync_server_for_a_id', 'select_aggregation_server_for_b_id', 'select_sync_server_for_b_id'];
    protected $hidden = [];
    public static $searchable = [
    ];

    public static function boot()
    {
        parent::boot();

        Cso::observe(new \App\Observers\UserActionsObserver);
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
    public function setChannelIdAttribute($input)
    {
        $this->attributes['channel_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setSelectAggregationServerForAIdAttribute($input)
    {
        $this->attributes['select_aggregation_server_for_a_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setSelectSyncServerForAIdAttribute($input)
    {
        $this->attributes['select_sync_server_for_a_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setOcpAAttribute($input)
    {
        $this->attributes['ocp_a'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setSelectAggregationServerForBIdAttribute($input)
    {
        $this->attributes['select_aggregation_server_for_b_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setSelectSyncServerForBIdAttribute($input)
    {
        $this->attributes['select_sync_server_for_b_id'] = $input ? $input : null;
    }

    public function channel_server()
    {
        return $this->belongsTo(ChannelServer::class, 'channel_server_id')->withTrashed();
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class, 'channel_id')->withTrashed();
    }

    public function select_aggregation_server_for_a()
    {
        return $this->belongsTo(AggregationServer::class, 'select_aggregation_server_for_a_id')->withTrashed();
    }

    public function select_sync_server_for_a()
    {
        return $this->belongsTo(Syncserver::class, 'select_sync_server_for_a_id')->withTrashed();
    }

    public function select_aggregation_server_for_b()
    {
        return $this->belongsTo(AggregationServer::class, 'select_aggregation_server_for_b_id')->withTrashed();
    }

    public function select_sync_server_for_b()
    {
        return $this->belongsTo(Syncserver::class, 'select_sync_server_for_b_id')->withTrashed();
    }

}
