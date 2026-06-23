<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Pest\Configuration\Project;
use App\Models\Project;
use App\Models\Tasks;

class ProjectController extends Controller
{
    // DASHBOARD
    public function index()
    {
        $user = Auth::user();
        $projects = Project::where('user_id', $user->id)->get();

        return view('dashboard', compact('user', 'projects'));
    }
    // ADD PROJECT
    public function showAdd()
    {
        $user = Auth::user();
        return view('Projects.add', compact('user'));
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'min:4'],
            'description' => ['required'],
        ]);

        $data['user_id'] = Auth::id();

        Project::create($data);

        return redirect('/dashboard')->with('success', 'Project Added Successfully');
    }
    // SHOW PROJECT
    public function show($id)
    {
        $project = Project::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $tasks = Tasks::where('project_id', $id)->get();

        return view('Projects.show', compact('project', 'tasks'));
    }
    // EDIT PROJECT
    public function showEdit($id)
    {
        $project = Project::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        return view('Projects.edit', compact('project'));
    }

    public function edit($id)
    {
        $data = request()->validate([
            'title' => ['required', 'min:4'],
            'description' => ['required'],
        ]);

        $project = Project::where('id', $id)
            ->where('user_id', Auth::id());
        $project->update($data);

        return redirect('/dashboard')->with('success', 'Project Updated Successfully');
    }
    // DELETE PROJECT
    public function delete($id)
    {
        $project = Project::where('id', $id)
            ->where('user_id', Auth::id());
        $project->delete();

        return redirect('/dashboard')->with('delete', 'Project Deleted Successfully');
    }

    // Tasks
    public function addTask($id)
    {
        $project = Project::where('id', $id)
            ->firstOrFail();
        return view('Projects.Tasks.add', compact('project'));
    }

    public function addNewTask(Request $request, $id)
    {
        $data = $request->validate([
            'title' => ['required', 'min:4'],
        ]);

        Tasks::create([
            'title' => $data['title'],
            'project_id' => $id,
        ]);

        return redirect()->route('show-project', $id);
    }

    public function editTask($id)
    {
        $task = Tasks::where('id', $id)
            ->firstOrFail();
        return view('Projects.Tasks.edit', compact('task'));
    }

    public function doEditTask(Request $request, $id)
    {
        $data = $request->validate([
            'title' => ['required', 'min:4'],
        ]);

        Tasks::where('id', $id)
            ->update([
                'title' => $data['title'],
            ]);

        return redirect()->route('show-project', Tasks::where('id', $id)->firstOrFail()->project_id);
    }

    public function deleteTask($id)
    {
        $task = Tasks::where('id', $id);
        $projectId = $task->firstOrFail()->project_id;
        $task->delete();

        return redirect()->route('show-project', $projectId)->with('delete', 'Task Deleted Successfully');
    }
}
