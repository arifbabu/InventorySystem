<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function posts(){
        return $this->hasMany(post::class)->where('status', 1);
    }
}
