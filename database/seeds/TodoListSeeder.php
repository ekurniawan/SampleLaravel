<?php

use Illuminate\Database\Seeder;
use App\TodoList;


class TodoListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $todo1 = new TodoList();
        $todo1->name = "Belajar Laravel";
        $todo1->save();

        $todo2 = new TodoList();
        $todo2->name = "Belajar ASP.NET MVC";
        $todo2->save();

        $todo3 = new TodoList();
        $todo3->name = "Belajar JQuery";
        $todo3->save();
    }
}
