<?php

namespace App\Http\Controllers\Api;

use App\Events\RegisterButtonEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class ButtonController extends Controller
{
    public function register(Request $request)
    {
        $code = [$request->code];

        $this->sendEvent($code);

        return response()->json([
            'status' => 'ok',
            'message' => 'data code button berhasil dikirim',
        ])->header('Content-Type', 'application/json');
    }

    public function sendEvent($data)
    {
        Event::dispatch(new RegisterButtonEvent($data));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }
}
