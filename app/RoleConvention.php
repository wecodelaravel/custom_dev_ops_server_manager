<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RoleConvention
 *
 * @package App
 * @property string $role_convention
 * @property string $role_convention_value
*/
class RoleConvention extends Model
{
    use SoftDeletes;

    protected $fillable = ['role_convention', 'role_convention_value'];
    protected $hidden = [];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        RoleConvention::observe(new \App\Observers\UserActionsObserver);
    }
    
}
