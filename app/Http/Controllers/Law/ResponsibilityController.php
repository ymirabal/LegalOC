<?php

namespace App\Http\Controllers\Law;

use App\Http\Controllers\Controller;
use App\Models\Appeal;
use App\Models\Area;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Responsibility;
use App\Models\Entity;
use App\Models\Fact;
use App\Models\Worker;


class ResponsibilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responsibilities=Responsibility::all();
        return view('law.responsibilities.index',compact('responsibilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types=[
            '1'=>'Restitución',
            '2'=>'Reparación',
            '3'=>'Indemnización'
        ];       
        $entities= Entity::where('external',0)->pluck('name','id');
        $areas= Area::pluck('name','id');
        $facts= Fact::pluck('description','id');  
        $workers= Worker::pluck('fullname','id');     
        return view('law.responsibilities.create',compact('types','areas','entities','facts','workers'));
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
            'entity_id'=>'required',
            'amount'=>'required|numeric',
            'amount_affect'=>'required|numeric',
            'noEF'=>'required',
            'type'=>'required',
            'date_notify'=>'required',
                      

        ]);

        $responsibility=Responsibility::create($request->all());
        return redirect()->route('law.responsibilities.edit',$responsibility)->with('info','La Responsabilidad Material se creó con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $responsibility = DB::table('responsibilities')
        ->join('workers', 'workers.id', '=', 'responsibilities.worker_id')
        ->join('facts', 'facts.id', '=', 'responsibilities.fact_id')      
        ->join('entities', 'entities.id', '=', 'responsibilities.entity_id')
        ->select('responsibilities.*', 'workers.fullname','workers.job', 'entities.name AS entity_name','facts.description AS fact_desc')
        ->where('responsibilities.id',$id)
        ->get();
        return view('law.responsibilities.show',compact('responsibility'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Responsibility $responsibility)
    {
        $types=[
            '1'=>'Restitución',
            '2'=>'Reparación',
            '3'=>'Indemnización'
        ];       
        $entities= Entity::where('external',0)->pluck('name','id');
        $areas= Area::pluck('name','id');
        $facts= Fact::pluck('description','id'); 
        $workers= Worker::pluck('fullname','id');    
        return view('law.responsibilities.edit',compact('responsibility','types','areas','entities','facts','workers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Responsibility $responsibility)
    {
        $request->validate([

            'worker_id'=>'required',
            'fact_id'=>'required',           
            'entity_id'=>'required',
            'amount'=>'required|numeric',
            'amount_affect'=>'required|numeric',
            'noEF'=>'required',
            'type'=>'required',
            'date_notify'=>'required',
                      

        ]);

        $responsibility->update($request->all());
        return redirect()->route('law.responsibilities.edit',$responsibility)->with('info','La Responsabilidad Material se actualizó con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Responsibility $responsibility)
    {
        $responsibility->delete();
        return redirect()->route('admin.responsibilities.index')->with('info','La Responsabilidad Material se eliminó con éxito.');
    }

    public function report()
    {
       
        $responsibilities = Responsibility::select('responsibilities.*', 'workers.fullname', 'entities.name AS entity_name','facts.description AS fact_desc')
       ->join('workers', 'workers.id', '=', 'responsibilities.worker_id')
       ->join('facts', 'facts.id', '=', 'responsibilities.fact_id')      
       ->join('entities', 'entities.id', '=', 'responsibilities.entity_id')     
       ->get();
        return view('report.responsibilities',compact('responsibilities'));
    }

   
   
   
}
