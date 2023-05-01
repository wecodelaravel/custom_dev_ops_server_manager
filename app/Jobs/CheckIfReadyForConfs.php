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

class CheckIfReadyForConfs implements ShouldQueue
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
           if(!$host->ready_to_receive_conf == '1')
           {
               try{

                   if(JobHelpers::ReadyForConfs("http://" . $host->host. '/ftp/php/phpcheck.php?json'))
                   {

                       $host->update(['ready_to_receive_conf' => '1']);
                       Log::alert("ready_to_receive_conf: " . $host->host. '/ftp/php/phpcheck.php?json');
                   }
                   else
                   {
                       $host->update(['ready_to_receive_conf' => '0']);
                       Log::error("CAIPY NOT SETUP FOR ". $host->host);
                   }

               } catch (\Exception $e) {
                   Log::error($e->getMessage());
               }
            }
        }
    }
}
