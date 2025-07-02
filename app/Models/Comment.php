<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /*
    INSTRUCTIONS FOR INTERVIEWEE:

    Replace the contents of this class with a proper Eloquent model for the 'comments' table.

    Your model should:
    - Use the HasFactory trait.
    - Define the fillable or guarded properties as appropriate.
    - Implement the 'user' relationship (belongsTo User).
    - Implement a polymorphic relationship for 'commentable'.
    - Add any additional methods or properties you think are necessary for a standard Laravel model.

    Write your code below.
    */
}
