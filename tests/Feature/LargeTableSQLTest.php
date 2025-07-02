<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use App\Models\LargeTable;

class LargeTableSQLTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_finds_users_with_multiple_unique_titles_and_active_titles_for_a_task()
    {
        $this->seed(\Database\Seeders\TaskSeeder::class);
        $task = Task::first();
        $this->assertNotNull($task, 'No task found after seeding.');

        $query = <<<'SQL'
            SELECT user_id,
                   COUNT(DISTINCT title) as unique_titles,
                   SUM(is_active = 1) as active_count,
                   COUNT(DISTINCT CASE WHEN is_active = 1 THEN title END) as unique_active_titles
            FROM large_table
            WHERE task_id = ?
              AND user_id IS NOT NULL
            GROUP BY user_id
            HAVING unique_titles >= 2
               AND unique_active_titles >= 2
        SQL;

        $results = DB::select($query, [$task->id]);

        // Output the summary results
        fwrite(STDOUT, "\nSummary Data:\n" . print_r($results, true) . "\n");

        // Output the actual rows from large_table for these users and this task
        $userIds = array_map(fn($row) => $row->user_id, $results);
        if (!empty($userIds)) {
            $rows = DB::table('large_table')
                ->where('task_id', $task->id)
                ->whereIn('user_id', $userIds)
                ->orderBy('user_id')
                ->orderBy('is_active', 'desc')
                ->orderBy('title')
                ->get();
            fwrite(STDOUT, "\nMatching large_table rows:\n" . print_r($rows->toArray(), true) . "\n");
        }

        $this->assertNotEmpty($results, 'No users found with at least 2 unique titles and 2 unique active titles for this task.');

        foreach ($results as $row) {
            $this->assertTrue(property_exists($row, 'user_id'));
            $this->assertGreaterThanOrEqual(2, $row->unique_titles);
            $this->assertGreaterThanOrEqual(2, $row->unique_active_titles);
        }
    }
}
