<?php


namespace Modules\Admin\Http\Controllers\Api;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends ApiController
{
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        DB::beginTransaction();

        try {
            $news = News::query()->create([
                'title' => $request->get('title'),
                'body' => $request->get('body'),
            ]);

            DB::commit();

        } catch (\Exception $e) {
            return $this->systemError($e);
        }

        $response = [
            'status' => '200',
            'data' => $news,
        ];

        return response()->json($response);
    }

    public function update(News $news, Request $request): \Illuminate\Http\JsonResponse
    {
        DB::beginTransaction();

        try {
            $news->update([
                'title' => $request->get('title'),
                'body' => $request->get('body'),
            ]);

            DB::commit();

        } catch (\Exception $e) {
            return $this->systemError($e);
        }

        $response = [
            'status' => '200',
            'data' => $news,
        ];

        return response()->json($response);
    }
}
