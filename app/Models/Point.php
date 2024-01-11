<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Point extends Model
{
    use HasFactory;
    protected $table = 'points';
    protected $fillable = ['nome','indirizzo','descrizione','mappa'];

    public function services():BelongsToMany{
        return $this->belongsToMany(Service::class)->withPivot([
                        'price_point', 'is_active'
                    ]);
    }

}
