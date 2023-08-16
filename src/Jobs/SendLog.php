<?php

namespace Teamup\LogConnector\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendLog implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $log;

    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->log = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if (class_exists(\App\Services\LogsService::class)) {
            (new \App\Services\LogsService())->createLog($this->log);
        }   
    }
}
