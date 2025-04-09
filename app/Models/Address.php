<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\CustomDateTimeCast;
use Illuminate\Database\Eloquent\SoftDeletes;
class Address extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'addresses';
    protected $fillable = [
        'lat',
        'lng',
        'name',
        'user_id'
    ];

    protected $allowedSorts = [
       
        'created_at',
        'updated_at'
    ];

    protected $hidden = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id')->withTrashed();
    }
}
