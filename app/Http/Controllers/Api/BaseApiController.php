<?php

namespace App\Http\Controllers\Api;

use Closure;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Routing\Controller as BaseController;

abstract class BaseApiController extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Return success response
     *
     * @param mixed $result Data to be sent as response
     * @param bool $wrapped States whether or not $result should be wrapped in a 'data' field
     *                        If false it will be merged into the main object
     * @param $result
     * @param $wrapped
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResponse($result = [], $wrapped = true)
    {
        if ($wrapped) {
            $response = (object)[
                'success' => true, 'data' => (object)$result
            ];
        } else {
            if (!is_array($result)) {
                if (
                    $result instanceof JsonResource
                    || $result instanceof ResourceCollection
                ) {
                    $result = $result->toArray(request());
                } else if (method_exists($result, 'toArray')) {
                    $result = $result->toArray();
                } else {
                    $result = (array)$result;
                }
            }
            $response = (object)array_merge(
                [
                    'success' => true
                ],
                $result
            );
        }
        return response()->json($response,200);
    }

    /**
     * @param $errorMessages
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError($errorMessages = [], $code = 400)
    {
        $response = (object)[
            'success' => false,
            'errors' => $errorMessages
        ];

        return response()->json($response, $code);
    }

    protected function execute(Closure $closure)
    {

        return $closure();
    }
}
