<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Timezone
 *
 * @package App
 * @property string $timezone
*/
class Timezone extends Model
{
    use SoftDeletes;

    protected $fillable = ['timezone'];
    protected $hidden = [];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        Timezone::observe(new \App\Observers\UserActionsObserver);
    }
    
}
