<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = ['nome', 'descrizione', 'prezzo_dettaglio'];

    public function points():BelongsToMany{
        return $this->belongsToMany(Point::class)
        ->withPivot([
                        'price_point', 'is_active'
                    ]);
    }
    
}
