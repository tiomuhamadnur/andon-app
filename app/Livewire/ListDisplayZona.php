<?php

namespace App\Livewire;

use App\Models\Transaction;
use App\Models\Zona;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class ListDisplayZona extends Component
{
    public $id;

    public function mount(Request $request)
    {
        $this->id = $request->query('id');
    }

    public function render()
    {
        $cryptedId = $this->id;
        try {
            $id = Crypt::decryptString($cryptedId);
            $zona = Zona::findOrFail($id);
            $zona_id = $zona->id;
            $today = Carbon::now();
            $transactions = Transaction::join('device', 'device.id', '=', 'transaction.device_id')
                        ->select('transaction.*')
                        ->where('device.zona_id', $zona_id)
                        ->whereDay('transaction.call_at', $today)
                        // ->orderBy('status', 'ASC')
                        ->orderBy('call_at', 'DESC')
                        ->paginate(5);

            return view('livewire.list-display-zona', compact(['transactions', 'zona']));

        } catch (DecryptException $e) {
            return abort(404);
        }
    }
}