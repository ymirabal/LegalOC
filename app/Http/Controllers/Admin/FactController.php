<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fact;
use Illuminate\Http\Request;

class FactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facts=Fact::all();
        return view('admin.facts.index',compact('facts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types=[
            'tipo1'=>'Tipo1',
            'tipo2'=>'Tipo2'
        ];
        return view('admin.facts.create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'description'=>'required'
        ]);
        //return $request->all();
        $fact=Fact::create($request->all());

        return redirect()->route('admin.facts.edit',$fact)->with('info','El Hecho se creó con éxito.');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Fact $fact)
    {
        return view('admin.facts.show', compact('fact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Fact $fact)
    {
        $types=[
            'tipo1'=>'Tipo1',
            'tipo2'=>'Tipo2'
        ];
        return view('admin.facts.edit', compact('fact','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fact $fact)
    {
        $request->validate([
            'description'=>'required',
            'type'=>'required'
        ]);

        $fact->update($request->all());
        return redirect()->route('admin.facts.edit',$fact)->with('info','El Hecho se actualizó con éxito.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fact $fact)
    {
        $fact->delete();
        return redirect()->route('admin.facts.index')->with('info','El Hecho se eliminó con éxito.');

    }
}
