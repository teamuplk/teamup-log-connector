<?php

namespace Teamup\LogConnector\Actions;

class ValidateConfigFields
{
    /**
     * Invoke the Validate Config Fields action.
     */
    public function __invoke()
    {
        $api_link = config('teamup-logs.api_link');
        if (empty($api_link)) {
            return [
                'status' => false,
                'message' => 'No Link Set'
            ];
        }

        $username = config('teamup-logs.username');
        if (empty($username)) {
            return [
                'status' => false,
                'message' => 'No Username Set'
            ];
        }

        $password = config('teamup-logs.password');
        if (empty($password)) {
            return [
                'status' => false,
                'message' => 'No Password Set'
            ];
        }

        $app_name = config('teamup-logs.app_name');
        if (empty($app_name)) {
            return [
                'status' => false,
                'message' => 'No App Name Set'
            ];
        }

        return [
            'status' => true,
        ];
    }
}
