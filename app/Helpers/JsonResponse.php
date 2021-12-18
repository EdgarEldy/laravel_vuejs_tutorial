<?php

// Success response method
if (!function_exists('sendResponse')) {
    /**
     * @param $result
     * @param $message
     * @return mixed
     */
    function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message
        ];

        return $response()->json($response, 200);
    }
}
