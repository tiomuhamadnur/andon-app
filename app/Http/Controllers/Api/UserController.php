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
            $user = Auth::user();
            $data['token'] =  $request->user()->createToken('MyApp')->accessToken;
            $data['user'] = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'email_verified_at' => $user->email_verified_at,
                'phone' => $user->phone,
                'location' => $user->location,
                'about' => $user->about,
                'photo' => $user->photo ? asset('storage/' . $user->photo) : null,
                'ttd' => $user->ttd,
                'gender' => $user->gender,
                'status_employee' => $user->status_employee,
                'active' => $user->active,
                'role' => $user->role,
                'jabatan' => $user->jabatan,
                'section' => $user->section,
                'department' => $user->department,
                'building' => $user->building,
                'company' => $user->company,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ];

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
            $user = Auth::guard('api')->user();
            $data['user'] = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'email_verified_at' => $user->email_verified_at,
                'phone' => $user->phone,
                'location' => $user->location,
                'about' => $user->about,
                'photo' => $user->photo ? asset('storage/' . $user->photo) : null,
                'ttd' => $user->ttd  ? asset('storage/' . $user->ttd) : null,
                'gender' => $user->gender,
                'status_employee' => $user->status_employee,
                'active' => $user->active,
                'role' => $user->role,
                'jabatan' => $user->jabatan,
                'section' => $user->section,
                'department' => $user->department,
                'building' => $user->building,
                'company' => $user->company,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ];
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
