<?php

namespace App\Listeners;

use App\Events\RealtimeEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RealtimeEventListener
{
    use InteractsWithQueue;


    public function handle(RealtimeEvent $event)
    {
        $dataFromESP32 = $event->data;
    }

    private function sendResponseToESP32()
    {
        //
    }
}
