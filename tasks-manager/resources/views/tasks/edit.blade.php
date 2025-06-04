<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit My List</title>
    @vite('resources/css/app.css')
</head>
<body class="flex items-center flex-col p-4 bg-gray-200 min-h-screen">
    <div class="w-full max-w-xl bg-white shadow-sm rounded-2xl p-8 border border-[#e0e0e0]">
        <h1 class="text-3xl font-semibold mb-6">Modifier ma tâche</h1>
        <form action="{{route('tasks.update', $task->id)}}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <input name="title" type="text" value="{{old('title', $task->title)}}" class="w-full p-2 border rounded shadow-sm" required>

            <textarea name="description" class="w-full p-2 border rounded shadow-sm" id="" cols="30" rows="10" placeholder="Description.....">
                {{old('description', $task->description)}}
            </textarea>

            <div class="flex justify-end gap-2">
                <a href="{{route('tasks.index')}}" class="bg-black px-4 py-2 rounded text-red-600 hover:underline">
                    Annuler
                </a>
                    <button type="submit" class="bg-black text-white px-4 py-2 rounded hover:underline">
                        Enregistrer
                    </button>
            </div>
        </form>

    </div>
    
</body>
</html>