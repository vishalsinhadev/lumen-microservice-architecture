<?php
/**
 * @author	 : Vishal Kumar Sinha <vishalsinhadev@gmail.com>
 */
namespace App\Http\Traits;

trait ApiResponseTrait
{

    public function successWithData($data, $message = '')
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'error' => false,
            'api_base_uri' => API_GATEWAY_URL
        ]);
    }

    public function successWithMessage($message, $code = 200)
    {
        return response()->json([
            'message' => $message,
            'error' => false
        ], $code);
    }

    public function failWithMessage($message, $code = 500)
    {
        return response()->json([
            'message' => $message,
            'error' => false
        ], $code);
    }

    public function errorsWithMessage($errors, $message, $code, $error_data = [])
    {
        return response()->json([
            'errors' => $errors,
            'message' => $message,
            'error' => true,
            'error_data' => $error_data
        ], $code);
    }

    public function errorsWithGlobalMessage($message, $code, $error_data = [])
    {
        return response()->json([
            'errors' => [
                'global' => [
                    $message
                ]
            ],
            'message' => $message,
            'error' => true,
            'error_data' => $error_data
        ], $code);
    }

    public function validationError($errors, $code)
    {
        return response()->json($errors, $code);
    }
}