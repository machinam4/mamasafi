<?php

namespace App\Models;

use App\Models\Service;
use App\Models\Variation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sub_service extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
        'service_id'
    ];

    public function variations()
    {
        return $this->hasMany(Variation::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
