<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tambahan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tambahan',
        'harga',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
