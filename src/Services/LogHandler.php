<?php

namespace Teamup\LogConnector\Services;

use Monolog\Logger;
use Monolog\LogRecord;
use Monolog\Handler\AbstractProcessingHandler;
use Teamup\LogConnector\Actions\ValidateConfigFields;

class LogHandler extends AbstractProcessingHandler
{
    public function __construct($level = Logger::DEBUG, bool $bubble = true)
    {
        parent::__construct($level, $bubble);
    }

    protected function write(array $record): void
    {
        if ($this->validateConfigs()) {
            $data = $this->mapRecordData($record);
            (new CreateLog)($data);
        }
        // handle creation of log record on prd instance
        // Log::channel('single')->info('LogHandler write!');
    }

    public function validateConfigs(): bool
    {
        $validation = (new ValidateConfigFields)();
        return $validation['status'];
    }

    public function mapRecordData($record): array
    {
        $data = [
            'streams' => [
                'stream' => [
                    'app' => config('teamup-logs.app_name'),
                    'stage' => config('teamup-logs.app_stage'),
                ],
                'values' => [
                    'log_message' => $record['formatted']
                ]
            ]
        ];

        return $data;
    }
}
?>
