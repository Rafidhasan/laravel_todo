<?php

namespace App\Http\Controllers;

use DB;

use App\Todo;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function show($todos) {
        return view('todo', ['todos' => $todos]);
    }

    public function index() {
        $todos =  Todo::get();
        $i = 0;

        return view('todo', ['todos' => $todos, 'i' => $i]);
    }

    public function store() {
        $todo = new Todo();
        $title = request('title');

        if(! $title) {
            abort(404);
        }   else {
            $todo->title = request('title');
            $todo->save();
            return redirect('/');
        }
    }

    public function edit($todo) {
        $todo = Todo::find($todo);

        return view('todo.edit', ['todo' => $todo]);
    }

    public function update($id) {
        $todo = Todo::find($id);

        $todo->title = request('title');
        $todo->save();

        return redirect('/');
    }

    public function delete($id) {
        $todo = Todo::find($id);

        Todo::where('id', $id)->delete();
        return redirect('/');
    }

    public function complete($id) {
        $todo = Todo::find($id);

        $todo->completed($todo->id);

        return redirect('/');
    }

}
