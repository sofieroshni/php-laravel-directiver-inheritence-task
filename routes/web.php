<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
//BASIC ROUTE
// Route::get('/', function () {
// return 'Forside';});
// //http://127.0.0.1:8000


//BASI
Route::get('/hello', function () {
    return  'Hej';
});
// //http://127.0.0.1:8000/hello

//DYNAMISK ROUTE
// http://127.0.0.1:8000/hello
Route::get('/greet/{name}', function ($name) {
return 'Hej ' . $name . '!';
});
//http://127.0.0.1:8000/greet/sofie


//REDIRECTING ROUTES
Route::get('/hallo',function(){
    return redirect('/hello');
});
// http://127.0.0.1:8000/hello


//NAMED ROUTES
Route::get('/xxx', function(){
    return 'Named route: du skrevet  namedRouteHello som nanvngives "hello" ';
})->name('hello');
 // http://127.0.0.1:8000/namedRouteHello

//Her diegerer jeg til en named route, som hedder hello, som er defineret ovenfor
Route::get('/hallo', function(){
    return redirect()->route('hello');
});
//FALLBACK ROUTES
Route::fallback(function(){
    return 'still got somewhere';
});


//GET
//PUT
//POST
//PATCH
//DELETE
//ØVE REDIRECTING ROUTES IGEN
//(BASIC ROUTE)
Route::get('/hi',function(){
return "Du er enten blevet digeret til denne side <br> -eller har skrevet /hi eller /getToHiPage i URL'en";
});
// http://127.0.0.1:8000/hi

//(REDIRECTING ROUTE)
Route::get('/getToHiPage ',function(){
    return redirect('/hi');
});
//http://127.0.0.1:8000/getToHiPage





// BLADE TEMPLATE, VIEW OG DATA:
//Basic route med view, viser index.blade.php filen
Route::get('/',function(){
    return view('index');
});
//basic route med view, viser hello.blade.php filen med dara
Route::get('/viewdata', function(){
    return view('hello', ['name' => 'Sofie']);
});
// http://127.0.0.1:8000/viewdata

//BLADE MED FOREACH LOOP OG DATA

class Task
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public ?string $long_description,
        public bool $completed,
        public string $created_at,
        public string $updated_at
    ) {
    }
}

$tasks = [
    new Task(
        1,
        'Buy groceries',
        'Task 1 description',
        'Task 1 long description',
        false,
        '2023-03-01 12:00:00',
        '2023-03-01 12:00:00'
    ),
    new Task(
        2,
        'Sell old stuff',
        'Task 2 description',
        null,
        false,
        '2023-03-02 12:00:00',
        '2023-03-02 12:00:00'
    ),
    new Task(
        3,
        'Learn programming',
        'Task 3 description',
        'Task 3 long description',
        true,
        '2023-03-03 12:00:00',
        '2023-03-03 12:00:00'
    ),
    new Task(
        4,
        'Take dogs for a walk',
        'Task 4 description',
        null,
        false,
        '2023-03-04 12:00:00',
        '2023-03-04 12:00:00'
    ),
];



//BLADE MED FOREACH LOOP OG DATA

Route::get('/taskpage', function() use ($tasks){
    return view('task', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');
// http://127.0.0.1:8000/taskpage + task.blade.php

// Route::get('/{id}', function($id) {
//     return 'one single task with id: ' . $id;
// })->name('tasks.show');
// http://127.0.0.1:8000/2
//navn er tasks.show, som er defineret ovenfor, og som bruges i index.blade.php filen





//TEMPLATE INHERITANCE OBS! VIEWET LIGGE RI SHOW.BLADE.PHP
Route::get('/tasks/{id}', function ($id) use ($tasks) {
    $task = collect($tasks)->firstWhere('id', $id);
    if (!$task) {
        abort(Response::HTTP_NOT_FOUND);
    }
    return view('show',['task' => $task]);
})->name('tasks.show');
//  http://127.0.0.1:8000/template/1




// GÅ TIL SHOWBLADE.PHP OG SE HVORDAN TEMPLATE INHERITANCE ER IMPLEMENTERET



// Route::get('/tasks/{id}', function ($id) use ($tasks) {
//     $task = collect($tasks)->firstWhere('id', $id);

//     if (!$task) {
//         abort(Response::HTTP_NOT_FOUND);
//     }

//     return view('show', ['task' => $task]);
// })->name('tasks.show');
// http://127.0.0.1:8000/tasks/1
