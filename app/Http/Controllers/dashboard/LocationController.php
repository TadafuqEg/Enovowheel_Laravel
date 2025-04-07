<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Country;
use App\Models\City;
use App\Models\Street;
use Illuminate\Validation\Rule;
use Image;
use Str;
use File;

class LocationController extends ApiController
{
    public function index_states(Request $request)
    {  

        if ($request->has('search')) {

            $all_states = Country::where('name', 'LIKE', '%' . $request->search . '%')->paginate(10);
        } else {

            $all_states= Country::orderBy('id','desc')->paginate(10);
        } 
        return view('website.states.index',compact('all_states'));

    }

    public function create_state(){
        return view('website.states.state.create');
    }

    public function store_state(Request $request){

            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:191'],

            ]);

           
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }
            if($request->is_active){
                $is_active=1;
            }else{
                $is_active=0;
            }
            Country::create([
                'name' => $request->name,
                'is_active' => $is_active,

            ]);
           
          return redirect('/admin-dashboard/states');

    }

    public function edit_state($id){
        $state=Country::where('id',$id)->first();
        return view('website.states.state.edit',compact('state'));
    }

    public function update_state(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:191'],

        ]);

       
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        if($request->is_active){
            $is_active=1;
        }else{
            $is_active=0;
        }
            
            Country::where('id',$id)->update([ 'name' => $request->name,
            'is_active' => $is_active,
            ]);
             return redirect('/admin-dashboard/states');

    }

    public function delete_state($id){
        Country::where('id', $id)->delete();
        return redirect('/admin-dashboard/states');
    }

    //////////////////////////////////////////////////Dependencies////////////////////////////////
    public function index_dependencies(Request $request)
    {  

        if ($request->has('search')) {

            $all_dependencies = City::where('name', 'LIKE', '%' . $request->search . '%')->paginate(10);
        } else {

            $all_dependencies= City::orderBy('id','desc')->paginate(10);
        } 
        return view('website.dependencies.index',compact('all_dependencies'));

    }

    public function create_dependency(){
        $states=Country::where('is_active',1)->get();
        return view('website.dependencies.dependency.create',compact('states'));
    }

    public function store_dependency(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:191'],
            'state' => [
                'required',
                Rule::exists('countries', 'id')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],

        ]);

       
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        if($request->is_active){
            $is_active=1;
        }else{
            $is_active=0;
        }
            City::create([
                'name' => $request->name,
                'country_id'=>$request->state,
                'is_active' => $is_active,

            ]);
           
          return redirect('/admin-dashboard/dependencies');

    }

    public function edit_dependency($id){
        $dependency=City::where('id',$id)->first();
        $states=Country::where('is_active',1)->get();
        return view('website.dependencies.dependency.edit',compact('dependency','states'));
    }

    public function update_dependency(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:191'],
            'state' => [
                'required',
                Rule::exists('countries', 'id')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],

        ]);

       
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        if($request->is_active){
            $is_active=1;
        }else{
            $is_active=0;
        }
            
            City::where('id',$id)->update([ 'name' => $request->name,
            'country_id'=>$request->state,
            'is_active' => $is_active,
            ]);
             return redirect('/admin-dashboard/dependencies');

    }

    public function delete_dependency($id){
        City::where('id', $id)->delete();
        return redirect('/admin-dashboard/dependencies');
    }

    //////////////////////////////////////////////////Dependencies////////////////////////////////
    public function index_streets(Request $request)
    {  

        if ($request->has('search')) {

            $all_streets = Street::where('name', 'LIKE', '%' . $request->search . '%')->paginate(10);
        } else {

            $all_streets= Street::orderBy('id','desc')->paginate(10);
        } 
        return view('website.streets.index',compact('all_streets'));

    }

    public function create_street(){
        $states=Country::where('is_active',1)->get();
        return view('website.streets.street.create',compact('states'));
    }

    public function store_street(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:191'],
            'state' => [
                'required',
                Rule::exists('countries', 'id')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],
            'dependency' => [
                'required',
                Rule::exists('cities', 'id')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],
            'lat'=>['required'],
            'lng'=>['required']
        ]);

       
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        if($request->is_active){
            $is_active=1;
        }else{
            $is_active=0;
        }
            Street::create([
                'name' => $request->name,
                'city_id'=>$request->dependency,
                'is_active' => $is_active,
                'lat'=>$request->lat,
                'lng'=>$request->lng

            ]);
           
          return redirect('/admin-dashboard/streets');

    }

    public function edit_street($id){
        $street=Street::where('id',$id)->first();
        $states=Country::where('is_active',1)->get();
        $dependencies=City::where('country_id',$street->city->country_id)->get();
        return view('website.streets.street.edit',compact('street','states','dependencies'));
    }

    public function update_street(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:191'],
            'state' => [
                'required',
                Rule::exists('countries', 'id')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],
            'dependency' => [
                'required',
                Rule::exists('cities', 'id')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],
            'lat'=>['required'],
            'lng'=>['required']

        ]);

       
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        if($request->is_active){
            $is_active=1;
        }else{
            $is_active=0;
        }
            
            Street::where('id',$id)->update([ 'name' => $request->name,
            'city_id'=>$request->dependency,
            'is_active' => $is_active,
            'lat'=>$request->lat,
            'lng'=>$request->lng
            ]);
             return redirect('/admin-dashboard/streets');

    }

    public function delete_street($id){
        Street::where('id', $id)->delete();
        return redirect('/admin-dashboard/streets');
    }

    public function cities_of_country(Request $request){
        $dependencies=City::where('country_id',$request->state_id)->get();
        return $this->sendResponse($dependencies);
    }
}