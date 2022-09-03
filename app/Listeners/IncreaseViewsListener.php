<?php

namespace App\Listeners;

use App\Events\WatchVideoEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncreaseViewsListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(WatchVideoEvent $event)
    {
        //
        // if (session()->has('videoIsVisited')) {
            $this->updateViews($event->video);
        // }
    }

    protected function updateViews($video)
    {
        $video->views += 1;
        $video->save();

        session()->put('videoIsVisited', $video->id);
    }
}
