<?php

namespace App\Http\Controllers\Law;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Claim;
use App\Models\Concept;
use App\Models\Entity;
use App\Models\Pretension;
use App\Models\Product;
use App\Models\Worker;

class ClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $claims = Claim::select('claims.*', 'workers.fullname', 'entityC.name AS entityC_name','entityR.name AS entityR_name','concepts.description AS concept_desc','pretensions.description as pretension_desc','products.description as product_desc')
        

        ->join('workers', 'workers.id', '=', 'claims.worker_id')
        ->join('concepts', 'concepts.id', '=', 'claims.concept_id')
        ->join('pretensions', 'pretensions.id', '=', 'claims.pretension_id')
        ->join('products', 'products.id', '=', 'claims.product_id')      
        ->join('entities as entityC', 'entityC.id', '=', 'claims.entityC_id')
        ->join('entities as entityR', 'entityR.id', '=', 'claims.entityR_id')
      //  ->select('claims.*', 'workers.fullname', 'entityC.name AS entityC_name','entityR.name AS entityR_name','concepts.description AS concept_desc','pretensions.description as pretension_desc','products.description as product_desc')
        ->get();
        
       // $claims=Claim::all();
        return view('law.claims.index',compact('claims'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entities= Entity::pluck('name','id');
        $concepts= Concept::pluck('description','id');
        $pretensions= Pretension::pluck('description','id');   
        $products= Product::pluck('description','id'); 
        $workers= Worker::pluck('fullname','id');  

        return view('law.claims.create',compact('entities','concepts','pretensions','products','workers'));
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
          /*  'concept_id'=>'required',
            'pretension_id'=>'required',
            'action_id'=>'required',
            'entityC_id'=>'required',
            'entityR_id'=>'required',
            'date_notify'=>'required',
            'noEF'=>'required|numeric',
            'worker_id'=>'required',
            'clause'=>'required',
            'date_ini'=>'required',
            'type'=>'required'*/
        ]);
        $claim=Claim::create($request->all());
        return redirect()->route('law.claims.edit',$claim)->with('info','La Reclamación se creó con éxito.');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $claim = DB::table('claims')

        ->join('workers', 'workers.id', '=', 'claims.worker_id')
        ->join('concepts', 'concepts.id', '=', 'claims.concept_id')
        ->join('pretensions', 'pretensions.id', '=', 'claims.pretension_id')
        ->join('products', 'products.id', '=', 'claims.product_id')      
        ->join('entities as entityC', 'entityC.id', '=', 'claims.entityC_id')
        ->join('entities as entityR', 'entityR.id', '=', 'claims.entityR_id')        
        ->select('claims.*', 'workers.fullname', 'entityC.name AS entityC_name','entityR.name AS entityR_name','concepts.description AS concept_desc','pretensions.description as pretension_desc','products.description as product_desc')
        ->where('claims.id',$id)
        ->get();

        //return $claim;


        return view('law.claims.show',compact('claim'));
      // return view('law.claims.show')->with('claim',$claim);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit(Claim $claim)
    // {
    //     $entities= Entity::pluck('name','id');
    //     $concepts= Concept::pluck('description','id');
    //     $pretensions= Pretension::pluck('description','id');   
    //     $products= Product::pluck('description','id');
    //     $workers= Worker::pluck('fullname','id');

    //     return view('law.claims.edit',compact('claim','entities','concepts','pretensions','products','workers'));
    // }
    public function edit($id)
    {
        $claim=Claim::find($id);
        $entities= Entity::pluck('name','id');
        $concepts= Concept::pluck('description','id');
        $pretensions= Pretension::pluck('description','id');   
        $products= Product::pluck('description','id');
        $workers= Worker::pluck('fullname','id');

        return view('law.claims.edit',compact('claim','entities','concepts','pretensions','products','workers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Claim $claim)
    {
        $request->validate([
          /*  'concept_id'=>'required',
            'pretension_id'=>'required',
            'action_id'=>'required',
            'entityC_id'=>'required',
            'entityR_id'=>'required',
            'date_notify'=>'required',
            'noEF'=>'required|numeric',
            'worker_id'=>'required',
            'clause'=>'required',
            'date_ini'=>'required',
            'type'=>'required'*/
        ]);

       $claim->update($request->all());
       return redirect()->route('law.claims.edit',$claim)->with('info','La Reclamación se actualizó con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function destroy(Claim $claim)
    {
        $claim->delete();
        return redirect()->route('law.claims.index')->with('info','La Reclamación se eliminó con éxito.');
    }*/

     public function destroy($id)
    {
        Claim::destroy($id);
        return redirect()->route('law.claims.index')->with('info','La Reclamación se eliminó con éxito.');
    }

    public function doneReport(){
        return view('report.doneClaims');
    }

    public function receivedReport(){
        return view('report.receivedClaims');

    }
}
