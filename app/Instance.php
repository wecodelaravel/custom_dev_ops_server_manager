<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Instance
 *
 * @package App
 * @property string $group
 * @property integer $quantity_to_create
 * @property string $role_convention
 * @property string $channel_server
 * @property string $aggregation_server
 * @property string $env
 * @property text $details
 * @property text $notes
 * @property string $cs_token
*/
class Instance extends Model
{
    use SoftDeletes;

    protected $fillable = ['quantity_to_create', 'details', 'notes', 'cs_token', 'group_id', 'role_convention_id', 'channel_server_id', 'aggregation_server_id', 'env_id'];

    protected $hidden = [];

    public static $searchable = [];

    protected $casts = [
        'details' => 'array',
        '*' => 'array',
    ];

    public static function boot()
    {
        parent::boot();

        Instance::observe(new \App\Observers\UserActionsObserver);
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
     * Set attribute to money format
     * @param $input
     */
    public function setQuantityToCreateAttribute($input)
    {
        $this->attributes['quantity_to_create'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setRoleConventionIdAttribute($input)
    {
        $this->attributes['role_convention_id'] = $input ? $input : null;
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
    public function setAggregationServerIdAttribute($input)
    {
        $this->attributes['aggregation_server_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setEnvIdAttribute($input)
    {
        $this->attributes['env_id'] = $input ? $input : null;
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id')->withTrashed();
    }

    public function role_convention()
    {
        return $this->belongsTo(RoleConvention::class, 'role_convention_id')->withTrashed();
    }

    public function channel_server()
    {
        return $this->belongsTo(ChannelServer::class, 'channel_server_id')->withTrashed();
    }

    public function aggregation_server()
    {
        return $this->belongsTo(AggregationServer::class, 'aggregation_server_id')->withTrashed();
    }

    public function env()
    {
        return $this->belongsTo(Environment::class, 'env_id')->withTrashed();
    }

    public function hosts()
    {
        return $this->belongsToMany(Host::class, 'host_instance')->withTrashed();
    }


}
