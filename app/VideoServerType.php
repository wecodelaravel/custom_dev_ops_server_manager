<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class VideoServerType
 *
 * @package App
 * @property string $video_server_type
*/
class VideoServerType extends Model
{
    use SoftDeletes;

    protected $fillable = ['video_server_type'];
    protected $hidden = [];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        VideoServerType::observe(new \App\Observers\UserActionsObserver);
    }
    
}
