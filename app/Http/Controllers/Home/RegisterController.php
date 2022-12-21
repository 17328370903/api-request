<?php

namespace App\Http\Controllers\Home;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RegisterController extends BaseController
{
    /**
     * 注册
     * @param Request $request
     * @return JsonResponse|void
     */
    public function register( Request $request ): JsonResponse
    {
        $data = $request->post();
        $validator = Validator::make( $data, [
            'code'     => [
                'bail',
                'required',
            ],
            'name' => ['required','max:50'],
            'email'    => [
                'required',
                'email',
                'unique:users'
            ],
            'password' => [ 'required','confirmed' ],
            'password_confirmation' => ['required']
        ] );
        try {
            $validator->validated();
        } catch ( ValidationException $e ) {
            return $this->errorJson( $validator->errors()->first() );
        }
        $user = new User();
        $user->create($data);
        return $this->successJson();

    }

    /**
     * 发送注册验证码
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendEmail(): JsonResponse
    {
        return $this->successJson( [ 'code' => mt_rand( 1, 9999 ) ] );
    }

}
