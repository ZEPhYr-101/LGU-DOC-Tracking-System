<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function users()
    {
        return $this->belongsToMany(User::class, 'id');
    }

    public function admins()
    {
        return $this->belongsToMany(Admin::class, 'id');
    }
}


