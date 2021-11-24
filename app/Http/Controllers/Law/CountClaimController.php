<?php

namespace App\Http\Controllers\Law;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CountClaim;
use App\Models\Entity;
use App\Models\Worker;

class CountClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countClaims = CountClaim::select('count_claims.*', 'workers.fullname', 'entity.name')

        ->join('workers', 'workers.id', '=', 'count_claims.worker_id')         
        ->join('entities as entity', 'entity.id', '=', 'count_claims.entity_id')
      
       // ->select('count_claims.*', 'workers.fullname', 'entity.name')
        ->get();
        return view('law.countClaims.index',compact('countClaims'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entities= Entity::pluck('name','id');
        $workers= Worker::pluck('fullname','id');
        return view('law.countClaims.create',compact('entities','workers'));
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
            
          /*  'entity_id'=>'required',
            'amount'=>'required|numeric',
            'amount_ini'=>'required|numeric',
            'amountpaid'=>'numeric', 
            'worker_id'=>'required',
            'clause'=>'required',
            'date_ini'=>'required',
            'type'=>'required'*/
        ]);
        $countClaim=CountClaim::create($request->all());

        return redirect()->route('law.countClaims.edit',$countClaim)->with('info','La Reclamación de Cuentas por Cobrar se creó con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $countClaim = DB::table('count_claims')

        ->join('workers', 'workers.id', '=', 'count_claims.worker_id')         
        ->join('entities as entity', 'entity.id', '=', 'count_claims.entity_id')
      
        ->select('count_claims.*', 'workers.fullname', 'entity.name')
        ->where('count_claims.id',$id)
        ->get();
        return view('law.countClaims.show',compact('countClaim'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CountClaim $countClaim)
    {
        $entities= Entity::pluck('name','id');
        $workers= Worker::pluck('fullname','id');
        return view('law.countClaims.edit',compact('countClaim','entities','workers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CountClaim $countClaim)
    {
       $request->validate([]);
       $countClaim->update($request->all());
       return redirect()->route('law.countClaims.edit',$countClaim)->with('info','La Reclamación de Cuentas por Cobrar se actualizó con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountClaim $countClaim)
    {
        $countClaim->delete();
        return redirect()->route('law.countClaims.index')->with('info','La Reclamación de Cuentas por Cobrar se eliminó con éxito.');
    }

    public function report(){
        return view('report.countClaims');
    }
}
