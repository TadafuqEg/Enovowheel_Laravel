<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use React\EventLoop\Loop;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class GetDateController extends ApiController
{
    public function getCategories(){
        $categories=Category::all();
        return $this->sendResponse($categories,null);

    }
    public function products(Request $request){
        $products=Product::orderBy('id', 'desc');
        if($request->category_id){
            $products->where('category_id',$request->category_id);
        }
        $products=$products->with('category:id,name')->get();

    }
    public function product($id){
        $product=Product::where('code',$id)->with('category:id,name')->first();
        if($product){
            return $this->sendResponse($product,null);
        }else{
            return $this->sendError(null,'There is no product with this code.');
        }
    }
}