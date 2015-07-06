<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TodoList;
use App\TodoItem;
use Illuminate\Support\Facades\Input;
use Redirect;
use Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Database\Eloquent\Collection;

class TodoItemController extends Controller
{
    

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($list_id)
    {
        $todo_list = TodoList::findOrFail($list_id);
        return View::make('items.create')->withTodoList($todo_list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($list_id)
    {
        $todo_list = TodoList::findOrFail($list_id);

        //define rules for validation
        $rules = array(
                'content' => array('required')
            );
        //pass input to rules using validarot class
        $validator = Validator::make(Input::all(), $rules);

        //test validity
        if ($validator->fails()){
            
            return Redirect::route('todos.items.create', $list_id)->withErrors($validator)->withInput();
        }
        $item = new TodoItem();
        $item->content = Input::get('content');
        $todo_list -> listItems()->save($item);
        return Redirect::route('todos.show', $todo_list->id)->withMessage('Item Was Added!');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $list_id
     * @param  int  $item_id
     * @return Response
     */
    public function edit($list_id, $item_id)
    {
        $item = TodoItem::findOrFail($item_id);
        return View::make('items.edit')
            ->withTodoItem($item)
            ->withTodoListId($list_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $list_id 
     * @param  int  $item_id
     * @return Response
     */
    public function update($list_id, $item_id)
    {
        //define rules for validation
        $rules = array(
                'content' => array('required')
            );
        //pass input to rules using validarot class
        $validator = Validator::make(Input::all(), $rules);

        //test validity
        if ($validator->fails()){
            
            return Redirect::route('todos.items.edit',[$list_id, $item_id])
                ->withErrors($validator)
                ->withInput();
        }

        $item = TodoItem::findOrFail($item_id);
        $item->content = Input::get('content');
        $item -> update();
        return Redirect::route('todos.show',$list_id)
            ->withMessage('Item Was Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($list_id, $item_id)
    {
        $item = TodoItem::findOrFail($item_id)
            ->delete();

        return Redirect::route('todos.show', $list_id)
            ->withMessage('Item Deleted');
    }

     /**
     * Complete the item by adding a completed date
     *
     * @param  int  $list_id
     * @param  int  $item_id
     * @return Response
     */
    public function complete($list_id, $item_id)
    {
        $item = TodoItem::findOrFail($item_id);
        $item->completed_on = date('Y-m-d H:i:s');
        $item->update();

        return Redirect::route('todos.show',$list_id)
            ->withMessage("Item completed");
    }
}
