<?php

namespace Teamup\LogConnector\Services;

use Monolog\Logger;

class TeamUpLogMonolog
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
        $logger->pushHandler(new TeamUpLogHandler());

        return $logger;
    }
}
