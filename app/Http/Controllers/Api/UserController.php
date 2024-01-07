<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    public function loginUser(Request $request)
    {
        $input = $request->all();

        if(Auth::attempt($input))
        {
            $data['token'] =  $request->user()->createToken('MyApp')->accessToken;
            $data['user'] = Auth::user();

            return response()->json([
                'status' => 'ok',
                'message' => 'user berhasil login',
                'data' => $data,
            ], 200);
        }

        return response()->json([
                'status' => 'error',
                'message' => 'user unauthorized',
                'data' => 'unauthorized',
        ], 401);

    }

    public function getAuthUser()
    {
        if(Auth::guard('api')->check()){
            $data['user'] = Auth::guard('api')->user();
            return Response([
                'status' => 'ok',
                'message' => 'data berhasil didapatkan',
                'data' => $data,
            ], 200);
        }

        return Response([
            'status' => 'error',
            'message' => 'Unauthorized',
        ], 401);
    }

    public function userLogout()
    {
        if(Auth::guard('api')->check()){
            $accessToken = Auth::guard('api')->user()->token();
            \DB::table('oauth_refresh_tokens')
                ->where('access_token_id', $accessToken->id)
                ->update(['revoked' => true]);

            $accessToken->revoke();

            return Response([
                'status' => 'ok',
                'message' => 'user berhasil logout',
                'data' => 'Unauthorized',
            ], 200);
        }

        return Response([
            'status' => 'error',
            'message' => 'Unauthorized',
        ], 401);
    }
}