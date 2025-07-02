<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function comments()
    {
        return $this->morphMany(\App\Models\Comment::class, 'commentable');
    }

    /**
     * INTERVIEW QUESTION:
     *
     * Given the 'large_table' records associated with this task, write a complex SQL query (using the DB facade) to find all users who:
     *   1. Have at least two unique 'title' values in large_table for this task (i.e., they interacted with at least two different event types).
    *   2. Have at least two unique 'title' values in large_table for this task where is_active = true (i.e., they interacted with at least two different active event types).
     *   3. (Optional: Only consider records from the last 30 days.)
     *
     * Your query should:
     *   - Use advanced SQL (GROUP BY, HAVING, COUNT(DISTINCT ...), subqueries, etc.).
     *   - Return the user_id and the count of unique titles for each qualifying user.
     *   - Do NOT use Eloquent relationships.
     *   - Demonstrate your ability to clarify requirements and optimize for performance.
     *
     * Example usage:
     *     use Illuminate\Support\Facades\DB;
     *     $records = DB::select('SELECT ... FROM large_table ... WHERE task_id = ?', [$this->id]);
     *
     * Replace the above with your own complex SQL as needed.
     */
    public function largeTableRecords()
    {
        // Write your advanced SQL query here using DB::select(...)
    }
}
