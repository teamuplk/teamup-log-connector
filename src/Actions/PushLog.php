<?php

namespace Teamup\LogConnector\Actions;

class PushLog
{
    /**
     * Invoke the Push Log class.
     */
    public function __invoke($data)
    {
        $url = config('teamup-logs.api_link');

        $username = config('teamup-logs.username');
        $password = config('teamup-logs.password');

        $header = [];
        $header[] = 'Content-Type: application/json';

        $resource = curl_init($url);

        $resource = curl_init();
        curl_setopt($resource, CURLOPT_URL, $url);
        curl_setopt($resource, CURLOPT_USERPWD, $username . ":" . $password);
        curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($resource, CURLOPT_POST, true);
        curl_setopt($resource, CURLOPT_HTTPHEADER, $header);
        curl_setopt($resource, CURLOPT_POSTFIELDS, $data);


        $response = curl_exec($resource);
        curl_close($resource);

        return $response;
    }
}
