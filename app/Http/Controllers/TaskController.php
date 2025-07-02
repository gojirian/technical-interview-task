<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Inertia\Inertia;

class TaskController extends Controller
{
    /**
     * Display the output of a task.
     *
     * This method is called when the user clicks the "Output" button in the TaskShow.vue page,
     * which should send a GET request to `/tasks/{task}/output`.
     *
     * @param Task $task
     * @return \Inertia\Response
     */
    public function output(Task $task)
    {
        // Call the advanced SQL method and show the result as output
        $output = $task->largeTableRecords();
        return Inertia::render('TaskOutput', [
            'task' => $task,
            'output' => $output,
        ]);
    }

    public function index()
    {
        $tasks = Task::latest()->get();
        return Inertia::render('Dashboard', [
            'tasks' => $tasks,
        ]);
    }

    public function show(Task $task)
    {
        return Inertia::render('TaskShow', [
            'task' => $task,
        ]);
    }


    public function complete(Task $task)
    {
        /*
            INSTRUCTIONS FOR INTERVIEWEE:

            Implement this method to mark the given task as completed.

            - Update the task's status to 'completed' and save the change.
            - Return a redirect or Inertia response as appropriate.
            - This method is called when the user clicks the "Complete" button in the TaskShow.vue page,
              which should send a POST request to `/tasks/{task}/complete`.
            - See resources/js/pages/TaskShow.vue for UI and endpoint wiring instructions.
        */
    }


    public function destroy(Task $task)
    {
        /*
            INSTRUCTIONS FOR INTERVIEWEE:

            Implement this method to delete the given task.

            - Delete the task from the database.
            - Return a redirect or Inertia response as appropriate.
            - This method is called when the user clicks the "Delete" button in the TaskShow.vue page,
              which should send a DELETE request to `/tasks/{task}`.
            - See resources/js/pages/TaskShow.vue for UI and endpoint wiring instructions.
        */
    }
}
