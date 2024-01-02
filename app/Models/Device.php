<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $table = 'device';

    protected $guarded = [];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }
}