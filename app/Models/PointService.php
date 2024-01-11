<?php

namespace App\Models;

use App\Models\Point;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PointService extends Pivot
{
    use HasFactory;
    protected $fillable = ['is_active','point_price'];

    public function service():BelongsTo{
        return $this->belongsTo(Service::class);
    }
    public function point():BelongsTo{
        return $this->belongsTo(Point::class);
    }

}
