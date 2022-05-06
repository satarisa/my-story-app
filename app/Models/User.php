<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Redis;

class User  extends Authenticatable
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = ['user_name', 'nama', 'email'];
    protected $hidden = ['password', 'remember_token'];

    public function review() {
        return $this->hasMany(Review::class, 'user_id', 'id');
    }

    public function profile() {
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }
}
