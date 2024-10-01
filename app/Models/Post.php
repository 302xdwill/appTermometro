<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    #Relacion inversa
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function church(){
        return $this->belongsTo(Church::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
