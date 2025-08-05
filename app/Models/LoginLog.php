<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model
{
    use HasFactory;
     public $timestamps = false; // karena kita hanya pakai created_at
    protected $fillable = ['user_id', 'ip_address'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
