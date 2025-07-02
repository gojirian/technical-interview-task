<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\Comment;
use App\Models\User;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory(3)->create();
        // Ensure at least one user meets the new criteria
        $specialUser = User::factory()->create();
        $dates = ['2025-07-01', '2025-07-02', '2025-07-03', '2025-07-04'];
        $taskIds = [];
        foreach ($dates as $i => $date) {
            $task = \App\Models\Task::factory()->create([
                'user_id' => $specialUser->id,
                'is_active' => 1,
                'due_date' => $date,
            ]);
            $taskIds[] = $task->id;
            // Each task gets 2+ large_table records with cost
            \App\Models\LargeTable::factory(2)->create([
                'task_id' => $task->id,
                'user_id' => $specialUser->id,
                'cost' => 100 * ($i + 1),
            ]);
        }
        // Add an inactive task for the same user
        \App\Models\Task::factory()->create([
            'user_id' => $specialUser->id,
            'is_active' => 0,
            'due_date' => '2025-07-05',
        ]);
        // Seed additional random tasks and large_table records for other users
        Task::factory(10)->create()->each(function ($task) use ($users) {
            \App\Models\LargeTable::factory(rand(2, 5))->create([
                'task_id' => $task->id,
                'user_id' => $users->random()->id,
            ]);
        });
    }
}
