<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['joint_id','location_id','schedule_id','user_id'];

    public function joint() {
        return $this->belongsTo(Joint::class);
    }
    public function location() {
        return $this->belongsTo(Location::class);
    }
    public function schedule() {
        return $this->belongsTo(Schedule::class);
    }
    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
