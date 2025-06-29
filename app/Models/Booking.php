<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'email',
        'no_hp',
        'layanan_id',
        'tambahan_id',
        'tgl_acara',
        'alamat',
        'total_harga',
        'bukti_dp',
        'bukti_pelunasan',
        'keterangan',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function tambahan()
    {
        return $this->belongsTo(Tambahan::class);
    }
}
