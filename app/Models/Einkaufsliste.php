<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Einkaufsliste extends Model
{
    public function artikel(): HasMany

    {

        return $this->hasMany(Artikel::class);

    }
    
    public function user(): BelongsTo

    {

        return $this->belongsTo(User::class);

    }
    
    protected $fillable = [

        'name',

    ];
    
    use HasFactory;
}
