<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $guarded = [];

        public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function role()
    {
        return $this->belongsTo(Roles::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}