<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Button extends Model
{
    use HasFactory;

    protected $table = 'button';

    protected $guarded = [];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}