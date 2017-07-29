<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
//use Illuminate\Database\Eloquent\ModelNotFoundException;
use Validator;
use App\TodoList;

class TodoListController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todo_lists = TodoList::all();
        //return view('todos.index')->with('todo_lists',$todo_lists);
        //$param = Request::query('name');
        //$name = $request->input('name');
        return view('todos.index')->with('todo_lists',$todo_lists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field harus diisi.',
        ];


        $validator = Validator::make($request->all(),[
            'title'=>'required'
        ],$messages);

        if($validator->fails()){
            return redirect('todos/create')->withErrors($validator)->withInput();
        }

        /*$this->validate($request,[
            'title'=>'bail|required|unique:todo_lists,name'
        ]);*/


        $name = $request->get('title');
        $list = new TodoList();
        $list->name = $name;
        $list->save();
        //return redirect()->route('todos.index');
        return redirect('/todos')->with('status','Todolist Created Succesfuly !!');
    }

    public function messages()
    {
        return [
            'title.required' => 'Title harus diisi !'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $list = TodoList::findOrFail($id);
            $items = $list->todoItems()->get();
            return view('todos.show')->withList($list)->withItems($items);
        }catch(\Exception $ex){
             $myerror = array('Data tidak ditemukan !');
             return redirect('/todos')->withErrors($myerror);
        }  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list = TodoList::findOrFail($id);
        return view('todos.edit')->withList($list);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'The :attribute field harus diisi.',
        ];

        $validator = Validator::make($request->all(),[
            'title'=>'required|unique:todo_lists,name'
        ],$messages);

        if($validator->fails()){
            return redirect()->route('todos.edit',['id'=>$id])->withErrors($validator)->withInput();
        }

        $name = $request->get('title');
        $list = TodoList::findOrFail($id);
        $list->name = $name;
        $list->update();
        return redirect()->route('todos.index')->with('status','Todolist Updated Succesfuly !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $list = TodoList::findOrFail($id);
        $message = "Todolist ".$list->name." deleted successfully !";
        $list->delete();
        return redirect()->route('todos.index')->with('status',$message);
    }
}
