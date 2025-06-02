<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Route::get('/', function () {
//     return redirect()->route('tasks.index');
// });

// Route::resource('tasks', TaskController::class);

Route::get('/test-api', function() {
    return response()->json(['status'=> 'ça marche ouuuuuuuuu']);
});
