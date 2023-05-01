<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Arr;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Stream\Stream;
use App\Helpers\General;
use App\Channel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\MessageBag;
use Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class GuzzleController extends Controller
{

// $data[0]->encoder->feed->FFMpegSource

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



    public function getDevData()
    {
        $client = new Client([
            'headers' => ['content-type' => 'application/json', 'Accept'  => 'application/json'],
        ]);

        $request = $client->request('GET', 'http://example.com/source');

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
            $newchannelid                    = Str::slug($tolower, '-') . ".dev";



            try {
                DB::table('channels')
                    ->updateOrInsert(
                        ['source_name' => $channel->source_name, 'channelid' => $newchannelid],
                        [
                            'source_name'            => $channel->source_name,
                            'channelid'              => Str::slug($tolower, '-') . ".dev",
                            'env'                    => 'dev',
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
                Log::info("Dev Channel Added: " . $channel->source_name);
            } catch (\Exception $e) {
                Log::alert($e);
            }

            $channel =[
                'source_name'            => $channel->source_name,
                'channelid'              => Str::slug($tolower, '-') . ".dev",
                'env'                    => 'dev',
                'source_ip'              => $imc,
                'udp'                    => $ssm,
                'ffmpegsource'           => $ffmpegsource,
                'ssm'                    => $ssm,
                'imc'                    => $imc,
                'port'                   => $ip,
                'pid'                    => $audiopid,
                'valid_as_of'            => $now
            ];

            $channels[]                      = $channel;
        }



        return response()->json(['dev_channels' => $channels]);
    }





    public function getBetaData()
    {
        $client = new Client([
            'headers' => ['content-type' => 'application/json', 'Accept'  => 'application/json'],
        ]);

        $request = $client->request('GET', 'http://example.com/source');

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
            $newchannelid                    = Str::slug($tolower, '-') . ".beta";

            try {
                DB::table('channels')
                    ->updateOrInsert(
                        ['source_name' => $channel->source_name, 'channelid' => $newchannelid],
                        [
                            'source_name'            => $channel->source_name,
                            'channelid'              => Str::slug($tolower, '-') . ".beta",
                            'env'                    => 'beta',
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
                Log::info("Beta Channel Added: " . $channel->source_name);
            } catch (\Exception $e) {
                Log::alert($e);
            }

            $channel =[
                'source_name'            => $channel->source_name,
                'channelid'              => Str::slug($tolower, '-') . ".beta",
                'env'                    => 'beta',
                'source_ip'              => $imc,
                'udp'                    => $ssm,
                'ffmpegsource'           => $ffmpegsource,
                'ssm'                    => $ssm,
                'imc'                    => $imc,
                'port'                   => $ip,
                'pid'                    => $audiopid,
                'valid_as_of'            => $now
            ];

            $channels[]                      = $channel;
        }



        return response()->json(['beta_channels' => $channels]);
    }


    public function getQaData()
    {
        $client = new Client([
            'headers' => ['content-type' => 'application/json', 'Accept'  => 'application/json'],
        ]);

        $request = $client->request('GET', 'http://example.com/source');

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
                Log::info("QA Channel Added: " . $channel->source_name);
            } catch (\Exception $e) {
                Log::alert($e);
            }

            $channel =[
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
            ];

            $channels[]                      = $channel;
        }



        return response()->json(['qa_channels' => $channels]);
    }



    public function StatusCodeHandling($e)
    {
        if ($e->getResponse()->getStatusCode() == '400') {
            $this->prepare_access_token();
        } elseif ($e->getResponse()->getStatusCode() == '422') {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
        } elseif ($e->getResponse()->getStatusCode() == '500') {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
        } elseif ($e->getResponse()->getStatusCode() == '401') {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
        } elseif ($e->getResponse()->getStatusCode() == '403') {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
        } else {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
        }
    }

}
