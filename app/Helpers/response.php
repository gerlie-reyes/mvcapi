<?php

if (! function_exists('response')) {
    /**
     * response function
     * Return a new response in json format
     *
     * @param string $content
     * @param integer $status
     * @param array $headers
     * @return object
     */
    function response($data = [], $status = 200, array $headers = [])
    {
        return json_encode($data);
    }
}