<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Status
 *
 * @package App
 * @property string $status
*/
class Status extends Model
{
    use SoftDeletes;

    protected $fillable = ['status', 'host_id'];
    protected $hidden = [];
    public static $searchable = [
    ];

    public static function boot()
    {
        parent::boot();

        Status::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setHostIdAttribute($input)
    {
        $this->attributes['host_id'] = $input ? $input : null;
    }

    public function host()
    {
        return $this->belongsTo(Host::class, 'host_id')->withTrashed();
    }

}
