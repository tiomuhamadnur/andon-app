<?php

namespace App\Http\Controllers\Api;

use App\Events\RegisterButtonEvent;
use App\Http\Controllers\Controller;
use App\Models\Button;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class ButtonController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);

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

    public function button()
    {
        $buttons = Button::all();

        return response()->json(['buttons' => $buttons], 200);
    }
}
