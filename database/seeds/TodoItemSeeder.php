<?php

use Illuminate\Database\Seeder;
use App\TodoItem;

class TodoItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $item1 = new TodoItem();
       $item1->todo_list_id = 1;
       $item1->content = 'Memahami Controller';
       $item1->save();

       $item2 = new TodoItem();
       $item2->todo_list_id = 1;
       $item2->content = 'Memahami View';
       $item2->save();

       $item3 = new TodoItem();
       $item3->todo_list_id = 1;
       $item3->content = 'Memahami Model';
       $item3->save();
    }
}
