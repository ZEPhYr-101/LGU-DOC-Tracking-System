<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $table = 'documents';
    protected $filable = ['documentName', 'user_id', 'category', 'description', 'document'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}