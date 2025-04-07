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
use App\Models\FAQ;
use App\Models\ContactUs;
use App\Models\Volunteer;
use App\Models\Accident;
use App\Models\JoinUs;
use Illuminate\Validation\Rule;
use Image;
use App\Models\Recommendation;
use App\Exports\JoinUsExport;
use Str;
use File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ContactUsExport;
class HomeController extends ApiController
{
    public function help_requests(Request $request){
        
        if ($request->has('search')) {

            $help_requests=Accident::where('first_name', 'LIKE', '%' . $request->search . '%')->orWhere('phone', 'LIKE', '%' . $request->search . '%')->orWhere('last_name', 'LIKE', '%' . $request->search . '%')->paginate(10);
        } else {

            $help_requests=Accident::orderBy('id','desc')->paginate(10);
        } 
        return view('website.help_requests.index',compact('help_requests'));
    }

    public function help_request($id){
        $help_request=Accident::where('id',$id)->first();
        $help_request->location=json_decode($help_request->location,true);
        //dd($help_request);
        return view('website.help_requests.view',compact('help_request'));

    }

    public function volunteers(Request $request){
        
        if ($request->has('search')) {

            $volunteers=Volunteer::where('first_name', 'LIKE', '%' . $request->search . '%')->orWhere('phone', 'LIKE', '%' . $request->search . '%')->orWhere('email', 'LIKE', '%' . $request->search . '%')->orWhere('last_name', 'LIKE', '%' . $request->search . '%')->paginate(10);
        } else {

            $volunteers=Volunteer::orderBy('id','desc')->paginate(10);
        } 
        return view('website.volunteers.index',compact('volunteers'));
    }

    public function volunteer($id){
        $volunteer=Volunteer::where('id',$id)->first();
        $volunteer->location=json_decode($volunteer->location,true);
        //dd($volunteer);
        return view('website.volunteers.view',compact('volunteer'));

    }
///////////////////////////////////////////////////////FAQs///////////////////////////////////////////////////////
    public function FAQs(Request $request){
        if ($request->has('search')) {

            $FAQs=FAQ::where('question', 'LIKE', '%' . $request->search . '%')->orWhere('answer', 'LIKE', '%' . $request->search . '%')->paginate(10);
        } else {

            $FAQs=FAQ::orderBy('id','desc')->paginate(10);
        } 
        return view('website.FAQS.index',compact('FAQs'));
    }

    public function create_FAQ(){
        return view('website.FAQS.FAQ.create');
    }

    public function store_FAQ(Request $request){

        $validator = Validator::make($request->all(), [
            'question' => ['required', 'string'],
            'answer' => ['required', 'string'],

        ]);

       
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        if($request->is_active){
            $is_active=1;
        }else{
            $is_active=0;
        }
        FAQ::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'is_active' => $is_active,

        ]);
       
      return redirect('/admin-dashboard/FAQs');

    }

    public function edit_FAQ($id){
        $FAQ=FAQ::where('id',$id)->first();
        return view('website.FAQS.FAQ.edit',compact('FAQ'));
    }

    public function update_FAQ(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'question' => ['required', 'string'],
            'answer' => ['required', 'string'],

        ]);

       
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        if($request->is_active){
            $is_active=1;
        }else{
            $is_active=0;
        }
            
            FAQ::where('id',$id)->update(['question' => $request->question,
            'answer' => $request->answer,
            'is_active' => $is_active,
            ]);
             return redirect('/admin-dashboard/FAQs');

    }

    public function delete_FAQ($id){
        FAQ::where('id', $id)->delete();
        return redirect('/admin-dashboard/FAQs');
    }
    ////////////////////////////////////////////////////////////////
    public function contact_us(Request $request){
        if($request->export=='excel'){
            $invitation_code = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_'), 0, 12);
            return Excel::download(new ContactUsExport, auth()->user()->id . $invitation_code . 'contact_us.xlsx');
            //$contact_us=ContactUs::all();

        }else{
            $contact_us=ContactUs::orderBy('id','desc')->paginate(12);
        }
        
        return view('dashboard.contact_us.index',compact('contact_us'));
    }

    
    public function question($id){
        $question=ContactUs::where('id',$id)->first();
       
        return view('website.contact_us.view',compact('question'));

    }
    //////////////////////////////////////////////////////////////////////////
    public function recommendations(){
        $recommendations=Recommendation::orderBy('id','desc')->paginate(12);
    
    
        return view('website.recommendations.index',compact('recommendations'));
    }
    //////////////////////////////////////////////////////////////////
    public function join_us(Request $request){
        
        if($request->export=='excel'){
            $invitation_code = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_'), 0, 12);
            return Excel::download(new JoinUsExport, auth()->user()->id . $invitation_code . 'join_us.xlsx');
            //$contact_us=ContactUs::all();

        }else{
            $emails=JoinUs::orderBy('id','desc')->paginate(12);
        }
    
        return view('dashboard.join_us.index',compact('emails'));
    }

    public function change_theme(Request $request){
        $user=auth()->user();
        $user->theme=$request->theme;
        $user->save();
        return $this->sendResponse(null,'success');


    }
}