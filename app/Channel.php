<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Channel
 *
 * @package App
 * @property string $source_name
 * @property string $channelid
 * @property string $env
 * @property string $ffmpegsource
 * @property string $ssm
 * @property string $imc
 * @property string $port
 * @property string $pid
 * @property string $source_ip
 * @property string $udp
 * @property string $valid_as_of
 * @property string $csi
*/
class Channel extends Model
{
    use SoftDeletes;

    protected $fillable = ['source_name', 'channelid', 'env', 'ffmpegsource', 'ssm', 'imc', 'port', 'pid', 'source_ip', 'udp', 'valid_as_of', 'csi_id'];

    protected $hidden = [];

    public static $searchable = [
        'source_name',
        'channelid'
    ];

    public static function boot()
    {
        parent::boot();

        Channel::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setValidAsOfAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['valid_as_of'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['valid_as_of'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getValidAsOfAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }


    public function setCsiIdAttribute($input)
    {
        $this->attributes['csi_id'] = $input ? $input : null;
    }

    public function csi()
    {
        return $this->belongsTo(Csi::class, 'csi_id')->withTrashed();
    }

}
