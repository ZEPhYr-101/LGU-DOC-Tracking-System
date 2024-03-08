<?php

// In App/Models/Commit.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commit extends Model
{
    // Define the relationship to the User who committed/uploaded the document
    public function uploadedBy()
    {
        return $this->belongsTo(User::class, 'committed_by');
    }
}
