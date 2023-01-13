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

    protected function write(array $record): void
    {
        if ($this->validateConfigs()) {
            $data = $this->mapRecordData($record);
            (new PushLog)($data);
        }
    }

    public function validateConfigs(): bool
    {
        $validation = (new ValidateConfigFields)();
        return $validation['status'];
    }

    public function mapRecordData($record): string
    {
        $app_name = config('teamup-logs.app_name');
        $app_stage = config('teamup-logs.app_stage');
        $timestamp = $this->getNanosecondsTimestamp();
        $type = $record['level_name'];
        $log_message = $record['message'];
        $content = $this->mapContext($record['context']);

        $data = '{"streams": [{"stream": {"app": "' . $app_name . '","stage": "' . $app_stage . '" ,"type": "' . $type . '", "data": "' . $content . '" },"values": [[ "' . $timestamp . '", "' . $log_message . '" ]]}]}';
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
            $finalString.= ' '.$key.' : '.$value.' ';
        }
        return $finalString;
    }
}
