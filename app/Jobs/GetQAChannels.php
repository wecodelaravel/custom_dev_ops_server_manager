<?php

namespace App\Jobs;

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
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Events\DevChannelsUpdated;
use App\Listeners\DevChannelUpdateListener;

class GetQAChannels implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->channel = $channels;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \Log::info("I am working in the background updating the QA channels.");

        $client = new Client([
            'headers' => ['content-type' => 'application/json', 'Accept'  => 'application/json'],
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
            $newchannelid                    = $channel->source_name . ".qa";

            try {
                DB::table('channels')
                    ->updateOrInsert(
                        ['source_name' => $channel->source_name, 'channelid' => $newchannelid],
                        [
                            'source_name'            => $channel->source_name,
                            'channelid'              => $channel->source_name . ".qa",
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
                Log::info("QA Channel Added: " . $channel->source_name);
            } catch (\Exception $e) {
                Log::alert($e);
            }

            $channels[]                      = $channel;
        }




        /** debug: ============================================  */
        if (getenv('CUSTOMDEBUG') === 'ON') {
            // Log::info("message here: ");
        }
    }
}
