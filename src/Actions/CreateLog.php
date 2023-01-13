<?php

namespace Teamup\LogConnector\Actions;

class CreateLog
{
    /**
     * Invoke the CurlPostRequest class.
     */
    public function __invoke($data)
    {
        $url = config('teamup-logs.api_link');
        $username = config('teamup-logs.username');
        $password = config('teamup-logs.password');

        $resource = curl_init();
        curl_setopt($resource, CURLOPT_USERPWD, $username . ":" . $password);
        curl_setopt($resource, CURLOPT_URL, $url);
        curl_setopt($resource, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($resource, CURLOPT_VERBOSE, true);
        curl_setopt($resource, CURLOPT_POSTFIELDS, 'jsondata=' . urlencode(json_encode($data)));

        $data = curl_exec($resource);
        return json_decode($data);
    }
}
