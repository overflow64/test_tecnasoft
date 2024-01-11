<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\PointService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    public function customer():BelongsTo{
        return $this->belongsTo(Customer::class);
    }
    public function pointService():BelongsTo{
        return $this->belongsTo(PointService::class);
    }
}
