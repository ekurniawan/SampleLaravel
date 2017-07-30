<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\MytodoList;

class MyTodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session(["username"=>"erick"]);
        $results = MytodoList::all();
        return view('mytodolist.index')->with('todolists',$results);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mytodolist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'bail|required|unique:mytodo_lists,name'
        ]);

        //Log::info("complete ".$request->complete);
        $mytodolist = new MytodoList();
        $mytodolist->name = $request->name;
        $mytodolist->complete = $request->complete=="on"?1:0;
        $mytodolist->save();
        //return redirect('mytodolist')->with('pesan','Tambah data berhasil !');
        return redirect()->route('mytodolist.index')->with('pesan','Tambah data berhasil !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mytodolist = MytodoList::findOrFail($id);
        return view('mytodolist.edit')->withList($mytodolist);
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
        $this->validate($request,[
            'name'=>'required'
        ]);

        $mytodolist = MytodoList::findOrFail($id);
        $mytodolist->name = $request->name;
        $mytodolist->complete = $request->complete=="on"?1:0;
        $mytodolist->update();
        return redirect()->route('mytodolist.index')->with('pesan','Update data berhasil !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $mytodolist = MytodoList::findOrFail($id);
       $message = "Delete data ".$mytodolist->name." berhasil !";
       $mytodolist->delete();
       return redirect()->route('mytodolist.index')->with('pesan',$message);
    }
}
