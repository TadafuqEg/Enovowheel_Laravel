<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Setting extends Model
{
    use HasFactory;


    public $mediaCollection = 'media';


    protected $fillable = [
        'label',
        'key',
        'type',
        'value',
        'category',
        'dimensions'
    ];

    protected $allowedSorts = [
       
        'created_at',
        'updated_at'
    ];

    public function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
   
   

    
}