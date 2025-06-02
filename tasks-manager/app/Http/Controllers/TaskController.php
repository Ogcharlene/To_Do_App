<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; //on importe le model task -> fillable

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all(); //GetAllTasks
        return view('tasks.index', compact('tasks')); //Envoie les données dans le view blade -> front
    }

    public function create() 
    {
        return view('tasks.create'); //Afficher le formulaire pour créer une tâche 
    }

    public function store(Request $request) //Méthode pour envoyer un formulaire de création
    {
        $request->validate([ //$request = toutes les données saisies dans le formulaire HTML du front et les valident pour les enregistrer 
            'title' => 'required|string|max:300',
            'description' => 'nullable|string',
        ]);

        Task::create($request->all()); //Pour créer une nouvelle ligne dans la table de la db du model Task -> fillable 

        return redirect()->route('tasks.index')->with('success', 'Task create with success.'); //Redirection vers le GetAllTasks (index)
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id) //Afficher formulaire pour modifier une tâche déjà existante 
    {
        return view('tasks.edit', compact ('tasks'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([ 
            'title' => 'nullable|string|max:300',
            'description' => 'nullable|string',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Tasks updated with success.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted with success.');
    }
}
