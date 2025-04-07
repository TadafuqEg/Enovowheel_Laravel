<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Image;
use Str;
use File;

class UserController extends Controller
{//done
    public function index(Request $request)
    {

        if ($request->has('search')) {

            $all_users = user::where('first_name', 'LIKE', '%' . $request->search . '%')->where('username', 'LIKE', '%' . $request->search . '%')->orWhere('last_name', 'LIKE', '%' . $request->search . '%')->orWhere('email', 'LIKE', '%' . $request->search . '%')->orWhere('phone', 'LIKE', '%' . $request->search . '%')->paginate(12);
        } else {

            $all_users= user::orderBy('id','desc')->paginate(12);
        } 
        return view('dashboard.users.index',compact('all_users'));

    }

    public function create(){
        return view('dashboard.users.create');
    }

    public function store(Request $request){

            $validator = Validator::make($request->all(), [
                'first_name' => ['required', 'string', 'max:191'],
                'last_name' => ['required', 'string', 'max:191'],
                'email' => ['nullable', 'string', 'email', 'max:191', 'unique:users'],
                'password' => ['required', 'string', 'min:8','confirmed'],
                'username' =>['required','unique:users'],
                'phone_number' => ['nullable', 'unique:users,phone', 'numeric'],
                

            ]);

           
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }
            
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email'=> $request->email ,
                'phone'=>$request->phone_number,
                'username'=> $request->username,
                'password'=>  Hash::make($request->password)
                
            ]);
            $role = Role::where('name','Client')->first();
            
            $user->assignRole([$role->id]);

          return redirect('/admin-dashboard/users');

    }
 

    public function edit($id){
        $user=User::where('id',$id)->first();
        return view('dashboard.users.edit',compact('user'));
    }

    public function update(Request $request,$id){
         $validator = Validator::make($request->all(), [
               
                'first_name' => ['required', 'string', 'max:191'],
                'last_name' => ['required', 'string', 'max:191'],
                'email' => ['nullable', 'string', 'email', 'max:191', 'unique:users,email,' . $id],
                
                'username' =>['required','unique:users,username,' . $id],
                'phone_number' => ['nullable', 'unique:users,phone,' . $id, 'numeric'],
            

            ]);

           
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }
            
            User::where('id',$id)->update([ 'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email'=> $request->email ,
            'phone'=>$request->phone_number,
            'username'=> $request->username]);
             return redirect('/admin-dashboard/users');

    }


   

     public function delete($id)
    {
        User::where('id', $id)->delete();
        return redirect('/admin-dashboard/users');
    }
}