<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'color1',
        'color2',
        'color3',
        'color4',
        'textcolor',
        'user_id',
    ];

    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
}
