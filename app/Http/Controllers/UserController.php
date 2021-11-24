<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Entity;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Arr;



class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
       // $users=User::with('roles')->get();

       // return $users;

        return view('users.index');
    }

    public function create()
    {
        $entities= Entity::where('external',0)->pluck('name','id')->all();
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles','entities'));
    }

    public function store(UserRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user=User::create($input);
        $user->assignRole($request->input('roles'));
        return redirect()->route('user.index')->with('info','El usuario se creó con éxito.');
    }


    public function edit(User $user){

        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();  
        $entities= Entity::where('external',0)->pluck('name','id')->all();  

        return view('users.edit',compact('user','roles','entities','userRole'));

    }


    public function update(User $user, UserRequest $request){

        $input = $request->all();

       /* if(!empty($input['password'])){ 

            $input['password'] = Hash::make($input['password']);

        }else{

            $input = Arr::except($input,array('password'));    

        }*/
       // $input['password'] = bcrypt($request->password);

        $user->update($request->all());
        DB::table('model_has_roles')->where('model_id',$user->id)->delete();    

        $user->assignRole($request->input('roles'));

    

        return redirect()->route('user.edit',$user)->with('info','El usuario se actualizó con éxito.');

    }


    public function datatableUser()
    {
        $users=User::with('roles')->get();
        return DataTables::of($users)
      /*  $users=User::all();

        return $users;

      return DataTables::of($users)*/
       /* ->addColumn('show','users.datatables.btnshow')
        ->addColumn('edit','users.datatables.btnedit')
        ->addColumn('delete','users.datatables.btndelete')
        ->rawColumns(['show','edit','delete'])  */  
        ->addColumn('actions','users.datatables.action')  
        ->rawColumns(['actions'])    
        ->toJson();
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('info','El usuario se eliminó con éxito.');
    }

    public function editPass(User $user){
        
    }

    public function updatePass(User $user, UserRequest $request){



    }
}
