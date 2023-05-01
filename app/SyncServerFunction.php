<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SyncServerFunction
 *
 * @package App
 * @property string $type
 * @property string $description
*/
class SyncServerFunction extends Model
{
    use SoftDeletes;

    protected $fillable = ['type', 'description'];
    protected $hidden = [];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        SyncServerFunction::observe(new \App\Observers\UserActionsObserver);
    }
    
}
