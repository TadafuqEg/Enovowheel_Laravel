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
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Validation\Rule;
use Image;
use Str;
use File;

class SettingController extends ApiController
{
    public function index(){
        $settings=Setting::orderBy('id','desc')->paginate(10);
        return view('website.settings.index',compact('settings'));

    }
    public function edit_setting($id){
        $setting=Setting::where('id',$id)->first();
        return view('website.settings.setting.edit',compact('setting'));
    }
    public function update_setting(Request $request,$id){
      
        $setting=Setting::where('id',$id)->first();
        if($setting->dimensions!=null){
            $dimensions=json_decode($setting->dimensions,true);
            //dd($dimensions['width']);
            $validator = Validator::make($request->all(), [
                'value' => ['nullable', 'image','dimensions:width='.$dimensions['width'].',height='.$dimensions['height']],
            ], [
                'dimensions' => 'The image must be exactly ' . $dimensions['width'] . ' x ' . $dimensions['height'] . ' pixels.',
            ]);
        
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }
        }
        if($setting->type=='file'&& array_key_exists('value',$request->all())){
            $invitation_code = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 12);
            $imageFile = $request->file('value');
            //
            $mimeType = $imageFile->getMimeType();
            $fileType = $this->getFileType($mimeType);
          
            if($fileType=='image'){
                list($width, $height) = getimagesize($imageFile->getRealPath());
                $image = $setting->id.'_'.$width . 'x' . $height.'_'.$invitation_code.'_'.time() . '.' . $request->value->extension();

            }else{
                $image = $setting->id.'_'.$invitation_code.'_'.time() . '.' . $request->value->extension();
   
            }
        
            $request->value->move(public_path('setting_images/'), $image);
            $path = ('/setting_images/') . $image;
            $input['label']=$request->label;
            $input['value']=$path;
            if($fileType=='image'){
                $input['dimensions']=json_encode(["width"=>$width,"height"=>$height]);
            }
            $setting->fill($input)->save();
        }elseif(true){

        }else{
            $input['label']=$request->label;
            $input['value']=$request->value;
            $setting->fill($input)->save();
        }
        return redirect('/admin-dashboard/settings');

    }

    protected function getFileType($mimeType)
    {
        $mimeTypes = [
            'image' => ['image/jpeg', 'image/png', 'image/gif', 'image/webp'],
            'pdf' => ['application/pdf'],
            'video' => ['video/mp4', 'video/x-matroska', 'video/avi'],
            'audio' => ['audio/mpeg', 'audio/wav'],
            // Add more mappings as needed
        ];
    
        foreach ($mimeTypes as $type => $types) {
            if (in_array($mimeType, $types)) {
                return $type;
            }
        }
    
        return 'unknown';
    }
}