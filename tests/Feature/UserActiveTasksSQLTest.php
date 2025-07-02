<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Task;

class UserActiveTasksSQLTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_finds_users_with_more_than_2_active_tasks_on_different_days_and_sums_costs()
    {
        $this->seed(\Database\Seeders\TaskSeeder::class);

        $query = <<<'SQL'
            SELECT
                users.id AS user_id,
                tasks.id AS task_id,
                tasks.due_date,
                SUM(large_table.cost) AS total_cost
            FROM users
            JOIN tasks ON tasks.user_id = users.id
            JOIN large_table ON large_table.task_id = tasks.id
            WHERE tasks.is_active = 1
            GROUP BY users.id, tasks.id, tasks.due_date
        SQL;

        $rows = DB::select($query);

        // Group by user
        $userTasks = [];
        foreach ($rows as $row) {
            $userTasks[$row->user_id][] = $row;
        }

        // Find users with more than 2 active tasks on different days
        $qualifyingUsers = array_filter($userTasks, function ($tasks) {
            $uniqueDays = array_unique(array_map(fn($t) => $t->due_date, $tasks));
            return count($tasks) > 2 && count($uniqueDays) > 2;
        });

        // Output for inspection
        fwrite(STDOUT, "\nQualifying users and their tasks:\n" . print_r($qualifyingUsers, true) . "\n");

        $this->assertNotEmpty($qualifyingUsers, 'No users found with more than 2 active tasks on different days.');
    }
}
