<?php

namespace App\Models;

use App\Models\Sub_service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status'
    ];


    public function sub_services()
    {
        return $this->hasMany(Sub_service::class);
    }
}
