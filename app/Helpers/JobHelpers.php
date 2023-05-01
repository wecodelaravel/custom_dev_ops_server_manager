<?php
/**
 * Created by PhpStorm.
 * User: phillip.madsen
 * Date: 7/15/2019
 * Time: 2:07 PM
 */

namespace App\Helpers;


class JobHelpers
{


    public static function ServerExists($host){
        $headers=get_headers($host);

        return stripos($headers[0],"200 OK") ? true : false;
    }

    public static function ReadyForConfs($host){
        $headers=get_headers($host);
        return stripos($headers[0],"200 OK") ? true : false;
    }

    public static function CaipySetupCheck($host){
        $headers=get_headers($host);
        return stripos($headers[0],"200 OK") ? true : false;
    }
}
