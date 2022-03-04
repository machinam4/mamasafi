<?php

namespace App\Models;

use App\Models\Sub_service;
use App\Models\Variation_option;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Variation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
        'sub_service_id'
    ];

    public function variation_options()
    {
        return $this->hasMany(Variation_option::class);
    }
    public function sub_service()
    {
        return $this->belongsTo(Sub_service::class);
    }
}
