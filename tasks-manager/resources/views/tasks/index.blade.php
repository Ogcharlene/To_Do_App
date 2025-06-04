<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My To Do List</title>
    @vite('resources/css/app.css')
</head>

<body class="flex items-center flex-col p-4 bg-gray-200 min-h-screen">
    <div class="w-full max-w-xl bg-white shadow-sm rounded-2xl p-8 border border-[#e0e0e0]">
        <h1 class="text-3xl font-semibold mb-6">My To Do App</h1>

        <form action="{{ route('tasks.store') }}" method="POST" class="">
           @csrf <!-- envoie un token pour chaque soumission de formulaire -> Protection (pour ça que les test postman autre que get ne marchaient pas) -->
           <input name="title" type="text" placeholder="Titre....." class="flex-1 border rounded p-2" required>
           <button type="submit" class="bg-black text-white px-4 py-2 rounded">Ajouter</button>
        </form>

        <!-- Message de confirmation (success key) -->
        @if(session('success'))
            <div class="mb-4">
                {{session('success')}}
            </div>
        @endif

            <ul class="list-none space-y-5 mt-10">
                @forelse($tasks as $task)
                    <li class="flex justify-between items-center bg-gray-100 px-4 py-3 rounded">
                        <div class="flex items-start gap-2">
                            <input type="checkbox" {{$task->is_done ? 'checked' : ''}} @class(['mt-1.5' => true])>
                                <div class="flex  flex-col">
                                    <span class="{{$task->is_done ? 'line-through text-gray-500' : ''}}">
                                        {{$task->title}}
                                    </span>

                                    @if($task->description)
                                    <p class="text-sm text-gray-500 mt-1">
                                        {{$task->description}}
                                    </p>
                                    @endif
                                </div>
                        </div>
                        <div>
                            <a href="{{route('tasks.edit', $task->id)}}" class="text-blue-600 hover:underline text-sm">Modifier</a>
                            <form action="{{route('tasks.destroy', $task->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline text-sm">Supprimer</button>
                            </form>
                        </div>
                    </li>
                @empty
                    <li class="text-gray-500 text-center">Aucune tâche disponible</li>
                @endforelse
            </ul>
    </div>
</body>

</html>

