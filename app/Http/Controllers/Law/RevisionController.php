<?php

namespace App\Http\Controllers\Law;

use App\Http\Controllers\Controller;
use App\Models\Responsibility;
use Illuminate\Http\Request;
use App\Models\Revision;
use App\Models\DisciplinaryAction;

class RevisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id,$type)
    {
        if ($type==1 || $type=='App\Models\Responsibility'){

            $responsibility=Responsibility::find($id);
            $revisions=$responsibility->revisions;           

        }elseif($type==2 || $type=='App\Models\DisciplinaryAction'){
            
            $daction=DisciplinaryAction::find($id);
            $revisions=$daction->revisions;  

        }

        return view('law.revisions.index',compact('revisions','id','type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id,$type)
    {
        return view('law.revisions.create',compact('id','type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRevision(Request $request,$id,$type)
    {
        $request->validate([]);
        $revision=new Revision;
        $revision->date=$request->date;
        $revision->result=$request->result;
        $revision->observ=$request->observ;

        if ($type==1){
            $responsibility=Responsibility::find($id);
            $responsibility->revisions()->save($revision);
           // return redirect()->route('law.responsibilities.index')->with('info','La revisión se creó con éxito.');

        }else{
            
            $daction=DisciplinaryAction::find($id);
            $daction->revisions()->save($revision);
           // return redirect()->route('law.disciplinaryActions.index')->with('info','La revisión se creó con éxito.');

        }
        return redirect()->route('revisions.edit',$revision)->with('info','La revisión se creó con éxito.');
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
    public function edit(Revision $revision)
    {
        return view('law.revisions.edit', compact('revision'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Revision $revision)
    {
       $request->validate([]);
       $revision->update($request->all());

       return redirect()->route('revisions.edit',$revision)->with('info','La revisión se actualizó con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $revision=Revision::find($id);
        $idparent=$revision->revisionable_id;
        $type= $revision->revisionable_type == 'App\Models\Responsibility' ? 1 : 2;
        $revision->delete();
        return redirect()->route('revisions.index',['id'=>$idparent,'type'=>$type])->with('info','La revisión se eliminó con éxito.');

    }
}
