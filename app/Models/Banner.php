<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable=['title','slug','description','photo','status'];

    public function scopeSearch($query, $search){
        return $query->when($search, function($query) use ($search){
            $query->where('title','like',"%$search%")
            ->orWhere('slug','like',"%$search%")
            ->orWhere('description','like',"%$search%");
        });
    }
}

