<?php

namespace Omatech\Mage\Api\Controllers;

use Illuminate\Http\JsonResponse;

class TestController extends Controller
{
    public function testMethod(): JsonResponse
    {
        return response()->json([], 200);
    }
}
