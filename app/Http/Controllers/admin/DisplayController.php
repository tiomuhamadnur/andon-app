<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Line;
use App\Models\Transaction;
use App\Models\Zona;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DisplayController extends Controller
{
    public function index()
    {
        $line = Line::all();
        return view('display.index', compact(['line']));
    }

    public function displayShow(Request $request)
    {
        $cryptedId = $request->id;
        try {
            $id = Crypt::decryptString($cryptedId);
            $line = Line::findOrFail($id);
            $line_id = $line->id;
            $today = Carbon::now();
            $transactions = Transaction::join('device', 'device.id', '=', 'transaction.device_id')
                        ->select('transaction.*')
                        ->where('device.line_id', $line_id)
                        ->whereDay('transaction.call_at', $today)
                        ->orderBy('status', 'ASC')
                        ->orderBy('call_at', 'DESC')
                        ->paginate(5);

            return view('display.list', compact(['transactions', 'line']));

        } catch (DecryptException $e) {
            return abort(404);
        }
    }
}