<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    public function todoItems(){
        return $this->hasMany('App\TodoItem');
    }
}

?>