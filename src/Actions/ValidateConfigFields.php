<?php

namespace Teamup\LogConnector\Actions;
class ValidateConfigFields
{
    /**
     * Invoke the Validate Config Fields action.
     */
    public function __invoke()
    {
        $use_default = config('tup-logs.use_default');

        if ($use_default == false) {
            if (empty(config('tup-logs.host'))) {
                return [
                    'status' => false,
                    'message' => 'No Host Set'
                ];
            }

            if (empty(config('tup-logs.port'))) {
                return [
                    'status' => false,
                    'message' => 'No Port Set'
                ];
            }

            if (empty(config('tup-logs.username'))) {
                return [
                    'status' => false,
                    'message' => 'No Username Set'
                ];
            }

            if (empty(config('tup-logs.password'))) {
                return [
                    'status' => false,
                    'message' => 'No Password Set'
                ];
            }
        }

        return [
            'status' => true,
        ];
    }
}
