<?php

namespace App\Http\Controllers\Home;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class loginController extends BaseController
{
    /**
     * 用户登录
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $data = request()->post();
        $validator = Validator::make( $data, [
            'code'     =>  'required|captcha' ,
            'email'    => [
                'required',
                'email',
            ],
            'password' => [ 'required' ],
        ] );
        try {
            $validator->validated();
        } catch ( ValidationException $e ) {
            return $this->errorJson( $validator->errors()->first() );
        }
        $res   = Auth::attempt( [
                         'email'  => $data['email'],
                         'password' => $data['password']
        ] );
        if(!$res){
            return $this->errorJson( '用户名称获取密码错误' );
        }
        $user = Auth::user();
        $user->last_login_ip = request()->ip();
        $user->last_login_time = time();
        $user->save();
        return $this->successJson([$res]);
    }
}
