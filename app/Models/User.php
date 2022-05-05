<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';

    public function review() {
        return $this->hasMany(Review::class, 'user_id', 'id');
    }
}
