<?php

namespace App\Models;

use App\View\Components\company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class payment extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'type',
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
