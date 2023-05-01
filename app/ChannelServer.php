<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Webpatser\Uuid\Uuid;
use Hash;

/**
 * Class ChannelServer
 *
 * @package App
 * @property string $group
 * @property string $cs_name
 * @property string $cs_host
 * @property string $cs_host_ip
 * @property string $cs_token
 * @property text $notes
 * @property string $username
 * @property string $password
 * @property string $host
 * @property string $default_cloud_a_address
 * @property string $default_cloud_a_port
 * @property string $default_cloud_b_address
 * @property string $default_cloud_b_port
 * @property string $local_output
 * @property string $local_output_port
*/
class ChannelServer extends Model
{
    use SoftDeletes;

    protected $fillable = ['cs_name', 'cs_host', 'cs_host_ip', 'cs_token', 'notes', 'username', 'password', 'default_cloud_a_address', 'default_cloud_a_port', 'default_cloud_b_address', 'default_cloud_b_port', 'local_output', 'local_output_port', 'license', 'group_id', 'host_id'];

    public static $searchable = [
        'cs_name',
        'cs_host',
        'cs_host_ip',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->cs_token = (string) Uuid::generate(3, $model->cs_name, Uuid::NS_DNS);
        });

//        $contents .= "LIC=ChannelServer-AA-1.0-20991231-". date('Ymd', strtotime($channel_server->created_at)) . "-DISHCS!" . strtoupper(str_pad($str, 40, "0")) . "\n";

        ChannelServer::observe(new \App\Observers\UserActionsObserver);

        ChannelServer::observe(new \App\Observers\ChannelServerCrudActionObserver);
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
    public function setGroupIdAttribute($input)
    {
        $this->attributes['group_id'] = $input ? $input : null;
    }

    public function csis()
    {
        return $this->hasMany(Csi::class);
    }


    public function channels()
    {
        return $this->hasManyThrough(Channel::class, Csi::class, 'channel_server_id', 'channel_id', 'id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id')->withTrashed();
    }

    public function host()
    {
        return $this->belongsTo(Host::class, 'host_id')->withTrashed();
    }

}
