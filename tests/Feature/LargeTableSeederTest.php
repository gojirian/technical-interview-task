<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Task;
use App\Models\LargeTable;

class LargeTableSeederTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_seeds_enough_large_table_data_for_tasks()
    {
        // Run the seeders
        $this->seed(\Database\Seeders\TaskSeeder::class);

        // There should be at least one task
        $this->assertGreaterThan(0, Task::count(), 'No tasks were seeded.');

        // There should be at least one large_table record
        $this->assertGreaterThan(0, LargeTable::count(), 'No large_table records were seeded.');

        // Each task should have at least 5 large_table records (per seeder logic)
        $tasks = Task::all();
        foreach ($tasks as $task) {
            $this->assertGreaterThanOrEqual(5, $task->largeTable()->count(), "Task ID {$task->id} does not have at least 5 large_table records.");
        }
    }
}
