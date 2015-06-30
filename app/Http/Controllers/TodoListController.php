<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TodoList;
use Illuminate\Support\Facades\Input;
use Redirect;
use Validator;
use Illuminate\Support\MessageBag;

class TodoListController extends Controller
{
    public function _construct()
    {
        $this->beforeFilter('csrf',array('on' => 'post'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       $todo_lists = TodoList::all();
       return View::make('todos.index') -> with('todo_lists', $todo_lists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        
        return View::make('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //define rules for validation
        $rules = array(
                'title' => array('required','unique:todo_lists,name')
            );
        //pass input to rules using validarot class
        $validator = Validator::make(Input::all(), $rules);

        //test validity
        if ($validator->fails()){
            
            return Redirect::route('todos.create')->withErrors($validator)->withInput();
        }
        $name = Input::get('title');
        $list = new TodoList();
        $list->name = $name;
        $list -> save();
        return Redirect::route('todos.index')->withMessage('List Was Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $list = TodoList::findOrFail($id);
        return View::make('todos.show')->withList($list);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
