<?php

namespace App\Models;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = ['cognome','nome'];

    public function customer():HasMany{
        return $this->hasMany(Booking::class);
    }

    public function bookings():HasMany{
        return $this->hasMany(Booking::class);
    }

    public function getFullNameAttribute()
    {
            return ucwords("{$this->nome} {$this->cognome}");
    }
}
