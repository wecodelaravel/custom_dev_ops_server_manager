<?php

declare(strict_types=1);

if (! function_exists('channelconf')) {
    /**
     * Access the escapeSlashes helper.
     */
    function ChannelIDs($id): void
    {
        $channel_server = \App\ChannelServer::findOrFail($id);

        $csis = \App\Csi::where('channelserver_id', $id)->get();

        $channelserverpath   = public_path('configs/cs/'. $channel_server->cs_host);

        File::isDirectory($channelserverpath) or File::makeDirectory($channelserverpath, 0777, true, true);

        if (file_exists($channelserverpath)) {
            $contents = [];

            $contents = "";
            if ($csis) {
                foreach ($csis as $csi) {
                    // $contents .= "\n";
                    $contents .= ''.$csi->channel->channel_name.','.$csi->channel->channel_type."\n";
                    // $contents .= "\n";
                }
            }

            $contents .= "# CREATED: " .date('m-d-Y H:i:s')."\n";
            // $contents .= "\n";


            //dd($contents);

            File::put($channelserverpath.$channel_server->name.'/ChannelIDs.conf', $contents);

            Log::info('BOTTON: Created ChannelServer.conf NAMED: '.$channel_server->name.' ID:'.$id.' ON: '.date('Y-m-d H:i:s'));
        }
    }
}
