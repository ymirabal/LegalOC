<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class DataTableController extends Controller
{
    public function claims(){

      $claims = DB::table('claims')

        ->join('workers', 'workers.id', '=', 'claims.worker_id')
        ->join('concepts', 'concepts.id', '=', 'claims.concept_id')
        ->join('pretensions', 'pretensions.id', '=', 'claims.pretension_id')
        ->join('products', 'products.id', '=', 'claims.product_id')      
        ->join('entities as entityC', 'entityC.id', '=', 'claims.entityC_id')
        ->join('entities as entityR', 'entityR.id', '=', 'claims.entityR_id')
        ->select('claims.*', 'workers.fullname', 'entityC.name AS entityC_name','entityR.name AS entityR_name','concepts.description AS concept_desc','pretensions.description as pretension_desc','products.description as product_desc')
        ->get();

        return datatables()->of($claims)
            ->addColumn('action','law.claims.datatable.action')
            ->rawColumns(['action'])  
           
            ->toJson();


    }

    public function countClaims(){
        //$countClaims = CountClaim::all();

        $countClaims = DB::table('count_claims')

        ->join('workers', 'workers.id', '=', 'count_claims.worker_id')         
        ->join('entities as entity', 'entity.id', '=', 'count_claims.entity_id')
      
        ->select('count_claims.*', 'workers.fullname', 'entity.name')
        ->get();

        
        return datatables()->of($countClaims)
            ->addColumn('action','law.countClaims.datatable.action')
            ->rawColumns(['action'])             
            ->toJson();

       /* return datatables()->of($countClaims)
            ->addColumn('show','law.countClaims.datatable.btnshow')
            ->addColumn('edit','law.countClaims.datatable.btnedit')
            ->addColumn('delete','law.countClaims.datatable.btndelete')
            ->rawColumns(['show','edit','delete'])          
            ->toJson();*/
            
          /*  ->addColumn('show','<a href="{{route(\'law.countClaims.show\',$id)}}" class="btn btn-sm btn-primary">'.('Ver').'</a>')
            ->addColumn('edit','<a href="{{route(\'law.countClaims.edit\',$id)}}" class="btn btn-sm btn-success">'.('Editar').'</a>')
            ->addColumn('delete','<form action="{{route(\'law.countClaims.destroy\',$id)}}" method="POST">  @csrf
            @method("delete") <button type="submit" class="btn btn-danger btn-sm">'.('Eliminar').'</button></form>')
               
            ->rawColumns(['show','edit','delete'])
          
            ->toJson();*/


    }

    public function disciplinaryActions(){
        //$dactions = DisciplinaryAction::all();

        $dactions = DB::table('disciplinary_actions')
        ->join('workers', 'workers.id', '=', 'disciplinary_actions.worker_id')
        ->join('facts', 'facts.id', '=', 'disciplinary_actions.fact_id')
        ->join('actions', 'actions.id', '=', 'disciplinary_actions.action_id')
        ->join('entities', 'entities.id', '=', 'disciplinary_actions.entity_id')
        ->select('disciplinary_actions.*', 'workers.fullname', 'entities.name AS entity_name','facts.description AS fact_desc','actions.description as action_desc')
        ->get();
        
        return datatables()->of($dactions)
            ->addColumn('action1','law.disciplinaryActions.datatable.action1')
            ->addColumn('action','law.disciplinaryActions.datatable.action')
            ->rawColumns(['action1','action'])  
           
            ->toJson();

        /*return datatables()->of($dactions)
            ->addColumn('show','law.disciplinaryActions.datatable.btnshow')
            ->addColumn('edit','law.disciplinaryActions.datatable.btnedit')
            ->addColumn('delete','law.disciplinaryActions.datatable.btndelete')
            ->rawColumns(['show','edit','delete'])          
            ->toJson();*/
            
           /* ->addColumn('show','<a href="{{route(\'law.disciplinaryActions.show\',$id)}}" class="btn btn-sm btn-primary">'.('Ver').'</a>')
            ->addColumn('edit','<a href="{{route(\'law.disciplinaryActions.edit\',$id)}}" class="btn btn-sm btn-success">'.('Editar').'</a>')
            ->addColumn('delete','<form action="{{route(\'law.disciplinaryActions.destroy\',$id)}}" method="POST">  @csrf
            @method("delete") <button type="submit" class="btn btn-danger btn-sm">'.('Eliminar').'</button></form>')
               
            ->rawColumns(['show','edit','delete'])
          
            ->toJson();*/


    }

    public function responsibilities(){
       // $responsibilities = Responsibility::all();

       $responsibilities = DB::table('responsibilities')
       ->join('workers', 'workers.id', '=', 'responsibilities.worker_id')
       ->join('facts', 'facts.id', '=', 'responsibilities.fact_id')      
       ->join('entities', 'entities.id', '=', 'responsibilities.entity_id')
       ->select('responsibilities.*', 'workers.fullname', 'entities.name AS entity_name','facts.description AS fact_desc')
       ->get();

       
       return datatables()->of($responsibilities)
        ->addColumn('action1','law.responsibilities.datatable.action1')
       ->addColumn('action','law.responsibilities.datatable.action')      
       ->rawColumns(['action1','action'])       
       ->toJson();     

    }

    public function reportFuncionario(){
      // $responsibilities = Responsibility::all();

      $responsibilities = DB::table('responsibilities')
      ->join('workers', 'workers.id', '=', 'responsibilities.worker_id')
      ->join('facts', 'facts.id', '=', 'responsibilities.fact_id')      
      ->join('entities', 'entities.id', '=', 'responsibilities.entity_id')
      ->where('workers.categoria','=','Funcionario')
      ->select('responsibilities.*', 'workers.fullname', 'entities.name AS entity_name','facts.description AS fact_desc')
      ->get();

      
      return datatables()->of($responsibilities)
       ->addColumn('action1','law.responsibilities.datatable.action1')
      ->addColumn('action','law.responsibilities.datatable.action')      
      ->rawColumns(['action1','action'])       
      ->toJson();     

   }

    public function reportCuadro(){
      // $responsibilities = Responsibility::all();

      $responsibilities = DB::table('responsibilities')
      ->join('workers', 'workers.id', '=', 'responsibilities.worker_id')
      ->join('facts', 'facts.id', '=', 'responsibilities.fact_id')      
      ->join('entities', 'entities.id', '=', 'responsibilities.entity_id')
      ->where('workers.categoria','=','Cuadro')
      ->select('responsibilities.*', 'workers.fullname', 'entities.name AS entity_name','facts.description AS fact_desc')
      ->get();

      
      return datatables()->of($responsibilities)
      ->addColumn('action1','law.responsibilities.datatable.action1')
      ->addColumn('action','law.responsibilities.datatable.action')      
      ->rawColumns(['action1','action'])       
      ->toJson();     

  }

  public function reportRegular(){
    // $responsibilities = Responsibility::all();

    $responsibilities = DB::table('responsibilities')
    ->join('workers', 'workers.id', '=', 'responsibilities.worker_id')
    ->join('facts', 'facts.id', '=', 'responsibilities.fact_id')      
    ->join('entities', 'entities.id', '=', 'responsibilities.entity_id')
    ->where('workers.categoria','=','Trabajador')
    ->select('responsibilities.*', 'workers.fullname', 'entities.name AS entity_name','facts.description AS fact_desc')
    ->get();

    
    return datatables()->of($responsibilities)
     ->addColumn('action1','law.responsibilities.datatable.action1')
    ->addColumn('action','law.responsibilities.datatable.action')      
    ->rawColumns(['action1','action'])       
    ->toJson();     

 }

//  Reportes



    public function reportDoneClaim(){

      $claims = DB::table('claims')

        ->join('workers', 'workers.id', '=', 'claims.worker_id')
        ->join('concepts', 'concepts.id', '=', 'claims.concept_id')
        ->join('pretensions', 'pretensions.id', '=', 'claims.pretension_id')
        ->join('products', 'products.id', '=', 'claims.product_id')      
        ->join('entities as entityC', 'entityC.id', '=', 'claims.entityC_id')
        ->join('entities as entityR', 'entityR.id', '=', 'claims.entityR_id')
        ->select('claims.*', 'workers.fullname', 'entityC.name AS entityC_name','entityR.name AS entityR_name','concepts.description AS concept_desc','pretensions.description as pretension_desc','products.description as product_desc')
        ->get();

        return datatables()->of($claims)
            ->addColumn('action','law.claims.datatable.action')
            ->rawColumns(['action'])  
          
            ->toJson();


    }

    public function reportReceivedClaim(){

      $claims = DB::table('claims')

        ->join('workers', 'workers.id', '=', 'claims.worker_id')
        ->join('concepts', 'concepts.id', '=', 'claims.concept_id')
        ->join('pretensions', 'pretensions.id', '=', 'claims.pretension_id')
        ->join('products', 'products.id', '=', 'claims.product_id')      
        ->join('entities as entityC', 'entityC.id', '=', 'claims.entityC_id')
        ->join('entities as entityR', 'entityR.id', '=', 'claims.entityR_id')
        ->select('claims.*', 'workers.fullname', 'entityC.name AS entityC_name','entityR.name AS entityR_name','concepts.description AS concept_desc','pretensions.description as pretension_desc','products.description as product_desc')
        ->get();

        return datatables()->of($claims)
            ->addColumn('action','law.claims.datatable.action')
            ->rawColumns(['action'])  
          
            ->toJson();


    }
      public function reportCountClaim(){
        //$countClaims = CountClaim::all();

        $countClaims = DB::table('count_claims')

        ->join('workers', 'workers.id', '=', 'count_claims.worker_id')         
        ->join('entities as entity', 'entity.id', '=', 'count_claims.entity_id')
      
        ->select('count_claims.*', 'workers.fullname', 'entity.name')
        ->get();

        
        return datatables()->of($countClaims)
            ->addColumn('action','law.countClaims.datatable.action')
            ->rawColumns(['action'])             
            ->toJson();

      }

    public function reportDisciplinaryAction(){
      //$dactions = DisciplinaryAction::all();

      $dactions = DB::table('disciplinary_actions')
      ->join('workers', 'workers.id', '=', 'disciplinary_actions.worker_id')
      ->join('facts', 'facts.id', '=', 'disciplinary_actions.fact_id')
      ->join('actions', 'actions.id', '=', 'disciplinary_actions.action_id')
      ->join('entities', 'entities.id', '=', 'disciplinary_actions.entity_id')
      ->select('disciplinary_actions.*', 'workers.fullname', 'entities.name AS entity_name','facts.description AS fact_desc','actions.description as action_desc')
      ->get();
      
      return datatables()->of($dactions)
          ->addColumn('action1','law.disciplinaryActions.datatable.action1')
          ->addColumn('action','law.disciplinaryActions.datatable.action')
          ->rawColumns(['action1','action'])  
        
          ->toJson();   


    }
    
}
