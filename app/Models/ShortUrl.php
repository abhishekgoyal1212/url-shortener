<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    protected $fillable = [
        'company_id',
        'created_by',
        'original_url',
        'short_code',
    ];
    
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
