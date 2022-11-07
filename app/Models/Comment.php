<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $table = 'comment';
    
    protected $fillable = ['message', 'idpost'];
    
    public function post() {
        return $this->belongsTo('App\Models\Post', 'idpost');
    }
    
    public function user() {
        return $this->belongsTo('App\Models\UserForum', 'iduser');
    }
}
