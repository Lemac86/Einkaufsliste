<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Artikel extends Model
{
    public function liste(): BelongsTo

    {

        return $this->belongsTo(Einkaufsliste::class);

    }
    public function user(): BelongsTo

    {

        return $this->belongsTo(User::class);

    }
    
    protected $fillable = [

        'name',
        'user_id',
        'isChecked',
        'isNotAvailable'

    ];
    
    use HasFactory;
}
