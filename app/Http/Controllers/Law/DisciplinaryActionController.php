<?php

namespace App\Http\Controllers\Law;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\DisciplinaryAction;
use App\Models\Entity;
use App\Models\Fact;
use App\Models\Action;
use App\Models\Area;
use App\Models\Worker;

class DisciplinaryActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       
       

        $dactions = DisciplinaryAction::select('disciplinary_actions.*', 'workers.fullname', 'entities.name AS entity_name','facts.description AS fact_desc','actions.description as action_desc')
        ->join('workers', 'workers.id', '=', 'disciplinary_actions.worker_id')
        ->join('facts', 'facts.id', '=', 'disciplinary_actions.fact_id')
        ->join('actions', 'actions.id', '=', 'disciplinary_actions.action_id')
        ->join('entities', 'entities.id', '=', 'disciplinary_actions.entity_id')
        
        ->get();

        //return $dactions;

        return view('law.disciplinaryActions.index',compact('dactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entities= Entity::where('external',0)->pluck('name','id');
        $areas= Area::pluck('name','id');
        $facts= Fact::pluck('description','id');
        $actions= Action::pluck('description','id');
        $workers= Worker::pluck('fullname','id');
        return view('law.disciplinaryActions.create',compact('entities','areas','facts','actions','workers'));
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

            'worker_id'=>'required',
            'fact_id'=>'required',
            'action_id'=>'required',
            'entity_id'=>'required',
            'date_notify'=>'required',
            'noEF'=>'required|numeric'
            

        ]);

        $daction= DisciplinaryAction::create($request->all());
        return redirect()->route('law.disciplinaryActions.edit',$daction)->with('info','La Medida Disciplinaria aplicada se creó con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show(DisciplinaryAction $disciplinaryAction)
    // {
    //     return view('law.disciplinaryActions.show',compact('disciplinaryAction'));
    // }
    public function show($id)
    {
        $disciplinaryAction = DB::table('disciplinary_actions')
        ->join('workers', 'workers.id', '=', 'disciplinary_actions.worker_id')
        ->join('facts', 'facts.id', '=', 'disciplinary_actions.fact_id')
        ->join('actions', 'actions.id', '=', 'disciplinary_actions.action_id')
        ->join('entities', 'entities.id', '=', 'disciplinary_actions.entity_id')
        ->select('disciplinary_actions.*', 'workers.fullname','workers.job', 'entities.name AS entity_name','facts.description AS fact_desc','actions.description as action_desc')
        ->where('disciplinary_actions.id',$id)
        ->get();
        return view('law.disciplinaryActions.show',compact('disciplinaryAction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit(DisciplinaryAction $disciplinaryAction)
    // {
    //     $entities= Entity::pluck('name','id');
    //     $areas= Area::pluck('name','id');
    //     $facts= Fact::pluck('description','id');
    //     $actions= Action::pluck('description','id');
    //     $workers= Worker::pluck('fullname','id');
    //     return view('law.disciplinaryActions.edit',compact('disciplinaryAction','entities','areas','facts','actions','workers'));
    // }
    public function edit($id)
    {
        $disciplinaryAction=DisciplinaryAction::find($id);
        $entities= Entity::where('external',0)->pluck('name','id');
        $areas= Area::pluck('name','id');
        $facts= Fact::pluck('description','id');
        $actions= Action::pluck('description','id');
        $workers= Worker::pluck('fullname','id');
        return view('law.disciplinaryActions.edit',compact('disciplinaryAction','entities','areas','facts','actions','workers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DisciplinaryAction $disciplinaryAction)
    {
        $request->validate([

            'worker_id'=>'required',
            'fact_id'=>'required',
            'action_id'=>'required',
            'entity_id'=>'required',
            'date_notify'=>'required',
            'noEF'=>'required|numeric'            

        ]);

        $disciplinaryAction->update($request->all());
        return redirect()->route('law.disciplinaryActions.edit',$disciplinaryAction)->with('info','La Medida disciplinaria aplicada se actualizó con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DisciplinaryAction::destroy($id);        
        return redirect()->route('law.disciplinaryActions.index')->with('info','La Medida disciplinaria aplicada se eliminó con éxito.');

    }
    public function report(){
        return view('report.disciplinaryActions');

    }

    public function cuadro()
    {
       
        $dactions = DisciplinaryAction::select('disciplinary_actions.*', 'workers.fullname','workers.job', 'entities.name AS entity_name','facts.description AS fact_desc')
        ->join('workers', 'workers.id', '=', 'disciplinary_actions.worker_id')
        ->join('facts', 'facts.id', '=', 'disciplinary_actions.fact_id')      
        ->join('entities', 'entities.id', '=', 'disciplinary_actions.entity_id')
        ->where('workers.categoria','=','Cuadro')       
        ->get();
        return view('report.cuadro',compact('dactions'));
    }

    public function funcionario()
    {
        $dactions = DisciplinaryAction::select('disciplinary_actions.*', 'workers.fullname','workers.job', 'entities.name AS entity_name','facts.description AS fact_desc')
        ->join('workers', 'workers.id', '=', 'disciplinary_actions.worker_id')
        ->join('facts', 'facts.id', '=', 'disciplinary_actions.fact_id')      
        ->join('entities', 'entities.id', '=', 'disciplinary_actions.entity_id')
        ->where('workers.categoria','=','Funcionario')       
        ->get();
        return view('report.funcionario',compact('dactions'));
    }

    public function trabajador()
    {
        $dactions = DisciplinaryAction::select('disciplinary_actions.*', 'workers.fullname','workers.job', 'entities.name AS entity_name','facts.description AS fact_desc')
        ->join('workers', 'workers.id', '=', 'disciplinary_actions.worker_id')
        ->join('facts', 'facts.id', '=', 'disciplinary_actions.fact_id')      
        ->join('entities', 'entities.id', '=', 'disciplinary_actions.entity_id')
        ->where('workers.categoria','=','Trabajador')       
        ->get();
        return view('report.trabajador',compact('dactions'));
       
    }
}
