<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Worker;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Entity;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;


class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $workers=Worker::all();
       /* $workers=DB::table('workers')
        ->join('entities', 'entities.id', '=', 'workers.entity_id')
        ->join('areas', 'areas.id', '=', 'workers.area_id')
        ->select('workers.*', 'entities.name as entity_name', 'areas.name as area_name')
        ->get();*/

       // return $workers;
      
        return view('admin.workers.index');
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
        return view('admin.workers.create',compact('areas','entities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'fullname'=>'required',
            'job'=>'required',
            'entity_id'=>'required',
            'area_id'=>'required'
        ]);
        $worker=Worker::create($request->all());

        return redirect()->route('admin.workers.edit',$worker)->with('info','El Trabajdor se creó con éxito.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Worker $worker)
    {
       
      
        return view('admin.workers.show', compact('worker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $worker=Worker::find($id);
        $entities= Entity::where('external',0)->pluck('name','id');
        $areas= Area::pluck('name','id');
        return view('admin.workers.edit', compact('worker','areas','entities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Worker $worker)
    {
        //
        $request->validate([
            'fullname'=>'required',
            'job'=>'required',
            'entity_id'=>'required',
            'area_id'=>'required'
        ]);

        $worker->update($request->all());
        return redirect()->route('admin.workers.edit',$worker)->with('info','El Trabajador se actualizó con éxito.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Worker::find($id)->delete();
        return redirect()->route('admin.workers.index')->with('info','El Trabajador se eliminó con éxito.');
    }

    public function datatableWorker(){
        // $responsibilities = Responsibility::all();
    
       $workers = DB::table('workers')
        ->join('entities', 'workers.entity_id', '=', 'entities.id')
        ->join('areas','workers.area_id' , '=', 'areas.id')
        ->select('workers.*', 'areas.name AS area', 'entities.name AS entity')
        ->get();

//return $workers;
   // $workers=Worker::all();
        
        return DataTables::of($workers)
        
        ->addColumn('actions','admin.workers.datatables.action')      
        ->rawColumns(['actions'])     
        ->toJson();  
    }

}

