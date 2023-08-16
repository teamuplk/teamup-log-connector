<?php

namespace Teamup\LogConnector\Services;

use Monolog\Logger;
use Teamup\LogConnector\Actions\PushLog;
use Monolog\Handler\AbstractProcessingHandler;
use Teamup\LogConnector\Actions\ValidateConfigFields;

class TeamUpLogHandler extends AbstractProcessingHandler
{
    public function __construct($level = Logger::DEBUG, bool $bubble = true)
    {
        parent::__construct($level, $bubble);
    }

    protected function write(\Monolog\LogRecord $record): void
    {
        (new ValidateConfigFields)();
        (new PushLog)($this->mapRecordData($record));
    }

    public function mapRecordData($record)
    {
        $data = [
            'appName' => config('tup-logs.app_name'),
            'appStage' => config('tup-logs.app_stage'),
            'timestamp' => $this->getNanosecondsTimestamp(),
            'type' => $record['level_name'],
            'message' => $record['message'],
            'content' => $this->mapContext($record['context'])
        ];

        return $data;
    }

    function getNanosecondsTimestamp()
    {
        return (int)(microtime(true) * 1e9);
    }

    function mapContext($data)
    {
        $finalString = '';
        foreach ($data as $key => $value) {
            $finalString .= ' ' . $key . ' : ' . $value . ' ';
        }
        return $finalString;
    }
}
