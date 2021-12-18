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

// Return error response
if (!function_exists('sendError')) {
    /**
     * @param $error
     * @param array $errorMessages
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}

// Return unauthorized response.
if (!function_exists('unauthorizedResponse')) {
    function unauthorizedResponse($error = 'Forbidden', $code = 403)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        return response()->json($response, $code);
    }
}
