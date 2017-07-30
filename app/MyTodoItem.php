<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyTodoItem extends Model
{
    public function myTodoList(){
        return $this->belongsTo('App\MytodoList','mytodo_list_id');
    }
}
