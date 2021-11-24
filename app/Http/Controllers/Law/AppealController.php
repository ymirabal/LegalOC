<?php

namespace App\Http\Controllers\Law;

use App\Http\Controllers\Controller;
use App\Models\Appeal;
use Illuminate\Http\Request;
use App\Models\Responsibility;
use App\Models\DisciplinaryAction;


class AppealController extends Controller
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
            $appeals=$responsibility->appeals;           

        }elseif($type==2 || $type=='App\Models\DisciplinaryAction'){
            
            $daction=DisciplinaryAction::find($id);
            $appeals=$daction->appeals;  

        }

        return view('law.appeals.index',compact('appeals','id','type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id,$type)
    {
        return view('law.appeals.create',compact('id','type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAppeal(Request $request,$id,$type)
    {
        $request->validate([]);
        $appeal=new Appeal;
        $appeal->date=$request->date;
        $appeal->result=$request->result;
        $appeal->type=$request->type;
        $appeal->observ=$request->observ;

        if ($type==1){
            $responsibility=Responsibility::find($id);
            $responsibility->appeals()->save($appeal);
           // return redirect()->route('appeal.index',$id,$type)->with('info','La apelación se creó con éxito.');

        }elseif ($type==2){
            
            $daction=DisciplinaryAction::find($id);
            $daction->appeals()->save($appeal);
           // return redirect()->route('law.disciplinaryActions.index')->with('info','La apelación se creó con éxito.');

        }

       // return redirect()->route('appeals.index',$id,$type)->with('info','La apelación se creó con éxito.');

       return redirect()->route('appeals.edit',$appeal)->with('info','La apelación se creó con éxito.');

       
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
    public function edit(Appeal $appeal)
    {
        return view('law.appeals.edit', compact('appeal'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appeal $appeal)
    {
        $request->validate([]);
        $appeal->update($request->all());

        return redirect()->route('appeals.edit',$appeal)->with('info','La apelación se actualizó con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    
     public function destroy($id)
    {
        $appeal=Appeal::find($id);

       // return $appeal;
       
       //$id=$appeal->appealable_id;
       $type=($appeal->appealable_type == 'App\\Models\\Responsibility') ? 1 : 2;
       $idparent=$appeal->appealable_id;

      // return $type;
       $appeal->delete();
       return redirect()->route('appeals.index',['id'=>$idparent,'type'=>$type])->with('info','La apelación se eliminó con éxito.');

    }

   
}
