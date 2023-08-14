<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Broadcasting\Channel;

class CountdownBroadcaster implements ShouldQueue, ShouldBroadcast
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $count;

    /**
     * Create a new job instance.
     */
    public function __construct($count)
    {
        $this->count = $count;
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
    }

    public function broadcastOn()
    {
        return new Channel('countdown');
    }

    public function broadcastWith()
    {
        return ['count' => $this->count];
    }
}
