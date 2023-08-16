<?php

namespace Teamup\LogConnector\Actions;

use Teamup\LogConnector\Jobs\SendLog;

class PushLog
{
    /**
     * Invoke the Push Log class.
     */
    public function __invoke($data)
    {
        $useDefault = config('tup-logs.use_default');
        $hostKey = $useDefault ? 'tup-logs.host' : 'queue.connections.rabbitmq.host';
        $portKey = $useDefault ? 'tup-logs.port' : 'queue.connections.rabbitmq.port';
        $usernameKey = $useDefault ? 'tup-logs.username' : 'queue.connections.rabbitmq.username';
        $passwordKey = $useDefault ? 'tup-logs.password' : 'queue.connections.rabbitmq.password';

        $queueManager = app('queue');
        $queue = $queueManager->connection('rabbitmq', [
            'host' => config($hostKey),
            'port' => config($portKey),
            'username' => config($usernameKey),
            'password' => config($passwordKey),
            'queue' => 'logbugger',
        ]);

        $queue->pushOn('logbugger', new SendLog($data));
    }
}
