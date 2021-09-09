<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
     
        public function index()
        {
            //To fetch all data from database
             //Display them in the todos .index page
             $todos = Todo::all(); //this all function fetch all data
            return view('todos.index')->with('todos',$todos);
        }

        public function show(Todo $todo)
        {
            return view('todos.show')->with('todo', $todo);
        }

        public function create()
        {
            return view('todos.create');
        }

        public function store(Todo $todo)
        {
            $this->validate(request(),[
                'name' => 'required|min:6|max:12',
                'description' => 'required'
            ]);

            $data=request()->all();//this will req to server and all function fetch all data

            $todo = new Todo();//the model Todo we create one variable

            $todo->name = $data['name'];//this store name of todo in database feild name

            $todo->description = $data['description'];

            $todo->completed = false;

            $todo->save();  //save function fire a create query and save the data to table

            session()->flash('success','Todo Created successfully Ab bol ky kru');

            return redirect('/todos'); //it redirect to todos page 
        }

        public function edit(Todo $todo)
        {
            //$todo = Todo::find($todoId);

            return view('todos.edit')->with('todo',$todo);
        }

        public function update(Todo $todo)//the todoId var get id from url
        {
            $this->validate(request(),[
                'name' => 'required|min:6|max:12',
                'description' => 'required'
            ]);

            $data = request()->all();//all function get all data of form

           // $todo = Todo::find($todoId);//Todo is class model.the find method find the todo of id get by url

            $todo->name = $data['name'];   //store the data to the db table todo in column name

            $todo->description = $data['description'];

            $todo->save();

            session()->flash('success','Todo Updated successfully Ab bol ky kru');

            return redirect('/todos');

        }

        public function destroy(Todo $todo)
        {
           // $todo = Todo::find($todoId);

            $todo->delete();

            session()->flash('success','Todo Deleted successfully Ab bol ky kru');

            return redirect('/todos');
        }

        public function complete(Todo $todo)
        {
            
            $todo->completed=true;

            $todo->save();

            session()->flash('success','Todo completed.');

            return redirect('/todos');

        }

}


