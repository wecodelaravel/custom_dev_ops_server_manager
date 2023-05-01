<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class NotificationServerType
 *
 * @package App
 * @property string $notification_server_type
*/
class NotificationServerType extends Model
{
    use SoftDeletes;

    protected $fillable = ['notification_server_type'];
    protected $hidden = [];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        NotificationServerType::observe(new \App\Observers\UserActionsObserver);
    }
    
}
