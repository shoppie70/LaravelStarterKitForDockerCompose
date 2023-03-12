<?php


namespace Modules\Admin\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    protected function systemError(\Exception $e): \Illuminate\Http\JsonResponse
    {
        DB::rollback();

        report($e);

        $response = config('app.debug') ? $e : [
            'status' => '422',
            'message' => 'System error',
        ];

        return response()->json($response, 422);
    }
}
