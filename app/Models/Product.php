<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\CustomDateTimeCast;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'products';
    public $ImageCollection = 'image';
    protected $fillable = [
        'name',
        'description',
        'price',
        'amount',
        'price_after_discount',
        'category_id',
        'code'
    ];

    protected $allowedSorts = [
       
        'created_at',
        'updated_at'
    ];

    protected $hidden = ['deleted_at'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id')->withTrashed();
    }
}
