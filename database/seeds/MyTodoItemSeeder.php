<?php

use Illuminate\Database\Seeder;
use App\MyTodoItem;
use App\MytodoList;

class MyTodoItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$list = MytodoList::findOrFail(1);
        $item1 = new MyTodoItem();
        $item1->mytodo_list_id = 1;
        $item1->content = "Belajar View";
        $item1->save();

        $item2 = new MyTodoItem();
        $item2->mytodo_list_id = 1;
        $item2->content = "Belajar Controller";
        $item2->save();
    }
}
