<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Environment
 *
 * @package App
 * @property string $environment
 * @property string $env_value
*/
class Environment extends Model
{
    use SoftDeletes;

    protected $fillable = ['environment', 'env_value'];
    protected $hidden = [];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        Environment::observe(new \App\Observers\UserActionsObserver);
    }
    
}
