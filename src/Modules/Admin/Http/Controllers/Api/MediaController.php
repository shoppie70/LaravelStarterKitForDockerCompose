<?php


namespace Modules\Admin\Http\Controllers\Api;

use Illuminate\Http\Request;

class MediaController extends ApiController
{
    protected string $store_path;
    protected string $output_path;

    public function __construct()
    {
        $this->store_path = 'uploads/' . date('Y') . '/' . date('n') . '/';
        $this->output_path = 'storage/uploads/' . date('Y') . '/' . date('n') . '/';
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $media = $request['upload'] ? $request->file('upload') : $request->file('file');

        try {
            $storeFilename =
                // ファイル名
                pathinfo($media->getClientOriginalName(), PATHINFO_FILENAME) .
                // 名前が重複しないようにアップロードした時間をつけとく
                '_' . time() . '.' .
                // 拡張子をつける
                $media->getClientOriginalExtension();

            // FIXME: MimeTypeで比較の方がスマート？
            if ($media->extension() === 'gif' || $media->extension() === 'jpeg' || $media->extension() === 'jpg' || $media->extension() === 'png') {
                $media->storeAs($this->store_path, $storeFilename);
            }

        } catch (\Exception $e) {
            $response = [
                "uploaded" => false,
                "error" => [
                    "message" => $e->getMessage(),
                ]
            ];
            return response()->json($response);
        }

        $response = [
            'status' => '200',
            'data' => $media,
            "url" => asset($this->output_path . $storeFilename),
            "uploaded" => true,
        ];

        return response()->json($response);
    }
}
