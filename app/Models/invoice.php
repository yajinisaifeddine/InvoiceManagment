<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'number',
        'date',
        'amount',
        'copy',
        'company_id',
    ];

    public function company()
    {
        return $this->belongsTo(company::class);
    }
}
