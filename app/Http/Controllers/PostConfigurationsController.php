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
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\MessageBag;
use Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PostConfigurationsController extends Controller
{



        public function sendConfigurations(Request $request)
        {
            $configFiles = [
                "ChannelIDs" => "/home/manager/ChannelServer/ctrl/ChannelIDs.conf",
                "ChannelServer" => "/home/manager/ChannelServer/ctrl/ChannelServer.conf",
                "Settings" => "/home/manager/ChannelServer/ctrl/settings.conf",
            ];

            $client = new Client([
                'headers' => ['content-type' => 'application/json', 'Accept'  => 'application/json'],
            ]);

            $body = fopen('/path/to/file', 'r');
            $r = $client->request('POST', 'http://httpbin.org/post', ['body' => $body]);

                // Storage::disk('ftp')->put($filenametostore, fopen($request->file('profile_image'), 'r+'));

                // $content   = $fileObject->fread($file->getSize());
        }

        public function cs_exists(Request $request)
        {

            $client = new Client([
                'headers' => ['content-type' => 'application/json', 'Accept'  => 'application/json'],
            ]);

            try {
                $client->request('GET', $request->host);
            } catch (ClientException $e) {
                echo Psr7\str($e->getRequest());
                echo Psr7\str($e->getResponse());
            }

        }

        public function cs_configs(Request $request)
        {

            $client = new Client([
                'headers' => ['content-type' => 'application/json', 'Accept'  => 'application/json'],
            ]);

            // $body = fopen('/path/to/file', 'r');
            $body = $request->body;




            // $encrypted = Crypt::encryptString($body);

            // $decrypted = Crypt::decryptString($encrypted);

            // $encrypted = \App\Helpers\Script::manager_encrypt($body);

            // dd($encrypted);

            \Log::info($request->host. "/cs/php/config.php");

            try {
                $client->request('PUT', $request->host. "/cs/php/config.php", ['body' => $body]);
            } catch (ClientException $e) {
                echo Psr7\str($e->getRequest());
                echo Psr7\str($e->getResponse());
            }


        }

         public function ss_configs(Request $request)
        {

            $client = new Client([
                'headers' => ['content-type' => 'application/json', 'Accept'  => 'application/json'],
            ]);

            // $body = fopen('/path/to/file', 'r');
            $body = $request->ss_confs;


            dd($ss_confs);

            // $encrypted = Crypt::encryptString($body);

            // $decrypted = Crypt::decryptString($encrypted);

            // $encrypted = \App\Helpers\Script::manager_encrypt($body);

            // dd($encrypted);

            \Log::info($request->host. "/ftp/php/config.php");

            try {
                $client->request('PUT', $request->host. "/ftp/php/config.php", ['body' => $body]);
            } catch (ClientException $e) {
                echo Psr7\str($e->getRequest());
                echo Psr7\str($e->getResponse());
            }


        }

        public function test(Request $request)
        {
            return  $request->cs_confs;
        }
}
