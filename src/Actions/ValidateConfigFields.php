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
                throw new \Exception('TUPLog: No LOG_RABBITMQ_HOST Set');
            }

            if (empty(config('tup-logs.port'))) {
                throw new \Exception('TUPLog: No LOG_RABBITMQ_PORT Set');
            }

            if (empty(config('tup-logs.username'))) {
                throw new \Exception('TUPLog: No LOG_RABBITMQ_USERNAME Set');
            }

            if (empty(config('tup-logs.password'))) {
                throw new \Exception('TUPLog: No LOG_RABBITMQ_PASSWORD Set');
            }
        }
    }
}
