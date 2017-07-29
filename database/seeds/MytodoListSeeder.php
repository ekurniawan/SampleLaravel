<?php

use Illuminate\Database\Seeder;
use App\MytodoList;

class MytodoListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mytodo1 = new MytodoList();
        $mytodo1->name = "Belajar Laravel";
        $mytodo1->complete = 0;
        $mytodo1->save();

        $mytodo2 = new MytodoList();
        $mytodo2->name = "Belajar C#";
        $mytodo2->complete = 0;
        $mytodo2->save();

        $mytodo3 = new MytodoList();
        $mytodo3->name = "Belajar ASP.NET MVC";
        $mytodo3->complete = 0;
        $mytodo3->save();
    }
}
