<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use App\Mail\SendOTP;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\Recommendation;
use Illuminate\Validation\Rule;
use App\Models\Volunteer;
use App\Models\Setting;
use App\Models\ContactUs;
class AuthController extends ApiController
{
///////////////////////////////////////////  Register  ///////////////////////////////////////////

   

    public function register(Request $request){

        $validator  =   Validator::make($request->all(), [
          
           
            'email' =>['required','email',  Rule::unique('users')->whereNull('deleted_at')]
            
            
        ]);
        // dd($request->all());
        if ($validator->fails()) {
            $errors = implode(" / ", $validator->errors()->all());

            return $this->sendError(null, $errors, 400);
        }

        $otpCode = generateOTP();
        $user = User::create([
            'email'=>$request->email,
            'otp'=>$otpCode
        ]);

        $role = Role::where('name','Client')->first();
            
        $user->assignRole([$role->id]);
        Mail::to($request->email)->send(new SendOTP($otpCode));    
        
        return $this->sendResponse(null, 'OTP sent to your email address.', 200);
    }
    public function verifyOTP(Request $request)
    {
        $validator  =   Validator::make($request->all(), [
            'email' => 'required|string|email',
            'otp' => 'required|string',
            
        ]);
        // dd($request->all());
        if ($validator->fails()) {

            $errors = implode(" / ", $validator->errors()->all());

            return $this->sendError(null, $errors, 400);
        }
        $user = User::where('email', $request->email)
                ->where('otp', $request->otp)
                ->first();

        if (!$user) {
            return $this->sendError(null, 'Invalid or expired OTP', 401);

        }
      
        $user->token = $user->createToken('api')->plainTextToken;

        return $this->sendResponse($user, 'OTP verified successfully.', 200);

    }

    public function login(Request $request){
       
        $validator = Validator::make($request->all(), [
           
            'email' =>'required|string|email',
           
        ]);
      
        if ($validator->fails()) {
            return $this->sendError(null,$validator->errors());
        }
      
        
        $user = User::where('email', $request->email)
                ->whereHas('roles', function ($q) {
                    $q->where('name', 'Client');
                })
                ->first();

        if ($user) {
            $otpCode = generateOTP();
            $user->otp=$otpCode;
            $user->save();
            Mail::to($request->email)->send(new SendOTP($otpCode));
        }
        

        return $this->sendResponse(null, 'OTP sent to your email address.', 200);
         
        
    }
///////////////////////////////////////////  Logout  ///////////////////////////////////////////

    public function logout(Request $request){
        $user = $request->user();
        $currentToken = $user->currentAccessToken();
        // Revoke the token of the current device
        $currentToken->delete();
        
        return $this->sendResponse(null,'Logout successfully');
        
    }

    public function profile($id)
    {
        $user = User::find($id);
        return $this->sendResponse($user, null, 200);
    }

    public function edit_personal_info(Request $request)
    {
        $validator  =   Validator::make($request->all(), [

             'first_name' => 'nullable|string|max:255',
             'last_name' => 'nullable|string|max:255',
             'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore(auth()->user()->id)->whereNull('deleted_at')
            ],
            'phone' => [
                'required',
                Rule::unique('users', 'phone')->ignore(auth()->user()->id)->whereNull('deleted_at')
            ],
             'birthdate' => 'nullable|date',
             'gendor' => 'nullable|in:male,female',
         ]);
        // dd($request->all());
        if ($validator->fails()) {
            $errors = implode(" / ", $validator->errors()->all());

            return $this->sendError(null, $errors, 400);
        }

        User::where('id', auth()->user()->id)->update([ 'first_name' => $request->first_name,
        'last_name' => $request->last_name,
                                                       'email' => $request->email,
                                                       'phone' => $request->phone,
                                                       'birthdate' => $request->birthdate,
                                                       'gender' => $request->gender
                                                       
                                                       ]);
        $user = auth()->user();
        return $this->sendResponse($user, 'Account Updated Successfuly', 200);

    }

    

    public function remove_account(Request $request)
    {

        $user = $request->user();
        if ($user) {
            $tokens = $user->tokens;
            foreach ($tokens as $token) {
                $token->delete();
            }
         
            $user->delete();
            return $this->sendResponse(null, 'Account Removed successfuly', 200);
        } else {
            // Handle the case when the user is not authenticated
            return $this->sendError(null, "This Account doesn't existed", 400);
        }
    }
   

    public function contact_us(Request $request){
        $validator  =   Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:191'],
            'state' => ['required', 'string', 'max:191'],
            
            'phone' => ['required'],
            'city' =>['required', 'string', 'max:191'],
            
            'area'=>['required', 'string', 'max:191'],
            'models_num'['required'],
        ]);
        // dd($request->all());
        if ($validator->fails()) {

            return $this->sendError(null,$validator->errors());
        }
        ContactUs::create(['name'=>$request->name,'state'=>$request->state,'city'=>$request->city,'area'=>$request->area,'phone'=>$request->phone,'models_num'=>$request->models_num]);
        return $this->sendResponse(null,'شكرا لمشاركتكم');
    }
}