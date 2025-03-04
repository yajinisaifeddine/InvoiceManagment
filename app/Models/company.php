<?php

namespace App\Models;

use App\Models\invoice;
use App\Models\payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'director',
        'email',
        'phone',
        'logo',
        'user_id'
    ];

    public function payments()
    {
        return $this->hasMany(payment::class);
    }
    public function invoices()
    {
        return $this->hasMany(invoice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
