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


class HostServerCheck implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Request $request)
    {
        $host = $request->host;

        try{

           if(JobHelpers::ServerExists("http://" . $host->host))
           {

               $host->update(['server_exists' => '1']);
               Log::alert("HOST CHECK server_exists: " . $host->host);
           }
           else
           {
               $host->update(['server_exists' => '0']);
               Log::error("HOST CHECK " .$host->host . " DOES NOT EXIST");
           }

        } catch (\Exception $e) {
           Log::error($e->getMessage());
        }

    }
}
