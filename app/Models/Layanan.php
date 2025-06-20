<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    /** @use HasFactory<\Database\Factories\LayananFactory> */
    use HasFactory;

    protected $fillable = [
        'nama_layanan',
        'harga',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
