<?php

namespace Teamup\LogConnector\Services;

use Monolog\Logger;

class LogMonolog
{
    /**
     * Create a custom Monolog instance.
     *
     * @param  array  $config
     * @return \Monolog\Logger
     */
    public function __invoke(array $config)
    {
        $logger = new Logger('teamup-log');
        $logger->pushHandler(new LogHandler());
        $logger->pushProcessor(new LogProcessor());

        return $logger;
    }
}
