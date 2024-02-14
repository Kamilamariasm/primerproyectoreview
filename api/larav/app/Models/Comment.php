<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joint extends Model
{
    use HasFactory;

    protected $fillable = ['opinion', 'user_id'];
}
