<?php

namespace Teamup\LogConnector\Services;

class LogProcessor
{
    public function __invoke(array $record)
    {
        $record['extra'] = [
            'app' => 'app_id'
        ];

        return $record;
    }
}
