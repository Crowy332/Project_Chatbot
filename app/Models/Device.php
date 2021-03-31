<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'device_type_id',
        'user_id',
        'status_device',
    ];
    public function device_type(){
        return $this->belongsTo(DeviceType::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
