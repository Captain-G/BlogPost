<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'blogImage',
        'blogGenre',
        'blogTitle',
        'blogContent',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'postedBy');
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }
}
