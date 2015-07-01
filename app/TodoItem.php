<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TodoList;


class TodoItem extends Model
{
    public function todoList()
    {
		return $this->belongsTo('App\TodoList');
    }
}
