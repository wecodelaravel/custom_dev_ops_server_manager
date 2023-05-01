<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Arr;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Stream\Stream;
use App\Helpers\General;
use App\Channel;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UpdateQAChannels extends Command
{
    /**
      * The name and signature of the console command.
      *
      * @var string
      */
    protected $signature = 'channels:update-qa';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the QA channels from the command line';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * break json result up into variables
     *
     * @param      <type>  $delimiters  The delimiters
     * @param      <type>  $string      The string
     * @return     <type>  returns value
     */
    public function multiexplode($delimiters, $string)
    {
        $ready = str_replace($delimiters, $delimiters[0], $string);
        $launch = explode($delimiters[0], $ready);
        return  $launch;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->comment('=====================================');
        $this->info("Updating the QA channels");
        $this->comment('=====================================');
        $this->comment('');
        $client = new Client([
            'headers' => ['content-type' => 'application/json', 'Accept'  => 'application/json'],
                        'connect_timeout' => 20.0,
            'timeout' => 1800.0,
        ]);

        $request = $client->request('GET', 'http://q-gp2-dynadm-1.imovetv.com/dyna_app/source');

        $data = json_decode($request->getBody()->getContents(), false);
        $channels = [];
        $source_name = \Arr::pluck($data, 'source_name');
        $audiopid = \Arr::pluck($data, 'encoder.feed.audiopid');
        $ffmpegsource = \Arr::pluck($data, 'encoder.feed.FFMpegSource');

        $existing_channels = Channel::all();

        foreach ($data as $channel) {
            $now                             = date('Y-m-d H:i:s');
            $audiopid                        = data_get($channel, 'encoder.feed.audiopid');
            ;
            $ffmpegsource                    = data_get($channel, 'encoder.feed.FFMpegSource');
            $exploded                        = $this->multiexplode(array(",","?","|",":","=","&"), data_get($channel, 'encoder.feed.FFMpegSource'));
            $variables                       = Arr::flatten($exploded);

            $ssm                             = (!isset($variables[1]) ? "" : (str_replace("//", "", $variables[1])));
            $ip                              = (!isset($variables[2]) ? "" : $variables[2]);
            $imc                             = (!isset($variables[4]) ? "" : $variables[4]);
            $tolower = strtolower($channel->source_name);
            $newchannelid                    = Str::slug($tolower, '-') . ".qa";

            try {
                DB::table('channels')
                    ->updateOrInsert(
                        ['source_name' => $channel->source_name, 'channelid' => $newchannelid],
                        [
                            'source_name'            => $channel->source_name,
                            'channelid'              => Str::slug($tolower, '-') . ".qa",
                            'env'                    => 'qa',
                            'source_ip'              => $imc,
                            'udp'                    => $ssm,
                            'ffmpegsource'           => $ffmpegsource,
                            'ssm'                    => $ssm,
                            'imc'                    => $imc,
                            'port'                   => $ip,
                            'pid'                    => $audiopid,
                            'valid_as_of'            => $now
                        ]
                    );
                $this->info("QA Channel Added: " . $channel->source_name);
                // $this->info("QA Channels Successfully Updated @:". Carbon::now()->diffForHumans());
            } catch (\Exception $e) {
                Log::alert($e);
            }

            $channels[]                      = $channel;
        }

        $this->comment('');
        $this->comment('=====================================');
        $this->info("QA Channels Successfully Updated @:". Carbon::now()->diffForHumans());
        $this->comment('=====================================');
        $this->comment('');

        Log::info("QA Channels Successfully Updated @:". Carbon::now());




        /** debug: ============================================  */
        if (getenv('CUSTOMDEBUG') === 'ON') {
            // Log::info("message here: ");
        }
    }
}
