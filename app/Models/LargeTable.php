<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LargeTable extends Model
{
    use HasFactory;

    protected $table = 'large_table';

    protected $fillable = [
        'task_id',
        'title',
        'description',
        'priority',
        'cost',
        'due_date',
        'is_active',
        'metadata',
        'user_id', // Add this if you want to link to users
    ];

    // Optionally, define relationships here
}
