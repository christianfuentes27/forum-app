<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserForum extends Model
{
    use HasFactory;
    
    protected $table = 'user_forum';
    
    protected $fillable = ['name', 'email', 'datebirth', 'avatar'];
    
    public function posts() {
        return $this->hasMany('App\Models\Post', 'iduser');
    }
    
    public function comments() {
        return $this->hasMany('App\Models\Comment', 'iduser');
    }
}
