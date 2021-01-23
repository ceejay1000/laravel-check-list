<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoCreateRequest;
use Illuminate\Support\Facades\Validator;

class TodosController extends Controller
{
    public function __constructor(){
        // Apply to all routes directed to this controller
        //  $this->middleware('auth');

        // Apply to all controller methods except
       // $this->middleware('auth')->except('index');

       // Apply only to this method
       // $this->middleware('auth')->only('index');
    }

    public function index () {
        $todos = Todo::orderBy('completed')->get();
        return view('todos.index', ['todos' => $todos]);
    }

    public function create () {
        return view('todos.create');
    }

    public function edit (Todo $todo) {
       // $todo = Todo::find($id);
        return view('todos.edit', compact('todo'));
    }

    public function store(Request $request){
        $rules = [
            'title|max:255'
        ];

        $messages = [
            'title.max' => 'Todo cannot be greater than 255 chars'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $request->validate([
            'title' => 'required|max:255'
        ]);
        auth()->user()->todos()->create($request->all());
        //Todo::create($request->all());
        return redirect()->back()->with('message', 'Todo created');
    }

    public function update(Request $request, Todo $todo){
        $todo->update(['title' => $request->title]);
        return redirect(route('todo.index'))->with('message', 'todo updated');
    }

    public function complete(Request $request, Todo $todo){
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message', 'todo completed');
    }

    public function incomplete(Request $request, Todo $todo){
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message', 'todo incompleted');
    }

    public function delete(Request $request, Todo $todo){
        $todo->delete();
        return redirect()->back()->with('message', 'todo deleted');
    }
}
