<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MytodoList extends Model
{
    //
    //protected $table = 'mytodolist';
    //protected $primaryKey = 'nim';
    public function myTodoItems(){
        return $this->hasMany('App\MyTodoItem','mytodo_list_id','id');
    }
}
