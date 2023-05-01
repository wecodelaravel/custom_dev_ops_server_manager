<?php

namespace App\Jobs;

use App\Helpers\JobHelpers;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Host;
use App\ChannelServer;
use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Channel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class CaipyIsSetupCheck implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public function __construct()
    {
        //
    }

    public function handle(Group $group, Request $request)
    {
        // event(new ServerExistsCheckJobRun);
        $group = $request->group;

        // dd($this->group);

       $hosts = \App\Host::where('group_id', $request->group)->get();

       // dd($hosts);
       foreach($hosts as $host)
       {
           if(!$host->caipy_is_setup == '1')
           {
               try{

                   if(JobHelpers::CaipySetupCheck("http://" . $host->host. '/ftp/php/phpcheck.php?json'))
                   {

                       $host->update(['caipy_is_setup' => '1']);

                       Log::alert("caipy_is_setup: " . $host->host. '/ftp/php/phpcheck.php?json');
                   }
                   else
                   {
                       $host->update(['caipy_is_setup' => '0']);
                       Log::error("CAIPY NOT SETUP FOR ". $host->host);
                   }

               } catch (\Exception $e) {
                   Log::error($e->getMessage());
               }
            }
        }
    }
}
