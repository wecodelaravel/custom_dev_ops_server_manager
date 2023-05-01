<?php

namespace App\Observers;

use App\ChannelServer;
use App\Notifications\QA_EmailNotification;
use Illuminate\Support\Facades\Notification;

class ChannelServerCrudActionObserver
{

    public function created(ChannelServer $model)
    {
        $emails = ["example@email.com"];
        $data = [
            "action" => "Created",
            "crud_name" => "ChannelServers"
        ];

        $users = \App\User::where("email", $emails)->get();
        Notification::send($users, new QA_EmailNotification($data));

    }

    

    

}