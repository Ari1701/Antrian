<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;

    protected $table = 'antrian';

    protected $fillable = ['user_id', 'no_antrian', 'tgl_antrian', 'poli', 'sesi'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
