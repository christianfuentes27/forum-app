<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $table = 'post';
    
    protected $fillable = ['title', 'message'];
    
    public function getMinutes($post) {
        $currentTime = Carbon::now();
        $lastUpdated = $post->updated_at;
        $diff = $currentTime->diff($lastUpdated);
        $minutes = $diff->format('%i');
        $minutes = intval($minutes);
        $correct = false;
        if($minutes < 2) {
            $correct = true;
        }
        return $correct;
    }
    
    public function comments() {
        return $this->hasMany('App\Models\Comment', 'idpost')->latest();
    }
    
    public function user() {
        return $this->belongsTo('App\Models\UserForum', 'iduser');
    }
}
