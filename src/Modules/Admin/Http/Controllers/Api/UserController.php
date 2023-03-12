<?php

namespace Modules\Admin\Http\Controllers\Api;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Http\Requests\Api\CreateUserRequest;
use Modules\Admin\Http\Requests\Api\UpdateUserRequest;
use Modules\Admin\UseCases\User\SaveEncodedCsvAction;
use Rap2hpoutre\FastExcel\FastExcel;
use RuntimeException;

class UserController extends Controller
{
    public function update(UpdateUserRequest $request, User $user): \Illuminate\Http\JsonResponse
    {
        try {
            DB::beginTransaction();

            $user->update([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
            ]);

            if(!is_null($request->get('password'))) {
                $user->password = Hash::make($request->get('password'));
            }

            DB::commit();
        } catch (Exception $exception) {
            DB::rollback();
            report($exception);

            return response()->json([
                'status' => 'error',
                'code' => '401',
                'message' => $exception->getMessage() ?: '情報を正常に更新できませんでした。',
            ]);
        }

        return response()->json([
            'status' => 'success',
            'code' => '200',
            'message' => '情報を正常に更新しました。',
        ]);
    }

    public function create(CreateUserRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = new User();
            $user->fill($request->all())->save();

            DB::commit();
        } catch (Exception $exception) {
            DB::rollback();
            report($exception);

            return response()->json([
                'status' => 'error',
                'code' => '401',
                'message' => $exception->getMessage() ?: '正常に作成できませんでした。',
            ]);
        }

        $response = [
            'status' => '200',
            'redirect' => route('admin.user.index'),
        ];

        return response()->json($response);
    }
}
