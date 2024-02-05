<?php

namespace App\Http\Middleware;

use App\Models\Settings;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isUpdate
{
    public function handle(Request $request, Closure $next): Response
    {
        $setting = Settings::where('code', 'IS_UPDATE')->first()->value;
        if($setting == 0)
        {
            return back()->withNotifyerror('You cant update this data, please ask your admin');
        }
        return $next($request);
    }
}