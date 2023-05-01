<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Webpatser\Uuid\Uuid;

/**
 * Class Group
 *
 * @package App
 * @property integer $group
 * @property string $cs_token
 * @property text $details
 * @property text $notes
*/
class Group extends Model
{
    use SoftDeletes;

    protected $fillable = ['group', 'cs_token', 'details', 'notes'];
    protected $hidden = [];
    public static $searchable = [
    ];

    protected $casts = [
        '*' => 'array',
    ];


    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->cs_token = (string) Uuid::generate(3, $model->group, Uuid::NS_DNS);
        });

        Group::observe(new \App\Observers\UserActionsObserver);
    }


    public function setGroupAttribute($input)
    {
        $this->attributes['group'] = $input ? $input : null;
    }

    public function instances()
    {
        return $this->hasMany(Instance::class, 'group_id');
    }
}
